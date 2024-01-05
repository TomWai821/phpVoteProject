<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }
?>

<html>
    <head>
        <title>Online Voting System - Dashboard</title>
        <link href="../css/dashboard.css" rel="stylesheet">
    </head>

    <body>
        <div id="div-btn">
            <button id="btn-back">Back</button>
            <button id="btn-logout">Logout</button>
        </div>
        <h1>Online Voting System</h1>
        <hr>
        <div id="Profile"></div>
        <div id="Group"></div>
    </body>
</html>