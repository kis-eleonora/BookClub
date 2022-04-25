<div class="row">

    <?php
    require_once 'connect.php';

    $sql = "SELECT `csaladnev`, `utonev`, `szuletett`, `belepett` FROM `tagok` WHERE 1;";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $datum1 = date_create_from_format('Y-m-d', $row['szuletett']);
        $datum2 = date_create_from_format('Y-m-d', date('Y-m-d'));
        $eletkor = (array) date_diff($datum2, $datum1);
        echo '<div class="card m-3" style="width: 18rem;">
            <img src="images/' . $row['csaladnev'] . ' ' . $row['utonev'] . '.jpg" class="img-thumbnail rounded-circle" alt="...">
            <div class="card-body">
                <h5 class="card-title">' . $row['csaladnev'] . ' ' . $row['utonev'] . '</h5>
                <p class="card-text">Kora: ' . $eletkor['y'] . '</p>
                <p>Belépett: ' . $row['belepett'] . '</p>
                <a class="btn btn-primary" href="index.php?menu=befizetes" role="button">Befizetések</a>
                
            </div>
        </div>';
    }
    ?>       
</div>