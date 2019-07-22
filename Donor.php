<html>
<body >
   <h1 align="center"> Red Drop Blood Bank </h1>
    
    <?php
         if(isset($_POST['D_register'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '12345';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
         
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error($conn));
            }

            if(! get_magic_quotes_gpc() ) {
               $d_name = addslashes ($_POST['D_name']);
               $d_add = addslashes ($_POST['D_add']);
            } else {
               $d_name = $_POST['D_name'];
               $d_add = $_POST['D_add'];
            }
             $d_id=$_POST['D_id'];
            $d_age = $_POST['D_age'];
             $d_qty=$_POST['D_qty'];
             $d_bid=$_POST['D_bid'];
             $d_phno=$_POST['D_phno'];
             
             
            $sql = "INSERT INTO donor ".
               "(donor_id, d_name, d_age, d_add, d_phno) "."VALUES ".
               "('$d_id','$d_name','$d_age','$d_add','$d_phno')";
               mysqli_select_db($conn,'blood_bank');
            $retval = mysqli_query( $conn, $sql );
             $sql1="INSERT into d_quantity".
                 "(d_id, b_id, d_qty)"."VALUES".
                 "('$d_id','$d_bid',0)";
             mysqli_select_db($conn,'blood_bank');
            $retval = mysqli_query( $conn, $sql1 );
         
            if(! $retval ) {
               die('Could not enter data: ' . mysqli_error($conn));
            }
         
            echo "Entered data successfully\n";
            mysqli_close($conn);
         } else {
      ?>
<form method="post" action = "<?php $_PHP_SELF ?>">
    <h1 align="center">Donor</h1>
    
    <table align="center">
        <tr>
        <td align="left">User id:</td>
        <td align="left"><input type="number" name="D_id" size=4></td>
        </tr>
<br><br>
        <tr>
        <td align="left">Donor name:</td>
        <td align="left"><input type="text" name="D_name" size=10></td>
        </tr>
    <br><br>
        <tr>
        <td align="left">Age</td>
        <td align="left"><input type="number" name="D_age" size=1 ></td>
        </tr>
    <br><br>
        <tr>
        <td align="left">Donor bloodgroup:</td>
    <td align="left"><select name="D_bid" size=1>
    <option> 1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option> 6</option>
    <option> 7</option>
    <option> 8</option>
        </select></td>
        </tr>
    <br>
    <br>
        <tr>
        <td align="left">Quantity to be donated:</td>
        <td align="left"><input type="number" name="D_qty" size=3> ml</td>
        </tr>
    <br>
    <br>
    <tr>
        <td align="left">Address:</td>
        <td align="left"> <input type="text" name="D_add" size=10></td>
        </tr>
    <br><br>
        <tr>
        <td align="left">Phone number:</td>
        <td align="left"><input type="number" name="D_phno" size=10></td>
        </tr>
        <tr></tr>
        <tr></tr>        <tr></tr>
        <tr></tr>
        <tr></tr>

        <tr>
        <td align="right"><input type="submit" value="Register" name="D_register" ></td>
        </tr>
    </table>

</form>
    <?php

}
      ?>
</body>
</html>