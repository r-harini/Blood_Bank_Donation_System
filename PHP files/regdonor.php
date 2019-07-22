<html>
<body>
    <h1 align="center"> Red Drop Blood Bank</h1>
    
    <?php
     if(isset($_POST['Enter'])) {
    $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '12345';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
            $d_qty=$_POST['d_qty'];
            $d_id=$_POST['d_id'];
         $sql="Select d_qty from d_quantity where d_id='$d_id'";
          mysqli_select_db($conn,'blood_bank');
             $query=mysqli_query($conn,$sql)or die("Error: " . mysqli_error($conn));
             $row=mysqli_fetch_object($query);
             $b_qty=$row->d_qty;
             $qty=$b_qty+$d_qty;
             $sql3="Update d_quantity set d_qty='$qty', dod=sysdate() where d_id='$d_id'";
             mysqli_select_db($conn,'blood_bank');
             $query3=mysqli_query($conn,$sql3) or die("Error:" . mysqli_error($conn));
         
    $sql="Select b_id from d_quantity where d_id='$d_id'";
          mysqli_select_db($conn,'blood_bank');
             $query=mysqli_query($conn,$sql)or die("Error: " . mysqli_error($conn));
             $row=mysqli_fetch_object($query);
            $b_id=$row->b_id;
         $sql1="Select b_qty from stock where b_id='$b_id'";
    mysqli_select_db($conn,'blood_bank');
             $query1=mysqli_query($conn,$sql1)or die("Error: " . mysqli_error($conn));
             $row1=mysqli_fetch_object($query1);
             $b_qty=$row1->b_qty;
             $qty=$b_qty+$d_qty;
             $sql2="Update stock set b_qty='$qty' where b_id='$b_id'";
             mysqli_select_db($conn,'blood_bank');
             $query2=mysqli_query($conn,$sql2) or die("Error:" . mysqli_error($conn));
         
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error($conn));
            }
         echo "Entered data successfully\n";
         mysqli_close($conn);
     }else{
         ?>
    
    
    <form method="post"action="<?php $_PHP_SELF ?>">
        <br><br>
        <table align="center">
            <td align="right">Enter the user id:</td>
        <br> <br>
            <tr>
            <td align="right">User id:</td>
                <td align="left"><input type="number" name="d_id" size=5></td>
            </tr>
        <br><br>
            <tr>
                <td align="right">Quantity to donate:</td>
                <td align="left"><input type="number" name="d_qty" size=10></td>
            </tr>
        <br><br>
            <tr>
                <td align="right"><input type="submit" value="Enter" name="Enter"></td>
            </tr>
        </table>
    </form>
    <?php
     }
    ?>
    </body>
</html>