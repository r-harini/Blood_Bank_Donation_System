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
            
            $data="Select * from d_quantity q, donor d where d.donor_id=q.d_id ";
            mysqli_select_db($conn,'blood_bank');
            $val=mysqli_query($conn,$data)or die("Error: " . mysqli_error($conn));
   
            echo "<table >";
echo "<tr><th>donor_id</th><th>d_name</th><th>d_qty</th><th>b_id</th><th>d_phno</th></tr>";
            while($row=mysqli_fetch_array($val,MYSQLI_ASSOC)){
                echo "<tr><td >".$row['donor_id']."</td><td> " .$row['d_name']. "</td><td> " .$row['d_qty']."</td><td>".$row['b_id']. "</td><td>".$row['d_phno']."</td></tr>";
            }
            echo "</table>";
    
            mysqli_close($conn);

        ?>
    </body></html>