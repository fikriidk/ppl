<?php

require_once('../db_login.php');
$id = isset($_POST['mahasiswa_id']) ? $_POST['mahasiswa_id'] : ''; 

if (!isset($_POST["update"])){
    echo "<script>console.log(".$id.")</script>";
    $query = " SELECT * FROM mahasiswa WHERE mahasiswa_id=" .$id. " ";
    //execute the query
    $result = $db->query($query);
    if (!$result){
        die ("Could not the query database: <br />" . $db->error);
    } else {
        while ($row = $result->fetch_object()){
            $id = $row->id;

            $nama = $row->nama;
            $nim = $row->nim;
            $fakultas = $row->fakultas;
            $prodi = $row->prodi;
            $angkatan = $row->angkatan;
            $alamat = $row->alamat;
            $kota = $row->kota;
            $provinsi = $row->provinsi;
            $email = $row->email;
            $no_tlp = $row->no_tlp;
        }
    }
} else{
    $valid = TRUE; //flag validasi
    $nama = test_input($_POST['nama']);
    if ($nama == ''){
        $error_nama = "nama is required";
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $nama)){
        $error_nama = "Only letters and white space allowed";
        $valid = FALSE;
    }

    $nim = test_input($_POST['nim']);
    if ($nim == ''){
        $error_nim = "nim is required";
        $valid = FALSE;
    }

    $fakultas = test_input($_POST['fakultas']);
    if ($fakultas == ''){
        $error_fakultas = "Address is required";
        $valid = FALSE;
    }

    $prodi = test_input($_POST['prodi']);
    if ($prodi == ''){
        $error_prodi = "prodi is required";
        $valid = FALSE;
    }

    $angkatan = test_input($_POST['angkatan']);
    if ($angkatan == ''){
        $error_angkatan = "angkatan is required";
        $valid = FALSE;
    }

    $alamat = test_input($_POST['alamat']);
    if ($alamat == ''){
        $error_alamat = "Address is required";
        $valid = FALSE;
    }

    $kota = test_input($_POST['kota']);
    if ($kota == ''){
        $error_kota = "kota is required";
        $valid = FALSE;
    }

    $provinsi = test_input($_POST['provinsi']);
    if ($provinsi == ''){
        $error_provinsi = "provinsi is required";
        $valid = FALSE;
    }
    $email = test_input($_POST['email']);
    if ($email == ''){
        $error_email = "email is required";
        $valid = FALSE;
    }
    $no_tlp = test_input($_POST['no_tlp']);
    if ($no_tlp == ''){
        $error_no_tlp = "Nomor HP is required";
        $valid = FALSE;
    }

    //add data into database
    if ($valid){
        //escape inputs data
        $alamat = $db->real_escape_string($alamat); //menghapus tanda petik
        //asign a query
        $query = " UPDATE mahasiswa SET nama='".$nama."', nim='".$nim."',fakultas='".$fakultas."', prodi='".$prodi."',alamat='".$alamat."', kota='".$kota."', provinsi='".$provinsi."', email='".$email."', no_tlp='".$no_tlp."' WHERE mahasiswa_id=".$id." ";
        //execute the query
        $result = $db->query($query);
        if (!$result){
            die ("Could not the query the database: <br>Query:" .$query);
        } else{
            //ketika sudah di submit , maka akan langsung pindah ke halaman view_customer.php
            $db->close();
            header('Location: edit_mhs.php');
        }
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta nama="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body style="
    background-color: #f0ebe3;
    background-image: url(assets/shoes_logo.png);
    background-size: 10%;
    ">
    <br>
    <div class="container" style="
            width: 60%;
            margin: auto;
            margin-top: 45px;
            margin-bottom: 30px;
        ">
        <div class="card" style="opakota:0.9;">
            <div class="card-header" style="background-color: #a9c4c2;">Edit Customers Data</div>
            <div class="card-body" style="background-color:#d6d6d6;">
                <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id=' .$id; ?>">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" nama="nama" value="<?php echo $nama;?>">
                    <!-- Fungsi isset() memeriksa apakah suatu variabel disetel, yang berarti variabel tersebut harus dideklarasikan dan bukan NULL. -->
                    <div class="text-danger"><?php if (isset($error_nama)) echo $error_nama;?></div>
                </div>

                <div class="form-group">
                    <label for="nim">NIM:</label>
                    <input type="text" class="form-control" id="nim" nama="nim" value="<?php echo $nim;?>">
                    <div class="text-danger"><?php if(isset($error_nim)) echo $error_nim;?></div>
                </div>

                <div class="form-group">
                    <label for="fakultas">Fakultas:</label>
                    <input type="text" class="form-control" id="fakultas" nama="fakultas" value="<?php echo $fakultas;?>">
                    <div class="text-danger"><?php if(isset($error_fakultas)) echo $error_fakultas;?></div>
                </div>
                
                <div class="form-group">
                    <label for="prodi">prodi:</label>
                    <input type="text" class="form-control" id="prodi" nama="prodi" value="<?php echo $prodi;?>">
                    <div class="text-danger"><?php if(isset($error_prodi)) echo $error_prodi;?></div>
                </div>
                <div class="form-group">
                    <label for="angkatan">angkatan:</label>
                    <input type="text" class="form-control" id="angkatan" nama="angkatan" value="<?php echo $angkatan;?>">
                    <div class="text-danger"><?php if(isset($error_angkatan)) echo $error_angkatan;?></div>
                </div>
                
                <div class="form-group">
                    <label for="alamat">Address:</label>
                    <textarea class="form-control" id="alamat" nama="alamat" rows="3"><?php echo $alamat;?></textarea>
                    <div class="text-danger"><?php if (isset($error_alamat)) echo $error_alamat;?></div>
                </div>

                <div class="form-group">
                    <label for="kota">kota:</label>
                    <input type="text" class="form-control" id="kota" nama="kota" value="<?php echo $kota;?>">
                    <div class="text-danger"><?php if(isset($error_kota)) echo $error_kota;?></div>
                </div>
                
                <div class="form-group">
                    <label for="provinsi">provinsi:</label>
                    <input type="text" class="form-control" id="provinsi" nama="provinsi" value="<?php echo $provinsi;?>">
                    <div class="text-danger"><?php if(isset($error_kota)) echo $error_kota;?></div>
                </div>
                
                <div class="form-group">
                    <label for="email">email:</label>
                    <input type="text" class="form-control" id="kota" nama="kota" value="<?php echo $kota;?>">
                    <div class="text-danger"><?php if(isset($error_kota)) echo $error_kota;?></div>
                </div>
                
                <div class="form-group">
                    <label for="no_tlp">Nomor HP:</label>
                    <input type="text" class="form-control" id="no_tlp" nama="no_tlp" value="<?php echo $no_tlp;?>">
                    <div class="text-danger"><?php if(isset($error_no_tlp)) echo $error_no_tlp;?></div>
                </div>
                
                <br>
                <button type="submit" class="btn btn-primary" nama="submit" value="submit">Submit</button>
                <a href="edit_mhs.php" class="btn btn-secondary">Back</a>
            </form>
            </div>
        </div>
    </div>
  </body>
</html>
<?php
$db->close();
?>