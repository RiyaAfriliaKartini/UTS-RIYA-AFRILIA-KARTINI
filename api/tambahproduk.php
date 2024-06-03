<?php
include "../aksi.php";
$aksi = new Aksi;
$id = $_GET['id'];
$nama = $_GET['nama'];
$satuan = $_GET['satuan'];
$harga = $_GET['harga'];
$stok = $_GET['stok'];
$hasil = $aksi->simpan($id,$nama,$satuan,$harga,$stok);
if($hasil==1){
    $respon = [
        'status'=>200,
        'pesan'=>'sukses'
    ];
}else{
    $respon = [
        'status'=>201,
        'pesan'=>'gagal'
    ];
}
echo json_encode($respon);
?>