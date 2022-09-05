<?php
include 'database.php';
session_start();
$username =  $_SESSION['username'];
if (isset($_POST['updatebtn'])) {

    if ($username === 'm.rivera') {
        $updategrade = mysqli_real_escape_string($connection, $_POST['updategrade']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $queryupdate = "UPDATE usergrade SET CC106 = '{$updategrade}'  WHERE username = '{$name}' ";
        $sqlUpdate = mysqli_query($connection, $queryupdate);
    }
    if ($username === 'j.dinlasan1') {
        $updategrade = mysqli_real_escape_string($connection, $_POST['updategrade']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $queryupdate = "UPDATE usergrade SET `GEC-AP` = '{$updategrade}'  WHERE username = '{$name}' ";
        $sqlUpdate = mysqli_query($connection, $queryupdate);
    }
    if ($username === 'j.dinlasan2') {
        $updategrade = mysqli_real_escape_string($connection, $_POST['updategrade']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $queryupdate = "UPDATE usergrade SET `GEC-TM` = '{$updategrade}'  WHERE username = '{$name}' ";
        $sqlUpdate = mysqli_query($connection, $queryupdate);
    }
    if ($username === 'm.ablaza') {
        $updategrade = mysqli_real_escape_string($connection, $_POST['updategrade']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $queryupdate = "UPDATE usergrade SET `IAS102` = '{$updategrade}'  WHERE username = '{$name}' ";
        $sqlUpdate = mysqli_query($connection, $queryupdate);
    }
    if ($username === 'j.morano') {
        $updategrade = mysqli_real_escape_string($connection, $_POST['updategrade']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $queryupdate = "UPDATE usergrade SET `IPT101` = '{$updategrade}'  WHERE username = '{$name}' ";
        $sqlUpdate = mysqli_query($connection, $queryupdate);
    }
    if ($username === 'j.c.enrile') {
        $updategrade = mysqli_real_escape_string($connection, $_POST['updategrade']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $queryupdate = "UPDATE usergrade SET `NET102` = '{$updategrade}'  WHERE username = '{$name}' ";
        $sqlUpdate = mysqli_query($connection, $queryupdate);
    }

    if ($username === 'k.reyes') {
        $updategrade = mysqli_real_escape_string($connection, $_POST['updategrade']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $queryupdate = "UPDATE usergrade SET `NSTP1` = '{$updategrade}'  WHERE username = '{$name}' ";
        $sqlUpdate = mysqli_query($connection, $queryupdate);
    }

    if ($username === 'j.bautista') {
        $updategrade = mysqli_real_escape_string($connection, $_POST['updategrade']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $queryupdate = "UPDATE usergrade SET `PE01` = '{$updategrade}'  WHERE username = '{$name}' ";
        $sqlUpdate = mysqli_query($connection, $queryupdate);
    }
}


$sqlquery = "SELECT * FROM usergrade";
$sqlresult =  mysqli_query($connection, $sqlquery);

$sqlquerys = "SELECT * FROM teachersaccount WHERE teachersname='{$username}'";
$sqlresults =  mysqli_query($connection, $sqlquerys);

if ($username === 'm.rivera' || $username === 'j.dinlasan1' || $username === 'j.dinlasan2' || $username === 'm.ablaza' || $username === 'j.morano' || $username === 'j.c.enrile' || $username === 'k.reyes' || $username === 'j.bautista') {
} else {
    echo "<script>window.location.href='/loginandsignup/home.php'</script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="teachershomestyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto+Slab:wght@300;400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <form action="logout.php">
        <div class="subject-teacher">
            <h1>Teacher's name: <?php echo $username; ?></h1>
            <h2>Subject : <?php
                            while ($result = mysqli_fetch_array($sqlresults)) {

                                echo  $result['Subject'];
                            }
                            ?></h2>
        </div>
        <button class="logout">Log out</button>
    </form>
    <div class="main">

        <div>
            <ul class="title">
                <li>
                    <h3>NAME</h3>
                </li>
                <li>
                    <h3>GRADE</h3>
                </li>
            </ul>
            <?php while ($results = mysqli_fetch_array($sqlresult)) { ?>

        </div>
        <div class="box">
            <h1>
                <ul>
                    <li><?php
                        if ($username === 'm.rivera') {

                            echo $results['username'];
                        }
                        if ($username === 'j.dinlasan1') {
                            echo $results['username'];
                        }
                        if ($username === 'j.dinlasan2') {
                            echo $results['username'];
                        }

                        if ($username === 'm.ablaza') {
                            echo $results['username'];
                        }

                        if ($username === 'j.morano') {
                            echo $results['username'];
                        }

                        if ($username === 'j.c.enrile') {
                            echo $results['username'];
                        }
                        if ($username === 'k.reyes') {
                            echo $results['username'];
                        }
                        if ($username === 'j.bautista') {
                            echo $results['username'];
                        }
                        ?>
                    </li>
                    <li>
                        <?php
                        if ($username === 'm.rivera') {

                            echo $results['CC106'];
                        }
                        if ($username === 'j.dinlasan1') {
                            echo $results['GEC-AP'];
                        }
                        if ($username === 'j.dinlasan2') {
                            echo $results['GEC-TM'];
                        }

                        if ($username === 'm.ablaza') {
                            echo $results['IAS102'];
                        }

                        if ($username === 'j.morano') {
                            echo $results['IPT101'];
                        }

                        if ($username === 'j.c.enrile') {
                            echo $results['NET102'];
                        }
                        if ($username === 'k.reyes') {
                            echo $results['NSTP1'];
                        }
                        if ($username === 'j.bautista') {
                            echo $results['PE01'];
                        }


                        ?>
                    </li>

                    <!--subject-->
                    <form action="#" method="post">
                        <li>
                            <input type="number" step="any" name="updategrade" placeholder="Update the grade here" maxlength="3">
                        </li>
                        <li>
                            <input type="hidden" name="name" value="<?php echo $results['username']; ?>">
                        </li>
                        <li>
                            <button type="submit" name="updatebtn">update</button>
                        </li>
                    </form>
                </ul>
            </h1>
        <?php   }   ?>
        </div>

    </div>
</body>

</html>