<!DOCTYPE html>
<html lang="en">
<?php
include 'database.php';
session_start();

if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'] )){
    $_SESSION['status'] == 'invalid';
}
if($_SESSION['status'] == 'valid'){
    echo "<script>window.location.href='/loginandsignup/home.php'</script>";
}
if(isset($_POST['submit'])){
 
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM account WHERE username ='{$username}' AND password ='{$password}'")) > 0) {
        $_SESSION['status'] = 'valid';
        $_SESSION['username'] = $username;
        echo ' <script>window.location.href="/loginandsignup/home.php"</script>';
        
    }else{
        $_SESSION['status'] = 'invalid';
    }
    
    }
    


?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main">
        <div class="login-section">

            <div class="login-box">
                <div class="image-box">

                </div>

                <div class="inputs">
                    <div class="logo">
                        <div class="login">
                            <h2>LOG IN</h2>
                            <div class="warning" style="  display: grid; text-align: center; color:red;">
                            <?php
                            
                            if(isset($_POST['submit'])){
                                $username = mysqli_real_escape_string($connection,$_POST['username']);
                                $password = mysqli_real_escape_string($connection,$_POST['password']);
                                if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM account WHERE username ='{$username}' ")) == 0) {
                                    echo ' The username you entered isn’t connected to an account.';
                                }
                                elseif(mysqli_num_rows(mysqli_query($connection,"SELECT * from account WHERE Password ='{$password}' ")) == 0){
                                    echo 'The password you’ve entered is incorrect.';
                                }
                                
                            }
                                
                            ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="input-container">
                        <form action="" method="post">
                            <input type="text" class="username" name="username" placeholder="Username" value="<?php if (isset($_POST['submit'])) {
                                                                                                                    echo $username;
                                                                                                                }  ?>" required>
                            <input type="password" class="password" name="password" placeholder="Password" required>

                            <button type="submit" name="submit">LOG IN</button>
                            <a href="http://localhost/loginandsignup/registerform.php">Don't have an account?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>