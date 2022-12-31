                    <nav aria-label='...' class='d-flex align-items-center justify-content-center'>
                        <ul class='pagination'>
                            <li class='page-item' aria-current='page'>
                                <span class='page-link'>
                                    <a href="http://wf3/eprojet/eval/annuaire/?page=<?php previousPage($countPage) ?>"
                                 class="stretched-link text-black" >
                                        Previous
                                    </a>
                                </span>
                            </li>
                            <?php include 'addTab.html.php' ?>
                            <li class='page-item' aria-current='page'>
                                <span class='page-link'>
                                    <a href="http://wf3/eprojet/eval/annuaire/?page=<?php nextPage($countPage) ?>"
                                    class="stretched-link text-black" >
                                        Next
                                    </a>
                                </span>
                            </li>
                        </ul>
                    </nav>