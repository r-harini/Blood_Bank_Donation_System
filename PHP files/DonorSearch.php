<html>
    <body >
        <h1 align='center'> Red Drop Blood Bank</h1>
        <h2 align="center"> Donor Search</h2>
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
            echo "</table>";
            mysqli_close($conn);
        ?>
        <?php
if(isset($_POST['Search'])){
        $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '12345';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
         
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error($conn));
            }
            $bid=$_POST['bid'];
            $data="Select * from d_quantity q, donor d where d.donor_id=q.d_id and q.b_id='$bid'";
            mysqli_select_db($conn,'blood_bank');
            $val=mysqli_query($conn,$data)or die("Error: " . mysqli_error($conn));
   
            echo "<table >";
echo "<tr><th>donor_id</th><th>d_name</th><th>b_id</th><th>d_phno</th></tr>";
            while($row=mysqli_fetch_array($val,MYSQLI_ASSOC)){
                echo "<tr><td >".$row['donor_id']."</td><td> " .$row['d_name']. "</td><td> " .$row['b_id']. "</td><td>".$row['d_phno']."</td></tr>";
            }
            echo "</table>";
    
            mysqli_close($conn);
}else{
        ?>
        Please choose the blood id for which you want the donor details to be displayed:
        <br><br>
        
        <form  method="post" action = "<?php $_PHP_SELF ?>">
            
            Blood id:
            <select name="bid" size=1>
    <option> 1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option> 6</option>
    <option> 7</option>
    <option> 8</option>
    </select>
            <br>
            <br>
                    <input type="submit" value="Search" name="Search" align='center'>

        </form>
        <?php

}
      ?>
        
    </body>
</html>