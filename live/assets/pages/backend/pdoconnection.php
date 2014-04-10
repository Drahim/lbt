<?php
/////////////////////////////////////
// CONNECTION INFORMATION OF MYSQL DB
require_once("connect.inc");


////////////////
// VALIDATE USER
function setSessionVars($userId, $userName, $userFirst, $userLast, $userMail, $userAdmin)
{
    session_regenerate_id(); // SECURITY MEASURE
    $_SESSION['valid'] = 1;
    $_SESSION['userId'] = $userId;
    $_SESSION['userName'] = $userName;
    $_SESSION['userFirst'] = $userFirst;
    $_SESSION['userLast'] = $userLast;
    $_SESSION['userMail'] = $userMail;
    $_SESSION['userAdmin'] = $userAdmin;

    // REDIRECT TO CGI.PHP
    header("Content-type: application/json");
    echo json_encode ($userName);
}

/////////////////////////////
// CHECK IF USER IS LOGGED IN
function isLoggedIn()
{
    if(isset($_SESSION['valid']) && $_SESSION['valid'])
        return true;
    return false;
}

function loginProcedure($sqlhost, $sqlusername, $sqlpassword, $db_name, $username, $password){
    try {
        $dbh = new PDO('mysql:host='.$sqlhost.';dbname='.$db_name, $sqlusername, $sqlpassword);
        $sql = "SELECT COUNT(*)as AMNT, id, user, first, pass, last, mail, admin, loggedin, loggedlast FROM user WHERE mail=? AND pass=?";
        $res = $dbh->prepare($sql);
        $res -> execute(array($username, $password));
        $usrInfo = $res->fetch(PDO::FETCH_ASSOC);
        $loginmessage = ($usrInfo["AMNT"] > 0) ? array('status' => 'success') : array('status' => 'failure');

        if($loginmessage['status'] == "success") {
        //SET SESSION TIMEOUT PARAMS
            ini_set('session.gc_maxlifetime', 7200);
            session_set_cookie_params(7200, '/');
        //START SESSION
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        // SET SQL FIELD "loggedin" IN "user"-TABLE TO "1" => LOGGED IN
            $sql = "UPDATE user SET loggedin=? WHERE id=?";
            $q = $dbh->prepare($sql);
            $q->execute(array(1, $usrInfo['id']));

            setSessionVars($usrInfo['id'], $usrInfo['user'], $usrInfo['first'], $usrInfo['last'], $usrInfo['mail'], $usrInfo['admin']);

            isLoggedIn();

        } else {
            $dbh = null;
            header("Content-type: application/json");
            echo json_encode ("fail");
            die();
        }

    } catch (PDOException $e) {
        header("Content-type: application/json");
        echo json_encode ("error");
        $dbh = null;
        die();
    }
}

// GET POST PARAMETERS
$username = strtolower($_POST['username']);;
$password = md5($_POST['password']);

loginProcedure($sqlhost, $sqlusername, $sqlpassword, $db_name, $username, $password);

?>