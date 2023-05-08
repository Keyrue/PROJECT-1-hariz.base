<?php
   include("sambungan.php"); 
     include("hakim_menu.php");



   $nokp = $_POST["nokp"]; 
   $jumlah_markah = $_POST["jumlah_markah"]; 

   $sql = "select * from penilaian"; 
   $data = mysqli_query($sambungan, $sql);
   

   while ($penilaian = mysqli_fetch_array($data)) {
       $markah = $_POST["$penilaian[idpenilaian]"]; 
       $idpenilaian = $penilaian['idpenilaian']; 

       $sql = "insert into keputusan values('$nokp', '$idpenilaian', '$markah', '$jumlah_markah')"; 
       $result = mysqli_query($sambungan, $sql);
       
        if ($result == true)
                echo"<script>alert('Markah berjaya disimpan'); 
            window.location.href='hakim_borang.php'; </script>";

        else

                echo"<script>alert('Markah Tidak Berjaya Di Daftar. Sila cuba lagi.');
                 window.location.href='hakim_borang.php'; </script>";


        }
?>