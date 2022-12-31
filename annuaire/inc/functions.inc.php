<?php
function valid_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function gender($data) {
    if ($data=='m')
    {
        return $gender = 'Mr.';
    }
    else if ($data=='f')
    {
        return $gender = 'Mme.';
    }
    else
    {
        return $gender = '';
    }
}

function age($birth) {
    $birthY = date('Y', strtotime($birth));
    $curdate = date('Y');
    return $age = $curdate - $birthY;
}

function previousPage($countPage) {
    if($countPage > 1)
    {
        $countPage--;
    }
    echo $countPage;
}

function nextPage($countPage) {
    $nbPage = getPage();
    if($countPage < $nbPage)
    {
        $countPage++;
    }
    echo $countPage;
}

function currentUrl()
{
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
        $url = "https"; 
    else
        $url = "http"; 
    
    // Ajoutez // à l'URL.
    $url .= "://"; 
        
    // Ajoutez l'hôte (nom de domaine, ip) à l'URL.
    $url .= $_SERVER['HTTP_HOST']; 
        
    // Ajouter l'emplacement de la ressource demandée à l'URL
    $url .= $_SERVER['REQUEST_URI']; 
        
    // Afficher l'URL
    return $url; 
}

function activePage()
{
    $currentUrl = currentUrl();
}