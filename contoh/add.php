<?php  
//file save-form.php  
session_start();  
    if($_POST){  
        $nama = $_POST['nama'];  
        $email = $_POST['email'];  
        $alamat = $_POST['alamat'];  
        $kota = $_POST['kota'];  
        $kodePos = $_POST['kode_pos'];  
    $error = array();  
        if(empty($nama)){  
      $error['nama'] = 'Nama tidak boleh kosong';  
        }  
    if(empty($email)){  
      $error['email'] = 'Email tidak boleh kosong';  
    }  
    if(empty($alamat)){  
      $error['alamat'] = 'Alamat tidak boleh kosong';  
    }  
    if(empty($kota)){  
      $error['kota'] = 'Kota tidak boleh kosong';  
    }  
    if(empty($kodePos)){  
      $error['kode_pos'] = 'Kode pos tidak boleh kosong';  
    }  
   
    }  
?>   