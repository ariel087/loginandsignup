<?php
include 'database.php';
session_start();

if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {

    $_SESSION['status'] = 'invalid';
    unset($_SESSION['username']);
    echo "<script>window.location.href='/loginandsignup/loginform.php'</script>";

}


$username = $_SESSION['username'];
if($username === 'm.rivera' || $username === 'j.dinlasan1'|| $username === 'j.dinlasan2'|| $username === 'm.ablaza'|| $username === 'j.morano'|| $username === 'j.c.enrile'|| $username === 'k.reyes'|| $username === 'j.bautista'){
    echo "<script>window.location.href='/loginandsignup/teachershome.php'</script>";

}
$sqlquery = "SELECT * FROM usergrade WHERE  username=  '{$username}'";
$sqlresult =  mysqli_query($connection,$sqlquery);
$results = mysqli_fetch_array($sqlresult);
$_SESSION['cc106'] = $results['CC106'];
$_SESSION['gec-ap'] = $results['GEC-AP'];
$_SESSION['gectm'] = $results['GEC-TM'];
$_SESSION['ias102'] = $results['IAS102'];
$_SESSION['ipt101'] = $results['IPT101'];
$_SESSION['net102'] = $results['NET102'];
$_SESSION['nstp1'] = $results['NSTP1'];
$_SESSION['pe01'] = $results['PE01'];

