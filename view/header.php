<?php

$name = $_SESSION['name'];

?>
<header>
    <div id="sticker" class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">

                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <a class="navbar-brand page-scroll sticky-logo" href="index.php">
                                <h1>ammu-nation<span>.com</span></h1>
                            </a>
                        </div>
                        <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a class="page-scroll" href="#home">Home</a>
                                </li>                         
                                <li>
                                    <a class="page-scroll" href="#contact">Contact</a>
                                </li class="active">
                                <li>
                                    <a class="page-scroll" href="gunManager/index.php">Manager</a>
                                </li>
                                <li>
                                    <?php
                                        echo"Hi, ";
                                        echo $name;
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
