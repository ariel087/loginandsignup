<?php
include 'database.php';
session_start();

if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {

    $_SESSION['status'] = 'invalid';
    unset($_SESSION['username']);
    echo "<script>window.location.href='/loginandsignup/loginform.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homestyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto+Slab:wght@300;400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="main">
        <div class="home-section">
            <div class="nav-main">
                <div class="logo-container">

                </div>
                <ul class="menu-container">
                    <li> <a href="#">Home</a> </li>
                    <li> <a href="#">My Schedule</a> </li>
                    <li> <a href="#">My Work</a> </li>
                    <li> <a href="#">Reminder</a></li>
                    <li>
                        <form action="logout.php">
                            <button class="logout">Log out</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="hero-main">
                <?php
                if(isset($_POST['btn'])){
                    $name = mysqli_real_escape_string($connection,$_POST['name']);
                    $sql = "INSERT INTO announce (name) values('{$name}')";
                    $result = mysqli_query($connection, $sql);
                }
                ?>
                <form action="#" method="post">
                    <input type="text" class="name" name="name" placeholder="Name">
                    <button type="submit" name="btn">CREATE</button>
                </form>
                
                <h3><?php
                    $querysession = mysqli_query($connection, "SELECT * FROM account WHERE username ='{$_SESSION['username']}' ");

                    if (mysqli_num_rows($querysession)) {
                        $rowsession = mysqli_fetch_assoc($querysession);
                        echo 'USERNAME: ' . $rowsession['username'];
                    }

                    ?></h3>
                <?php
                $querry = mysqli_query($connection, "SELECT * FROM announce ORDER BY qeue desc ");
                mysqli_num_rows($querry);
                while ($rowaccounts = mysqli_fetch_assoc($querry)) {  ?>
                    <div class="box">
                    <h1><?php echo $rowaccounts['qeue'] . " " . $rowaccounts['name'] ?></h1>
                </div>
                    <?php } ?>
       
            </div>
        </div>

</body>

</html>