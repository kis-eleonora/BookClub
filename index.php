<?php
include_once 'head.php';
require_once 'connect.php';
?>
<div class="container">
    <h1 class = "text-center">Bagoly Könyv Klub</h1>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?menu=tagok">Tagok</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?menu=befizetes">Befizetés</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://www.dszcberegszaszi.hu/" target="_blank">Az iskola honlapja</a>
        </li>
    </ul>

    <div>
        <?php
        $menu = filter_input(INPUT_GET, "menu", FILTER_SANITIZE_STRING);
        switch ($menu) {
            case "befizetes":
                require_once 'befizetes.php';
                break;
            default:
                require_once 'tagok.php';
                break;
        }
        ?>
    </div>
</div>  
<footer>
    <p>© Tisza-Kis Eleonóra, 2022</p>
</footer>
</body>
</html>
