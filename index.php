<?php
include_once 'head.php';
require_once 'connect.php';
?>

<h1>Bagoly Könyv Klub</h1>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php">Tagok</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="befizetes.php">Befizetés</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Az iskola honlapja</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    
        </nav>
        <div class="container">
            <div class="row">
                <?php
                $sql = "SELECT `csaladnev`, `utonev`, `szuletett`, `belepett` FROM `tagok` WHERE 1;";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $datum1 = date_create_from_format('Y-m-d', $row['szuletett']);
                    $datum2 = date_create_from_format('Y-m-d', date('Y-m-d'));
                    $eletkor = (array) date_diff($datum2, $datum1);

                    echo '<div class="col">'
                    . '<div class="keret">'
                    . '<img src="images/' . $row['csaladnev'] . ' ' . $row['utonev'] . '.jpg" alt="profilkép"/>'
                    . '<h5>' . $row['csaladnev'] . ' ' . $row['utonev'] . '</h5>'
                    . '<p>Kora: ' . $eletkor['y'] . '</p>'
                    . '<p>Belépett: ' . $row['belepett'] . '</p>'
                    . '<button type="button" class="btn btn-primary">Befizetések</button>'
                    . '</div>'
                    . '</div>';
                }
                ?>

            </div>
        </div>  
        <footer>
            <p>© Tisza-Kis Eleonóra, 2022</p>
        </footer>
    </body>
</html>
