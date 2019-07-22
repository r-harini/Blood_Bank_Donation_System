<html>
<body>
    <h1 align='center'> Red Drop Blood Bank</h1>
    <?php
if(isset($_POST['Enter'])){
        $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '12345';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
         
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error($conn));
            }
         
    $b_id=$_POST['bid'];
            $cost=$_POST['cost'];
             $sql3="Update b_cost set b_cost='$cost' where b_id='$b_id'";
             mysqli_select_db($conn,'blood_bank');
             $query3=mysqli_query($conn,$sql3) or die("Error:" . mysqli_error($conn));
    if(! $conn ) {
               die('Could not connect: ' . mysqli_error($conn));
            }
    echo"Data updated successfully\n";
     mysqli_close($conn);
     }else{
         ?>
    
    <form  method="post" action = "<?php $_PHP_SELF ?>">
        Please choose the blood_id to make changes:
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
        <br><br>
    Enter the new cost:
    <input type="number" name="cost" size=10>
        <br><br>
        <input type="submit" value="Enter" name="Enter">
        </form>
     <?php
     }
    ?>
    </body>
</html>