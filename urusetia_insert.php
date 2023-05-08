<?php
    include("sambungan.php");
    include("urusetia_menu.php");

    if (isset($_POST["submit"])) {
        $idurusetia = $_POST["idurusetia"]; 
        $password = $_POST["password"]; 
        $namaurusetia = $_POST["namaurusetia"];

        $sql = "insert into urusetia values('$idurusetia', '$password', '$namaurusetia')"; 

        if (strlen($idurusetia)<2 or strlen($idurusetia)>3)
        {
            die("<script>alert('Berlaku ralat IDurusetia sila cuba lagi.');
                window.history.back();</script>");
        }

       if (strlen($password)<1 or strlen($password)>8)
        {
            die("<script>alert('Berlaku ralat password sila cuba lagi.');
                window.history.back();</script>");
        }
            
       if (strlen($namaurusetia) < 1 or strlen($namaurusetia) > 30)
       {
            die("<script>alert('Ralat pada nama urusetia. Minima adalah 1 dan maksima adalah 30
                karakter.'); window.history.back(); </script>");
        }

        $result = mysqli_query($sambungan, $sql);

        if ($result == true)
                echo"<script>alert('Urusetia baru berjaya disimpan'); window.location.href='urusetia_senarai.php'; </script>";

        else
                echo"<script>alert('Tidak Berjaya Daftar. Sila cuba lagi.'); </script>";
            


   }
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3 class="panjang">TAMBAH URUSETIA</h3> 
<form class="panjang" action="urusetia_insert.php" method="post">
    <table>

        <tr>
            <td>ID urusetia</td>
            <td><input type="text" name="idurusetia"></td> 
        </tr>

        <tr>
            <td>Nama Urusetia</td>
            <td><input type="text" name="namaurusetia"></td> 
        </tr>

        <tr>
            <td>Password</td> 
            <td><input type="password" name="password" placeholder="max: 8 char"></td> 
        </tr>

    </table> 
        <button class="tambah" type="submit" name="submit">Tambah</button>  
</form>