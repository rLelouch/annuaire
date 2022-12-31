
    <div class='mb-5'>
        <?php
            echo $msg;
        ?>
    </div>

    <div class='container-lg position-absolute top-50 start-50 translate-middle'>
        <div class='card text-center'>
            <div class='card-header'>
                <ul class='nav nav-tabs' id='myTabs' role='tablist'>
                    <li class='nav-item' role='presentation'>
                        <button class='nav-link active' id='home-tab' data-bs-toggle='tab' data-bs-target='#home-tab-pane' type='button' role='tab' aria-controls='home-tab-pane' aria-selected='true'>Annuaire</button>
                    </li>
                    <li class='nav-item' role='presentation'>
                        <button class='nav-link' id='contact-tab' data-bs-toggle='tab' data-bs-target='#contact-tab-pane' type='button' role='tab' aria-controls='contact-tab-pane' aria-selected='false'>Formulaire</button>
                    </li>
                </ul>
            </div>

            <div class='card-body tab-content' id='myTabContent'>
                <div class='tab-pane fade show active' id='home-tab-pane' role='tabpanel' aria-labelledby='home-tab' tabindex='0'>
                    <?php
                        $affichage = new Annuaire();
                        $affichage->display();
                        include 'views/nav/nav.html.php';
                    ?>
                </div>
                <?php include 'views/home/home_form.html.php'?>
            </div>
        </div>        
    </div>