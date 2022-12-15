
<?php

header('Content-Type: application/json');
// include dirname(dirname(__FILE__)).'/db/Db.class.php';. $_GET['search']."'";
require_once('database.php');
$nama = $_GET['search'];
$sql = "select * from project where nama LIKE '%$nama%'";
$query = mysqli_query($konek, $sql);

while($dt = mysqli_fetch_array($query)) {
    $item[] = array(
        'nama' => $dt['nama']
    );
}

// print_r($item);
$json = array(
    'result' => 'ok',
    'item' => $item
);

echo json_encode($json);
?>
