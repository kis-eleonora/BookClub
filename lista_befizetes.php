<?php
require_once 'connect.php';

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT `datum`, `befizetes` FROM `befizetes` WHERE `id`=". $id . ";";
$result = mysqli_query($conn, $sql);

$sql_2 = "SELECT SUM(`befizetes`) AS `osszesen` FROM `befizetes` WHERE `id`=". $id . ";";
$result_2 = mysqli_query($conn, $sql_2);
$row = mysqli_fetch_assoc($result_2);
$osszesen = $row['osszesen'];


if (mysqli_num_rows($result) > 0) {
    $data ='<table class="table table-striped">
        <thead>
                <th>Dátum</th>
                <th>Összeg</th>
           
        </thead>
        <tbody>';
    while ($row = mysqli_fetch_assoc($result)){
        $data .= '<tr>
      <td>'. $row['datum'].'</td>
      <td>'. $row['befizetes'].' Ft</td>
    </tr>';
    }
    $data .= '</tbody><tfoot>
        <tr>
            <th>Összesen:</th>
            <td>'. $osszesen .' Ft</td>
        </tr>
    </tfoot>
    </table>';
    echo $data;
}else {
    echo 'Nincs befizetése';
}