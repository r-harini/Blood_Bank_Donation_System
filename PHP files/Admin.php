<html>
<body>
    <?php
     if(isset($_POST['Enter'])) {
    $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '12345';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
            $user=$_POST['Username'];
            $pass=$_POST['Password'];
         $sql="Select * from admin where Username='$user' and Password='$pass'";
          mysqli_select_db($conn,'blood_bank');
             $query=mysqli_query($conn,$sql)or die("Error: " . mysqli_error($conn));
              while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
                if ($row["Username"]==$user && $row["Password"]==$pass){
                    header('Location:http://localhost/first/Option.php');
                }
                  else {
                      echo "Incorrect username or password";
                  }
            }
         
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error($conn));
            }
         
         mysqli_close($conn);
     }else{
         ?>
    <h1 align='center'> Red Drop Blood Bank</h1>
    <form action="<?php $_PHP_SELF ?>" method="post">
        <table align="center">
            <tr>
            <td align="right">Username:</td>
                <td align="left"><input type="Text" size=10 name="Username"></td>
            </tr>
    <br><br>
            <tr>
                <td align="right">Password:</td>
                <td align="left"><input type="password" size=10 name="Password"></td>
            </tr>
    <br><br>
            <tr>
                <td align="left"><input type="submit" value="submit" name="Enter"></td>
            </tr>
        </table>
    </form>
    <?php
     }
    ?>     
</body>
</html>