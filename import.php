<?php
   include('sambungan.php'); 

   include("urusetia_menu.php");
   
   if(isset($_POST["submit"])) {
        $namajadual = $_POST['namatable']; 
        $namafail = $_FILES['namafail']['name'];

        if (file_exists($namafail)==false) {
            echo "<script>alert('Fail belum dipilih');</script>";
        }
        else {


        
        $sementara = $_FILES['namafail']['tmp_name']; 
        move_uploaded_file($sementara, $namafail);

        $fail = fopen($namafail, "r"); 
        while (!feof($fail)) {

                 $medan = explode(",", fgets($fail));
                 
                 $berjaya = false;

                 if (strtolower($namajadual) === "peserta") {
                       $nokp=$medan[0]; 
                       $password=$medan[1]; 
                       $namapeserta=$medan[2]; 
                       $telefon=$medan[3]; 
                       $idhakim=$medan[4]; 
                       $idurusetia=$medan[5];

                       $sql = "insert into peserta values('$nokp', '$password', '$namapeserta','$telefon','$idhakim', '$idurusetia')"; 
                       if (mysqli_query($sambungan, $sql))
                            $berjaya = true; 
                       else

                           echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>"; 
                } // tamat if

                if (strtolower($namajadual) === "hakim") {

                     $idhakim=$medan[0]; 
                     $namahakim=$medan[1]; 
                     $password=$medan[2]; 
                     $sql="insert into hakim values('$idhakim', '$namahakim', '$password')";

                     if (mysqli_query($sambungan, $sql))
                          $berjaya = true; 
                     else

                          echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
               }// tamat if 

               if (strtolower($namajadual) === "urusetia") {

                     $idurusetia=$medan[0]; 
                     $namaurusetia=$medan[1]; 
                     $password=$medan[2]; 
                     $sql="insert into urusetia values('$idurusetia', '$namaurusetia', '$password')";

                     if (mysqli_query($sambungan, $sql))
                          $berjaya = true; 
                     else

                          echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
               }// tamat if 













        } // tamat while

        if ($berjaya == true)
             echo "<script>alert('Rekod berjaya diimport'); </script>"; 
             //window.alert("Rekod berjaya di import.");
        else
             echo "<script>alert('Rekod tidak berjaya di import'); </script>";
             //window.alert("Rekod tidak berjaya di import.");
        mysqli_close($sambungan);
    }

}
?>


<html>
   <link rel="stylesheet" href="borang.css"> 
   <link rel="stylesheet" href="button.css">

   <body>
      <h3 class="panjang">IMPORT DATA</h3> 
      <form class="panjang" action="import.php" method="post" 
             enctype = "multipart/form-data" class="import">

          <table> 
             <tr>
                 <td>Jadual</td> 
                 <td> 
                    <select name="namatable">
                        <option>Peserta</option>
                        <option>Hakim</option>
                        <option>Urusetia</option> 
                    </select> 
                 </td> 
             </tr>
           
             <tr>
                 <td>Nama fail</td>
                 <td><input type="file" name="namafail" accept=".txt"></td> 
             </tr> 
          </table>
          <button class="import" type="submit" name="submit">Import</button> 
     </form> 
  </body> 
</html>