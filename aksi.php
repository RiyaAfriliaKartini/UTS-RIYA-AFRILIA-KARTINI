<?php 
class Aksi{
  protected $mysqli;
  function __construct(){
    include "database.php";
    $conn = new database();    
    $this->mysqli = $conn->connect();        
  }
  function tampilkanProduk($key){
    $hasil=[];
    $data = $this->mysqli->query("SELECT * FROM tbl_produk WHERE nama LIKE '%$key%'");
    while($amb = mysqli_fetch_assoc($data)){
      $hasil[] = $amb;
    }    
    return $hasil;
  }

  function tampilkan(){ 
  $hasil=[];       
    $data = $this->mysqli->query("SELECT * FROM tbl_produk");
    while($amb = mysqli_fetch_assoc($data)){
      $hasil[] = $amb;
    }    
    return $hasil;
  }
  function simpan($id,$nama,$satuan,$harga,$stok){
    // $tmpName = $_FILES['foto']['tmp_name'];
    // $name = $_FILES['foto']['name'];
    // $lokasi = "foto/".$name;
    // $foto = move_uploaded_file($tmpName, $lokasi);

    //$result = $this->mysqli->query("INSERT INTO tabel_mhs values('$nim','$nama','$prodi','$lokasi','$alamat')");		    
    $result = $this->mysqli->query("INSERT INTO tbl_produk values ($id,'$nama','$satuan','$harga','$stok')");		    
    if($result) return 1;
      else return 0;    
  }
  function update($id,$nama,$satuan,$harga,$stok){    
    $result = $this->mysqli->query("UPDATE tbl_produk SET id = '$id', nama = '$nama', satuan = '$satuan', harga = '$harga', stok ='$stok' WHERE id = '$id'");		    
    if($result) return 1;
      else return 0;    
  }
  function detail($id){    
    $result = $this->mysqli->query("SELECT * FROM tbl_produk WHERE id = '$id'");		
    $data   = $result->fetch_assoc();        
    return $data;
  }
  function hapus($id){    
    $this->mysqli->query("DELETE FROM tbl_produk WHERE id = '$id'");		    
	}
}
?>