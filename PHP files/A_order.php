<html>
<body>
    <h1 align='center'> Red Drop Blood Bank</h1>
    <?php

        $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '12345';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
         
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error($conn));
            }
           
            $data="Select * from h_order order by h_id";
            mysqli_select_db($conn,'blood_bank');
            $val=mysqli_query($conn,$data)or die("Error: " . mysqli_error($conn));
   
            echo "<table >";
echo "<tr><th>o_id</th><th>h_id</th><th>b_id</th><th>o_qty</th><th>total_cost</th></tr>";
            while($row=mysqli_fetch_array($val,MYSQLI_ASSOC)){
                echo "<tr><td >".$row['o_id']."</td><td> " .$row['h_id']. "</td><td> " .$row['b_id']. "</td><td>".$row['o_qty']."</td><td>".$row['total_cost']."</td></tr>";
            }
            echo "</table>";
    
            mysqli_close($conn);

        ?>
    </body></html>