<html>
<body >
    <h1 align='center'> Red Drop Blood Bank</h1>
    <h2 align="center">Stock Available</h2>
    <?php
        $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '12345';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
         
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error($conn));
            }
            $data="Select * from stock s,blood b where s.b_id=b.blood_id";
            mysqli_select_db($conn,'blood_bank');
            $val=mysqli_query($conn,$data)or die("Error: " . mysqli_error($conn));
            echo "<table >";
            echo "<tr><th>blood_id</th><th>b_grp</th><th>b_qty</th></tr>";
            while($row=mysqli_fetch_array($val,MYSQLI_ASSOC)){
                echo "<tr><td >".$row['blood_id']."</td><td> " .$row['b_grp']. "</td><td> " .$row['b_qty']. "</td></tr>";
            }
            echo "</table>";
            mysqli_close($conn);
        ?>
    </body>
</html>