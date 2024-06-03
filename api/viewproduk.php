<?php
include "../aksi.php";
$id = new Aksi;
echo json_encode($id->tampilkan());
?>