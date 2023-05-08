<?php
   include("sambungan.php"); 
   include("urusetia_menu.php");

   if (isset($_POST["submit"])) {
         $idpenilaian = $_POST["idpenilaian"]; 
         $aspek = $_POST["aspek"]; 
         $markahpenuh = $_POST["markahpenuh"]; 

         $sql = "insert into penilaian values('$idpenilaian', '$aspek', '$markahpenuh')"; 

         if (strlen($idpenilaian) < 2 or strlen($idpenilaian) > 3)
         {
             die("<script>alert('Ralat pada ID Penilaian. Minima adalah 2 dan maksima adalah 3 karakter. ');
                 window.history.back(); </script>");
         }

         if (strlen($aspek) < 1 or strlen($aspek) > 30)
         {
             die("<script>alert('Ralat pada Aspek. Minima adalah 1 dan maksima adalah 30 karakter.');
                 window.history.back(); </script>");
         }

         if (strlen($markahpenuh) < 1 or strlen($markahpenuh) > 11 or !is_numeric($markahpenuh)) 
         {
             die("<script>alert('Ralat pada markah penuh. Minima adalah 1 dan maksima adalah 11 nombor.')
                 window.history.back(); </script>");
         }

        $result = mysqli_query($sambungan, $sql);

        if ($result == true)
                echo"<script>alert('Aspek baru berjaya disimpan'); window.location.href='penilaian_senarai.php'; </script>";

        else

                echo"<script>alert('Tidak Berjaya Daftar. Sila cuba lagi.'); </script>";
         
}
?>

<link rel="stylesheet" href="borang.css"> 
<link rel="stylesheet" href="button.css">

<h3 class="panjang">TAMBAH PENILAIAN</h3>

<form class="panjang" action="penilaian_insert.php" method="post"> 
     <table> 
         <tr>
            <td>ID Penilaian</td>
            <td><input type="text" name="idpenilaian"></td> 
         </tr> 
         <tr>
            <td>Aspek Penilaian</td>
            <td><input type="text" name="aspek"></td> 
         </tr> 
         <tr>
            <td>Markah Penuh</td>
            <td><input type="text" name="markahpenuh"></td> 
         </tr> 
     </table> 
<button class="tambah" type="submit" name="submit">Tambah</button> 
</form>