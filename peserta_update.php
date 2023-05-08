<?php
   include("sambungan.php"); 
   include("urusetia_menu.php");

   if (isset($_POST["submit"])) {
         $nokp = $_POST["nokp"];
         $password = $_POST["password"]; 
         $namapeserta = $_POST["namapeserta"];

         $telefon = $_POST["telefon"];
         $idhakim = $_POST["idhakim"];
         $idurusetia = $_POST["idurusetia"];

         $sql = "update peserta set password = '$password', namapeserta = '$namapeserta', telefon = '$telefon',
                idhakim = '$idhakim', idurusetia = '$idurusetia' where nokp = '$nokp'
         ";

         $result = mysqli_query($sambungan, $sql); 
         if ($result == true)

             echo "<script>alert('Berjaya kemaskini');
             window.location.href='peserta_senarai.php';
             </script>"; 
         else
             echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
    }


    if (isset($_GET['nokp']))
          $nokp = $_GET['nokp'];

    $sql = "select * from peserta where nokp = '$nokp'
    ";

    $result = mysqli_query($sambungan, $sql); 
    while($peserta = mysqli_fetch_array($result)) {
        $namapeserta = $peserta['namapeserta'];
        $telefon = $peserta['telefon']; 
        $password = $peserta['password'];
        $idhakim = $peserta['idhakim'];
        $idurusetia = $peserta['idurusetia'];
    } 
?>

<link rel="stylesheet" href="borang.css"> 
<link rel="stylesheet" href="button.css">

<h3 class="panjang">KEMASKINI PESERTA</h3> 
<form class="panjang" action="peserta_update.php" method="post"> 
<table> 
    <tr>
        <td>No KP</td>
        <td><input type="text" name="nokp" value="<?php echo $nokp; ?>" readonly></td> 
    </tr> 
    <tr>
        <td>Nama Peserta</td>
        <td><input type="text" name="namapeserta" value= "<?php echo $namapeserta; ?>" ></td> 
    </tr> 
    <tr> 
        <td>No Telefon</td>
        <td><input type="text" name="telefon" value= "<?php echo $telefon; ?>" ></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="text" name="password" value= "<?php echo $password; ?>" ></td>
    </tr>
    <tr>
        <td>IDHakim</td>
        <td>    <select name="idhakim">
                    <?php $query="select * from hakim"; 
                          $panggil=mysqli_query($sambungan, $query);
                          while($data=mysqli_fetch_array($panggil)) {
                    ?>  
                            <option value="<?php echo $data['idhakim'] ?>">
                                 <?php echo $data['idhakim'] ?> 
                            </option>
                    <?php } ?> 
                </select>
            </td> 
    </tr> 
    <tr>
        <td>IDUrusetia</td> 
        <td>
                <select name="idurusetia">
                   <?php 
                   $query="select * from urusetia"; 
                   $panggil=mysqli_query($sambungan, $query); 
                   while($data=mysqli_fetch_array($panggil)) {?> 
                       <option value="<?php echo $data['idurusetia'] ?>">
                            <?php echo $data['idurusetia'] ?> 
                       </option>
                   <?php } ?> 
                </select>
            </td>
    </tr>
    </table> 
<button class="update" type="submit" name="submit">Update</button>
</form>
