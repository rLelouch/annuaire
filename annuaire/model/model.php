<?php
function getPage(){
    global $pdo;
    $request = "SELECT * FROM annuaire";
    $result = $pdo->query($request);
    $nbPageTotal = $result->rowCount();
    $nbPage = intdiv($nbPageTotal, 10) + 1 ;
    return $nbPage;
}

// fonctions pour recuperer l'id le plus haut pour que les id soient des chiffres/nombres consecutifs
function maxId() {
    global $pdo;
    $request = "SELECT id_annuaire FROM annuaire ORDER BY id_annuaire DESC LIMIT 1";
    $result = $pdo->prepare($request);
    $result->execute();
    $maxId = $result->fetchColumn();
    return $maxId;
}