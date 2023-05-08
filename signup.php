<?php
include('sambungan.php'); 
if (isset($_POST['nokp'])) {
      $nokp = $_POST["nokp"]; 
      $password = $_POST["password"];
      $namapeserta = $_POST["namapeserta"]; 
      $telefon = $_POST["no_tel"];
      $idhakim = $_POST["idhakim"]; 
      $idurusetia = $_POST["idurusetia"];

      if(strlen($nokp) < 12 or strlen($nokp) > 12 or !is_numeric($nokp))
      {
         die("<script>alert('Ralat pada nombor kad pengenalan.nokp tidak kurang atau tidak lebih daripada 12 dan hanya nombor sahaja diterima.');
             window.history.back(); </script>");
      }

      if(strlen($namapeserta) < 1 or strlen($namapeserta) > 30)
      {
         die("<script>alert('Ralat pada nama peserta. Minima adalah 1. maksima adalah 30 .');
            window.history.back(); </script>");
      }

      if(strlen($telefon) < 10 or strlen($telefon) > 12 or !is_numeric($telefon))
      {
         die("<script>alert('Ralat pada no telefon. Minima adalah 10, maksima adalah 12 dan nombor.');
            window.history.back(); </script>");
      }

      if (strlen($password) < 1 or strlen($password) > 8)
      {
         die("<script>alert('Ralat pada password. Minima adalah 1 dan maksima adalah 8 karakter.');
            window.history.back(); </script>");
      }

    $sql = "insert into peserta values('$nokp', '$password', '$namapeserta', '$telefon', '$idhakim', '$idurusetia')";

      $result = mysqli_query($sambungan, $sql);

      if ($result)
              echo"<script>alert('Berjaya Signup');
              window.location.href='login.php';
              </script>";
    else
              echo"<script>alert('Tidak Berjaya Signup');
              </script>";
    }

?>

<link rel="stylesheet" href="borang.css"> 
<link rel="stylesheet" href="button.css"> 
<body> 
    <center>
       <img src='imej/tajuk1.png'><br>
       <img src='imej/tajuk2.png'> 
   </center>

<h3 class="panjang">SIGN UP</h3> 
<form class="panjang" action="signup.php" method="post">
<table> 
    <tr>
       <td>No KP</td>
       <td><input type= "text" name="nokp"></td> 
   </tr> 
   <tr>
      <td> Nama Peserta</td>
    <td><input type="text" name="namapeserta"></td> 
  </tr> 
  <tr>
     <td>No Telefon</td> 
     <td><input type="text" name="no_tel"></td>
   </tr>
   <tr>
     <td>Password</td>
     <td><input type="text" name="password"></td> 
 </tr> 
 <tr>
     <td> Nama Hakim</td> 
     <td>
       <select name="idhakim">
       <option value selected disabled>Pilih</option> 
        <?php
            $sql = "select *from hakim"; 
            $data = mysqli_query($sambungan, $sql); 
            while ($hakim = mysqli_fetch_array($data)) {
                  echo "<option value='$hakim[idhakim]'>$hakim[namahakim]</option>";
            }
?>
</select>
 </td>
</tr>
<tr>
    <td class="warna">Nama Urusetia</td>
    <td>
        <select name="idurusetia">
            <option value selected disabled>Pilih</option>
            <?php
               $sql = "select * from urusetia";
               $data = mysqli_query($sambungan, $sql);
               while ($urusetia = mysqli_fetch_array($data)) {
                   echo "<option value='$urusetia[idurusetia]'>$urusetia[namaurusetia]</option>";
               }
            ?>
            </select>
        </td>
    </tr>
  </table>
  <button class="tambah" type="submit">Daftar</button>
  <button class="padam" type="reset">Reset</button>
  <button class="kembali" type="button" onclick="window.location='login.php'">Kembali</button>
  </form>
  </body>