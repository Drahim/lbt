<?php
// ERROR REPORTING
//  error_reporting (E_ALL | E_STRICT);
//  ini_set ('display_errors' , 1);

// VALIDATE USER
function validateUser($userId, $userName, $userFirst, $userLast, $userMail, $userAdmin)
{
    session_regenerate_id(); //this is a security measure
    $_SESSION['valid'] = 1;
    $_SESSION['userId'] = $userId;
    $_SESSION['userName'] = $userName;
    $_SESSION['userFirst'] = $userFirst;
    $_SESSION['userLast'] = $userLast;
    $_SESSION['userMail'] = $userMail;
    $_SESSION['userAdmin'] = $userAdmin;

    // SET SQL FIELD "loggedin" IN "user"-TABLE TO "1" => LOGGED IN
    $query = "UPDATE user SET loggedin=1 WHERE id='".$_SESSION['userId']."'";
    $result = mysql_query($query) OR DIE ('error @1');

    // REDIRECT TO CGI.PHP
    header('Location: ../../../index.php?signin=success');
}

// CHECK IF USER IS LOGGED IN
function isLoggedIn()
{
    if(isset($_SESSION['valid']) && $_SESSION['valid'])
        return true;
    return false;
}

$username = $_POST['username'];
$password = md5($_POST['password']);
//CONNECT TO DATABASE
// CONNECT TO DATABASE
$sqlhost='awkwart.de'; // Host name
$sqlusername='d01991b6'; // Mysql username
$sqlpassword='6oFbPF9oWKRYTrer'; // Mysql password
$db_name='d01991b6'; // Database name

mysql_connect("$sqlhost", "$sqlusername", "$sqlpassword") OR DIE ("Could not establish connection to MySQL server.");
mysql_query('SET CHARACTER SET utf8');

// SELECT DB OR DIE
mysql_select_db("$db_name") OR DIE ("Could not select MySQL database '$db_name'");

$username = mysql_real_escape_string($username);
  $query = "SELECT * FROM user u WHERE u.mail='".$username."'";
$result = mysql_query($query);
if(mysql_num_rows($result) < 1) //no such user exists
{
    header('Location: ../../../index.php?signin=fail');
    die();
}
$userData = mysql_fetch_array($result, MYSQL_ASSOC);
if($password != $userData['pass']) //incorrect password
{
    header('Location: ../../../index.php?signin=fail');
    die();
}
else
{
//SET SESSION TIMEOUT PARAMS
    ini_set('session.gc_maxlifetime', 7200);
    session_set_cookie_params(7200, '/');
//START SESSION
    session_start();
    $userId = $userData['id'];
    $userName = $userData['user'];
    $userFirst = $userData['first'];
    $userLast = $userData['last'];
    $userMail = $userData['mail'];
    $userAdmin = $userData['admin'];
    validateUser($userId, $userName, $userFirst, $userLast, $userMail, $userAdmin); //sets the session data for this user
}
isLoggedIn();
?>