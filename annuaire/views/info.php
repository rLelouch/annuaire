<?php
include '../inc/init.inc.php';
include '../inc/functions.inc.php';

if(!empty($_GET) && isset($_GET['name'], $_GET['nickname']))
{
    $name = $_GET['name'];
    $nickname = $_GET['nickname'];

    $request = "SELECT profession, sexe, date_naissance, description FROM annuaire WHERE nom = '" . $name . "' AND prenom = '" . $nickname . "' ";
    global $pdo;
    $result = $pdo->prepare($request);
    $result->execute();
    if ($result->rowCount() == 1)
    {
        while ($data = $result->fetch(PDO::FETCH_ASSOC))
        {
            foreach ($data as $key => $value)
            {
                // job - sexe - date_anniversaire - desc
                $line[] = $value;
            }
        }

    }
    else
    {
        header('Location : http://wf3/eprojet/eval/annuaire/views/error404.php');
        die;
    }
}
else
{
    header('Location : http://wf3/eprojet/eval/annuaire/views/error404.php');
    die;
}

$job = $line[0];
$sex = $line[1];
$birth = $line[2];
$desc = $line[3];

include '../inc/header.inc.php';
?>

<div class="container-lg position-absolute top-50 start-50 translate-middle">
    <div class="card">
        <h5 class="card-header">
            <?php
                $statut = gender($sex);
                echo $statut . " " .ucfirst($name). " " . ucfirst($nickname);
            ?>
        </h5>
        <div class="card-body">
            <h5 class="card-title"><?= ucfirst($job) . " - " . age($birth) . " ans" ?></h5>
            <p class="card-text"><?= "Description de l'activité : <span class='ms-3'>" . ucfirst($desc) ?></span></p>
            <a href="../index.php" class="btn btn-primary">Retour</a>
        </div>
    </div>
</div>

<?php
include '../inc/footer.inc.php';