$sqlquery = "SELECT * FROM account WHERE  username=  '{$username}'";
$sqlresult =  mysqli_query($connection,$sqlquery);
$results = mysqli_fetch_array($sqlresult);
$_SESSION['studid'] = $results['studID'];
$_SESSION['firstname'] = $results['firstname'];
$_SESSION['lastname'] = $results['lastname'];
$_SESSION['section'] = $results['section'];
$_SESSION['birthday'] = $results['birthday'];
$_SESSION['age'] = $results['age'];
$_SESSION['gender'] = $results['gender'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="homestyle.css">
    <title>Student Management System</title>
</head>

<body>

    <div class="main">
        <header class="menu">
            <div class="menu-box">
                <ul>
                    <li><a id="home" href="#home-section">Home</a></li>
                    <li><a id="account" href="#account-section">Account</a></li>
                    <li><a id="Grade" href="#grade-section">Grade</a></li>
                    <li><a id="schedule" href="#schedule-section">Schedule</a></li>
                    <li><a id="account" href="http://localhost/loginandsignup/account-settings.php">Account Settings</a></li>
                    <li><form action="logout.php"><button class="menu-button">Log out</button></form></li>
                </ul>
            </div>
        </header>
        <div class="navbar">
            <ul>
                <li><a id="home" href="#home-section">Home</a></li>
                <li><a id="account" href="#account-section">Account</a></li>
                <li><a id="Grade" href="#grade-section">Grade</a></li>
                <li><a id="schedule" href="#schedule-section">Schedule</a></li>
                <li><a id="account" href="http://localhost/loginandsignup/account-settings.php">Account Settings</a></li>
            </ul>
            <form action="logout.php"><button class="navbar-button">Log out</button></form>
            <div id="menu" class="fas fa-bars"></div>
        </div>
        <div id="home-section" class="home-section">
            <h1>STUDENT MANAGEMENT SYSTEM</h1>
        </div>
        <div id="account-section" class="account-section">
            <h1>ACCOUNT</h1>
            <div class="info">
                <h3>STUDENT ID:<?php echo $_SESSION['studid'];   ?></h3>
                <h3>NAME:<?php echo $_SESSION['firstname']." " .$_SESSION['lastname'];   ?></h3>
                <h3>SECTION:<?php echo $_SESSION['section'];   ?></h3>
                <h3>AGE: <?php echo $_SESSION['age'];   ?></h3>
                <h3>BIRTHDAY: <?php echo $_SESSION['birthday'];   ?></h3>
                <h3>GENDER: <?php echo $_SESSION['gender'];   ?></h3>
            </div>
        </div>
        <div id="grade-section" class="grade-section">
            
            <h1 class="grade-title">Grade</h1>
        
        <div class="grade-box">
            <div class="box"><h1>CC106</h1> <h3>M.RIVERA</h3> <h2>GRADE</h2><h1 class="score"><?php echo $_SESSION['cc106'];   ?></h1></div>
            <div class="box"><h1>GEC-AP</h1><h3>J.DINLASAN</h3><h2>GRADE</h2><h1 class="score"><?php echo $_SESSION['gec-ap'];   ?></h1></div>
            <div class="box"><h1>GEC-TM</h1><h3>J.DINLASAN</h3><h2>GRADE</h2><h1 class="score"><?php echo $_SESSION['gectm'];   ?></h1></div>
            <div class="box"><h1>IAS102</h1><h3>M.ABLAZA</h3><h2>GRADE</h2><h1 class="score"><?php echo $_SESSION['ias102'];   ?></h1></div>
            <div class="box"><h1>IPT101</h1><h3>J.MORANO</h3><h2>GRADE</h2><h1 class="score"><?php echo $_SESSION['ipt101'];   ?></h1></div>
            <div class="box"><h1>NET102</h1><h3>J.C.ENRILE</h3><h2>GRADE</h2><h1 class="score"><?php echo $_SESSION['net102'];   ?></h1></div>
            <div class="box"><h1>NSTP1</h1><h3>K.REYES</h3><h2>GRADE</h2><h1 class="score"><?php echo $_SESSION['nstp1'];   ?></h1 ></div>
            <div class="box"><h1>PE01</h1><h3>J.BAUTISTA</h3><h2>GRADE</h2><h1 class="score"><?php echo $_SESSION['pe01'];   ?></h1</div>
        </div>
        </div>
        <div id="schedule-section" class="schedule-section">
            <h1 class="schedule-title">Schedule</h1>

        <div class="schedule-box">    
            <div class="schedbox"><h1 class="h">CC106</h1> <h2>M.RIVERA</h2> <h3>MONDAY <BR> 2:00 PM - 5:00 PM <BR> THURSDAY <BR> 2:2:00 PM - 4:00 PM</BR></h3></div>
            <div class="schedbox"><h1 class="h">GEC-AP</h1><h2>J.DINLASAN</h2><h3>SATURDAY <BR> 7:30 AM - 10:30 AM</h3></div>
            <div class="schedbox"><h1 class="h">GEC-TM</h1><h2>J.DINLASAN</h2><h3>THURSDAY <BR> 5:00 PM - 8:00PM </h3></div>
            <div class="schedbox"><h1 class="h">IAS102</h1><h2>M.ABLAZA</h2><h3> MONDAY <BR> 10:30 AM - 1:30 PM <BR>THURSDAY <BR> 10:30 AM - 12:30 PM</h3></div>
            <div class="schedbox"><h1 class="h">IPT101</h1><h2>J.MORANO</h2><h3> MONDAY <BR> 8:30 AM - 10:30 AM <BR>THURSDAY <BR> 7:30 AM - 10:30 AM</h3></div>
            <div class="schedbox"><h1 class="h">NET102</h1><h2>J.C.ENRILE</h2><h3> MONDAY <BR> 5:00 PM - 7:00 PM <BR>SATURDAY <BR> 10:30 AM - 1:30PM</h3></div>
            <div class="schedbox"><h1 class="h">NSTP1</h1><h2>K.REYES</h2><h3> TUESDAY <BR> 2:00 PM - 5:00 PM</h3></div>
            <div class="schedbox"><h1 class="h">PE01</h1><h2>J.BAUTISTA</h2><h3> MONDAY <BR> 11:00 AM - 1:00 PM</h3></div>
        
        </div>    
        </div>
        
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="javascript.js"></script>
</body>

</html>