<?php
    function getConnection()
    {
        $servername = "localhost";
        $username = "root";
        $pass = "";
        $db = "votingdb";

        // crate a connection
        $conn = mysqli_connect($servername, $username, $pass, $db);
        return $conn;
    }
    $conn = getConnection();
    function getTitle($eid){
        global $conn;
        if($conn){
            $sql = "SELECT title from `elections` where eid=$eid";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $title = mysqli_fetch_assoc($result)['title'];
                return $title;;
            }
        }
    }
    function getUnVotedElections($currUserID){
        global $conn;
        date_default_timezone_set("Asia/Kolkata");
        $currtime = date("Y-m-d H:i:s", time());
        $sql = "select eid
        from elections as a
        where a.endtime>'$currtime' and a.starttime<'$currtime'
        AND a.eid NOT IN (select eid 
                         from votes as b 
                         where b.enrollid='".$currUserID."')";
        // echo $sql."<br>";
        $result = mysqli_query($conn, $sql);
        // echo var_dump($result);
        // print_r($result);
        return $result;
    }

    function getCandidatesFor($eid){
        global $conn;
        $sql = "select candidates.cid, users.name
                FROM candidates 
                INNER JOIN users
                ON candidates.cid = users.enrollid
                where candidates.eid = $eid and candidates.isselected = 1";
        
        $result = mysqli_query($conn, $sql);
        // echo var_dump($result);
        // print_r($result);
        return $result;
    }
    
    // echo getCandidatesFor(1);
    // echo getTitle(1);
?>