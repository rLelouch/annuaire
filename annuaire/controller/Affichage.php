<?php
class Annuaire
{
    public function display()
    {
        if(isset($_GET['page']))
        {
            $page = $_GET['page'];
            if($_GET['page'] > 0)
            {
                $page = abs((intval($_GET['page'])-1)*10);
            }
            else
            {
                header('Location : http://wf3/eprojet/eval/annuaire/views/error404.php');
                die;
            }
        }
        else if(empty($_GET) || !isset($_GET['page']))
        {
            $page = 1;
        }
        else
        {
            header('Location : http://wf3/eprojet/eval/annuaire/views/error404.php');
            die;
        }
        $request = "SELECT nom, prenom, telephone, profession, adresse, ville, codepostal, sexe, DATE_FORMAT(date_naissance, '%d/%m/%Y'), description FROM annuaire ORDER BY nom ASC LIMIT 10 OFFSET ".$page."";
        global $pdo;
        $result = $pdo->prepare($request);
        $result->execute();

        while ($data = $result->fetch(PDO::FETCH_ASSOC))
        {
            $embody = [];
            foreach ($data as $key => $value)
            {
                $embody[] = $value;
            }
            $line[] = $embody;
        }
        if ($result->rowCount() > 0)
        {
            echo "<table class='table table-striped table-hover'>
                <thead>
                    <tr>";
                        echo "<th scope='col'> # </th>";
                        for ($i = 0; $i < $result->columnCount() - 3; $i++) {
                            $column = $result->getColumnMeta($i);
                            echo "<th scope='col'>" . $column['name'] . "</th>";
                        }
                    echo "</tr>
                </thead>
                <tbody>";
                for ($j = 1; $j < count($line) + 1; $j++)
                {
                    echo "<tr>
                        <th scope='row'>
                            <a href='views/info.php?name=" . strtolower($line[$j - 1][0]) . "&nickname=" . strtolower($line[$j - 1][1]) . "'>
                                " . ($page+$j) . "
                            </a>
                        </th>";
                        for ($i = 0; $i < 7; $i++)
                        {
                            if (gettype($line[$j - 1][$i]) == 'string')
                            {
                                echo "<td>" . ucfirst($line[$j - 1][$i]) . "</td>";
                            }
                            else
                            {
                                echo "<td>" . $line[$j - 1][$i] . "</td>";
                            }
                        }
                    echo "</tr>";
                }
                echo "</tbody>
            </table>";
        }
        else
        {
            //header('Location : http://wf3/eprojet/eval/annuaire/views/error404.php');
            die;
        }
    }
}