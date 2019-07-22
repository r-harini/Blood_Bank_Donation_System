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
            $data="Select * from blood_manager where b_id='$bid'";
            mysqli_select_db($conn,'blood_bank');
            $val=mysqli_query($conn,$data)or die("Error: " . mysqli_error($conn));
   
            echo "<table >";
echo "<tr><th>Manager id</th><th>Manager name</th><th>Blood ID</th><th>Phone number</th></tr>";
            while($row=mysqli_fetch_array($val,MYSQLI_ASSOC)){
                echo "<tr><td >".$row['m_id']."</td><td> " .$row['m_name']. "</td><td> " .$row['b_id']. "</td><td>".$row['m_phno']."</td></tr>";
            }
            echo "</table>";
    
            mysqli_close($conn);
}else{
        ?>
    
        <form  method="post" action = "<?php $_PHP_SELF ?>">
            Please choose the blood_id for the manager details that you want to display:
            <br><br>
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
                    <input type="submit" value="Search" name="Search">

        </form>
        <?php

}
      ?>
</body>
</html>