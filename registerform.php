<?php
include 'database.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto+Slab:wght@300;400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="main">
        <div class="signup-section">
            
            <div class="signup-box">
                <div class="image-box">

                </div>

                <div class="inputs">
                    <div class="logo">
                    <div class="register">
                    <h2>REGISTER</h2>
                    <div class="warning"> <h4 style="  display: grid; text-align: center; color:red;"> <?php
                    if (isset($_POST['submit'])) {
                        $username = mysqli_real_escape_string($connection, $_POST['username']);
                        $password = mysqli_real_escape_string($connection, $_POST['password']);
                        $confirm_password = mysqli_real_escape_string($connection,$_POST['confirm-password']);
                        if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM account WHERE username ='{$username}'")) > 0) {
                            echo "The username you have entered is already registered.";
                        } else {
                            if ($password === $confirm_password) {
                                $sql = "INSERT INTO account (username,password) values('{$username}','{$password}')";
                                $result = mysqli_query($connection, $sql);
                                if ($result) {
                                    echo '<script>alert("Registration successful!")</script>';
                                    echo ' <script>window.location.href="/loginandsignup/loginform.php"</script>';
   
                                } else {
                                    echo 'Registration not successful.</div>';
                                        
                                }
                            } else {
                                echo 'The password and confirm does not match.'; 
                            }
                        }
                    }
                    
                    
                    ?></h4></div>
                    </div>
                    </div>
                    <div class="input-container">
                    <form action="" method="post">
                        <input type="text" class="username" name="username" placeholder="Username" value="<?php if (isset($_POST['submit'])) {
                                                                                                                echo $username;
                                                                                                            }  ?>" required>
                        <input type="password" class="password" name="password" placeholder="Password" required>
                        <input type="password" class="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
                        <button type="submit" name="submit">Register</button>
                        <a href="http://localhost/loginandsignup/loginform.php">Already have an account?</a>
                        
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>