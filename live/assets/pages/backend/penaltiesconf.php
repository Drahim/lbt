<?php
// ERROR REPORTING
  error_reporting (E_ALL | E_STRICT);
  ini_set ('display_errors' , 1);


/////////////////////////////////////
// CONNECTION INFORMATION OF MYSQL DB
require_once("connect.inc");

function getPenaltyList($sqlhost, $sqlusername, $sqlpassword, $db_name){
    try {
        $dbh = new PDO('mysql:host='.$sqlhost.';dbname='.$db_name, $sqlusername, $sqlpassword);
        $query = "SELECT * FROM  penalties_conf WHERE obsolete = 0 ORDER BY sort ASC LIMIT 500";
        $penArr = new ArrayObject(array());
        foreach ($dbh->query($query) as $row) {
            $pen['id'] = $row['id'];
            $pen['sort'] = $row['sort'];
            $pen['penalty'] = $row['penalty'];
            $pen['cost'] = $row['cost'];
            $pen['team'] = $row['team'];
            $pen['obsolete'] = $row['obsolete'];
            $pen['update'] = $row['update'];

            $penArr->append($pen);
        }

        header("Content-type: application/json");
        print json_encode ($penArr);
        $dbh = null;
        die();


    } catch (PDOException $e) {
        header("Content-type: application/json");
        print json_encode ("error");
        $dbh = null;
        die();
    }
}

getPenaltyList($sqlhost, $sqlusername, $sqlpassword, $db_name);