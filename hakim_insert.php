<?php
   include("sambungan.php"); 
   include("urusetia_menu.php");

   if (isset($_POST["submit"])) {

         $idhakim = $_POST["idhakim"]; 
         $password = $_POST["password"]; 
         $namahakim = $_POST["namahakim"];

         $sql = "insert into hakim values('$idhakim', '$password', '$namahakim')";

                  if (strlen($idhakim) < 2 or strlen($idhakim) > 3)
         {
             die("<script>alert('Ralat pada ID Hakim. Minima adalah 2 dan maksima adalah 3 karakter. ');
                 window.history.back(); </script>");
         }

                  if (strlen($password) < 1 or strlen($password) > 8)
         {
             die("<script>alert('Ralat pada Password. Minima adalah 1 dan maksima adalah 8 karakter. ');
                 window.history.back(); </script>");
         }
                  if (strlen($namahakim) < 1 or strlen($namahakim) > 30)
         {
             die("<script>alert('Ralat pada Namahakim. Minima adalah 1 dan maksima adalah 30 karakter. ');
                 window.history.back(); </script>");
         }





         $result = mysqli_query($sambungan, $sql); 

         if ($result == true)
                echo"<script>alert('Hakim baru berjaya disimpan'); 
            window.location.href='hakim_senarai.php'; </script>";

        else

                echo"<script>alert('Tidak Berjaya Daftar. Sila cuba lagi.'); </script>";
        }
?>
<link rel="stylesheet" href="borang.css"> 
<link rel="stylesheet" href="button.css">


<h3 class="panjang">TAMBAH HAKIM</h3> 
<form class="panjang" action="hakim_insert.php" method="post"> 
	<table> 
		<tr>
            <td>ID Hakim</td>
            <td><input type="text" name="idhakim"></td> 
        </tr> 
        <tr>
            <td>Password</td>
            <td><input type="text" name="password"></td> 
        </tr> 
        <tr>
            <td>Nama Hakim</td>
            <td> <input type="text" name="namahakim"></td> 
        </tr> 
    </table>
    <button class="tambah" type="submit" name="submit" >Tambah</button> 
</form>