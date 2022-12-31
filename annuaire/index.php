<?php
include 'inc/init.inc.php';
include 'inc/functions.inc.php';
include 'model/model.php';

include 'controller/Affichage.php';
include 'controller/Enregistrement.php';

$countPage = 1;

if ($_POST)
{
    $enregistrement = new Enregistrement();
    $enregistrement->registre($_POST['name'], $_POST['nickname'], $_POST['phone'], $_POST['job'], $_POST['city'], $_POST['cp'], $_POST['address'], $_POST['birth'], $_POST['sex'], $_POST['desc']);
}

if(isset($_GET['page']))
{
    $countPage = $_GET['page'];
}

include 'inc/header.inc.php';
include 'views/home.php';
include 'inc/footer.inc.php';