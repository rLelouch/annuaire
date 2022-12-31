<?php

class Enregistrement
{
    public function registre($name1, $nickname1, $phone1, $job1, $city1, $cp1, $address1, $birth1, $sex1, $desc1)
    {
        if($_POST)
        {
            $name = strtolower(valid_data($name1));
            $nickname = strtolower(valid_data($nickname1));
            $sex = strtolower(valid_data($sex1));
            $job = strtolower(valid_data($job1));
            $phone = strtolower(valid_data($phone1));
            $birth = strtolower($birth1);
            $address = strtolower(valid_data($address1));
            $city = strtolower(valid_data($city1));
            $cp = strtolower(valid_data($cp1));
            $desc = strtolower(valid_data($desc1));

            //variable de controle pour verifier si on peut ajouter les infos dans la bdd ou non
            $erreur = false; // false= bdd | true = pas dans la bdd

            if (!empty($name)
                && !empty($nickname)
                && !empty($phone)
                && preg_match('#(0|\+33)[1-9]( *[0-9]{2}){4}#', $phone)
                && !empty($job)
                //&& preg_match('#^[A-Z][\p{L}-]*$#',$job)
                && !empty($city)
                //regex city
                && !empty($cp)
                //regex cp
                && !empty($address)
                //regex address
                && !empty($birth)
                && !empty($sex))
            {
                $request_verif = "SELECT nom, prenom FROM annuaire";
                global $pdo;
                $verif = $pdo->prepare($request_verif);
                $verif->execute();
                while ($data = $verif->fetch(PDO::FETCH_ASSOC))
                {
                    $embody = [];
                    foreach ($data as $key => $value) {
                        $embody[] = $value;
                    }
                    /**
                     * on cree un tableeau du style
                     * [0]=>
                     * {
                     *  [0] => nom
                     *  [1] => prenom
                     * }
                     */
                    $line[] = $embody;
                }

                for($i=0; $i<count($line); $i++)
                {
                    if ($line[$i][0] == $name && $line[$i][1] == $nickname)
                    {
                        global $msg;
                        $erreur = true;
                        return $msg .= "<div class='alert alert-danger mb-3'>Vous êtes déjà inscrit dans l'annuaire</div>";
                    }
                    else
                    {
                        $erreur = false;
                    }
                }
                
                if($erreur == false)
                {
                    $request = "INSERT INTO annuaire (id_annuaire, nom, prenom, telephone, profession, ville, codepostal, adresse, date_naissance, sexe, description) VALUES (:id, :name, :nickname, :phone, :job, :city, :cp, :address, :birth, :sex, :desc)";
                    $result = $pdo->prepare($request);
                    $id = maxId() + 1;
                    $result->bindParam(':id', $id, PDO::PARAM_STR);
                    $result->bindParam(':name', $name, PDO::PARAM_STR);
                    $result->bindParam(':nickname', $nickname, PDO::PARAM_STR);
                    $result->bindParam(':phone', $phone, PDO::PARAM_STR);
                    $result->bindParam(':job', $job, PDO::PARAM_STR);
                    $result->bindParam(':city', $city, PDO::PARAM_STR);
                    $result->bindParam(':cp', $cp, PDO::PARAM_STR);
                    $result->bindParam(':address', $address, PDO::PARAM_STR);
                    $result->bindParam(':birth', $birth, PDO::PARAM_STR);
                    $result->bindParam(':sex', $sex, PDO::PARAM_STR);
                    $result->bindParam(':desc', $desc, PDO::PARAM_STR);
                    $result->execute();

                    $msg .= "<div class='alert alert-success mb-3'>Les informations du formulaire sont correctes!</div>";
                }
                else
                {
                   header("location : http://wf3/eprojet/eval/annuaire/views/error404.php");
                }
            } 
            else
            {
                $msg .= "<div class='alert alert-danger mb-3'>Veuillez remplir le formulaire correctement</div>";
            }
        }
    }
}