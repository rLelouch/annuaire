<?php
    for ($pageTab=1; $pageTab<getPage()+1; $pageTab++)
    {
?>   

    <li class='page-item <?php echo "page" . $pageTab?>' aria-current='page'>
        <span class='page-link'>
            <a href="http://wf3/eprojet/eval/annuaire/?page=<?= $pageTab ?>" class="stretched-link text-white" >
                <?php echo $pageTab ?>
            </a>
        </span>
    </li>

<?php } ?>