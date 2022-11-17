<?php
session_start();
$con = mysqli_connect("localhost","root","","ppl");

if(isset($_POST('submit'))){
    $id = $_POST['mahasiswa_id'];

    $nama =  $_POST['nama'];
    $nim =  $_POST['nim'];
    $fakultas =  $_POST['fakultas'];
    $prodi = $_POST['prodi'];
    $angkatan =  $_POST['angkatan']; 
    $alamat =  $_POST['alamat'];
    $kota =  $_POST['kota'];
    $provinsi =  $_POST['provinsi'];
    $email = $_POST['email'];
    $no_tlp = $_POST['no_tlp'];

    $query = "UPDATE mahasiswa SET alamat='$alamat', kota='$kota', provinsi='$provinsi', no_tlp='$no_tlp' WHERE mahasiswa_id='$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION["status"] = "Data Updated";
        header("location: update-data-by-id.php");
    }
    else{
        $_SESSION["status"] = "NOT UPDATED !1!1!1!";
        header("location: update-data-by-id.php");
    }
}

?>