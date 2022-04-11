<?php
include_once 'head.php';
include_once 'uj_befizetes.php';
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
<div class="form">
    <form method="POST">
        <select name="id" id="id" onchange="befizetesek()" class="form-control">
            <?php
            $sql = "SELECT `id`, `csaladnev`, `utonev` FROM `tagok` WHERE 1;";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo '<option value = "' . $row['id'] . '">' . $row['csaladnev'] . ' ' . $row['utonev'] . '</option>';
            }
            ?>

        </select>
        <input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" id = "datum" name = "datum">
        <input class="form-control" type="number" id = "osszeg" name = "osszeg">
        <button type="submit" name="befizet" value="true" class="btn btn-success">Új befizetés</button>
    </form>
    <?php
    if (isset($_SESSION['error'])) {
        echo '<div class="error" style="color:red;">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
//        exit();
    }
    if (isset($_SESSION['success'])) {
        echo '<div class="error" style="color:green;">' . $_SESSION['success'] . '</div>';
        unset($_SESSION['error']);
//        exit();
    }
    ?>

</div>
<div id="befizetesek">

</div>
<script>
    function befizetesek() {
        var x = document.getElementById("id").value;
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            document.getElementById("befizetesek").innerHTML = this.responseText;
        };
        xhttp.open("GET", "lista_befizetes.php?id=" + x);
        xhttp.send();
    }
</script>
<footer>
    <p>© Tisza-Kis Eleonóra, 2022</p>
</footer>
