<html>
    <body >
        <h1 align='center'> Red Drop Blood Bank</h1>
         <?php
         if(isset($_POST['H_register'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '12345';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
         
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error($conn));
            }

            if(! get_magic_quotes_gpc() ) {
               $h_name = addslashes ($_POST['h_name']);
               $h_add = addslashes ($_POST['h_add']);
                $h_email=addslashes($_POST['h_email']);
            } else {
               $h_name = $_POST['h_name'];
               $h_add = $_POST['h_add'];
                $h_email=$_POST['h_email'];
            }
             $h_id=$_POST['h_id'];
            
            
            
             $h_phno=$_POST['h_phno'];
   
            $sql = "INSERT INTO hospital ".
               "(h_id, h_name, h_add, h_phno, h_email) "."VALUES ".
               "('$h_id','$h_name','$h_add','$h_phno','$h_email')";
               mysqli_select_db($conn,'blood_bank');
            $retval = mysqli_query( $conn, $sql );
         
            if(! $retval ) {
               die('Could not enter data: ' . mysqli_error($conn));
            }
         
            echo "Entered data successfully\n";
            mysqli_close($conn);
         } else {
      ?>
        <form method="post" action = "<?php $_PHP_SELF ?>">
            <h2 align="center"> Hospital</h2>
            <h4><br>
            <table align="center">
                <tr>
                    <td align="right">Hospital_id:</td>
                    <td align="left"><input type="number" name="h_id" size=4></td>
                </tr>
            <br><br>
                <tr>
                    <td align="right">Hospital Name:</td>
                    <td align="left"><input type="text" name="h_name" size=10></td>
                </tr>
            <br><br>
                <tr>
                    <td align="right">Hospital Address:</td>
                    <td align="left"><input type="text" name="h_add" size=10></td>
                </tr>
            <br><br>
                <tr>
                    <td align="right">Hospital phone no:</td>
                    <td align="left"><input type="number" name="h_phno" size=10></td>
                </tr>
            <br><br>
                <tr>
                    <td align="right">Hospital email:</td>
                    <td align="left"><input type="email" name="h_email" size=10></td>
                </tr>
            <br><br>
                <tr>
                    <td align="right"><input type="submit" value="Register" name="H_register"></td>
                </tr>
            </table>
            
            </h4>
        </form>
        <?php

}
      ?>
    </body>
</html>