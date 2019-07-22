<html>
    <body >
        <h1 align='center'> Red Drop Blood Bank</h1>
        <?php
        $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '12345';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
         
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error($conn));
            }
            $data="Select * from blood";
            mysqli_select_db($conn,'blood_bank');
            $val=mysqli_query($conn,$data)or die("Error: " . mysqli_error($conn));
            echo "<table >";
            echo "<tr><th>blood_id</th><th>b_grp</th></tr>";
            while($row=mysqli_fetch_array($val,MYSQLI_ASSOC)){
                echo "<tr><td >".$row['blood_id']."</td><td> " .$row['b_grp']. "</td></tr>";
            }
            echo "</table><br>";
            mysqli_close($conn);
        ?>
        <?php
         if(isset($_POST['order'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '12345';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
         
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error($conn));
            }

            
             $h_id=$_POST['h_id'];
                
             $o_qty=$_POST['o_qty'];
             
             $o_bid=$_POST['o_bid'];
             $sql1="SELECT b_cost from b_cost where b_id='$o_bid'";
             mysqli_select_db($conn,'blood_bank');
             $query=mysqli_query($conn,$sql1)or die("Error: " . mysqli_error($conn));
             $row1=mysqli_fetch_object($query);
             $b_cost=$row1->b_cost;
            $total_cost=$b_cost*$o_qty;
            $sql = "INSERT INTO h_order ".
               "(h_id, b_id, o_qty,total_cost) "."VALUES ".
               "('$h_id','$o_bid','$o_qty','$total_cost')";
               mysqli_select_db($conn,'blood_bank');
            $retval = mysqli_query( $conn, $sql );
             
             
         $sql1="Select b_qty from stock where b_id='$o_bid'";
    mysqli_select_db($conn,'blood_bank');
             $query1=mysqli_query($conn,$sql1)or die("Error: " . mysqli_error($conn));
             $row1=mysqli_fetch_object($query1);
             $b_qty=$row1->b_qty;
             $qty=$b_qty-$o_qty;
             $sql2="Update stock set b_qty='$qty' where b_id='$o_bid'";
             mysqli_select_db($conn,'blood_bank');
             $query2=mysqli_query($conn,$sql2) or die("Error:" . mysqli_error($conn));
         
            if(! $retval ) {
               die('Could not enter data: Please check if you have already registered as a hospital' . mysqli_error($conn));
            }
         
            echo "Your total cost is: '$total_cost'";
            mysqli_close($conn);
         } else {
      ?>
        <form method="post" action = "<?php $_PHP_SELF ?>">
            <h4>
                <table align="center">
                    <tr>
                        <td align="right">Hospital id:</td>
                        <td align="left"><input type="number" name="h_id" size=3></td>
                    </tr>
            <br><br>
                    <tr>
                        <td align="right">Blood id:</td>
            <td align="left"><select name="o_bid" size=1>
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
            <br><br>
                    <tr>
                        <td align="right">Quantity:</td>
                        <td align="left"><input type="number" name="o_qty" size=3> ml</td>
                    </tr>
            <br><br>    
                    <tr>
                        <td align="right"><input type="submit" value="order" name="order" align="center"></td>
                    </tr>
                </table>
            </h4>
        </form>
        <?php

}
      ?>
    </body>
</html>