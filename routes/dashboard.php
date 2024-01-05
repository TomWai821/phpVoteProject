<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }

    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status'] == 0){
        $status = '<b style="color: red">Not Voted</b>';
    }else{
        $status = '<b style="color: green">Voted</b>';
    }
?>

<html>
    <head>
        <title>Online Voting System - Dashboard</title>
        <link href="../css/dashboard.css" rel="stylesheet">
    </head>

    <body>
        <div id="div-btn">
            <a href="../">
                <button id="btn-back">Back</button>
            </a>

            <a href="../api/logout.php">
                <button id="btn-logout">Logout</button>
            </a>
        </div>
        <h1>Online Voting System</h1>
        <hr>

        <section id="section-panels">
            <div id="div-profile">
                <div id="profile-border">
                    <img src="../uploads/<?php echo $userdata['photo'] ?>" height="250px" width="200px">
                    <b>Name: <?php echo $userdata['name'] ?></b>
                    <b>Mobile: <?php echo $userdata['mobile'] ?> </b>
                    <b>Address: <?php echo $userdata['address'] ?></b>
                    <b id="status">Status: <?php echo $status ?> </b>
                </div>
            </div>

            <div id="div-groups">
                <div id="groups-border">
                    <?php 
                        if($_SESSION['groupsdata']){
                            for($i = 0; $i < count($groupsdata) ; $i++){
                                ?>
                                    <img style="float: right; margin: 30px" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="120px" width="100px">
                                    <div id="div-group"> 
                                        <b>Group Name: <?php echo $groupsdata[$i]['name']?></b>
                                        <b>Votes: <?php echo $groupsdata[$i]['votes']?></b>
                                        <form action="../api/vote.php" method="post" enctype="multiform/form-data">
                                            <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                                            <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                                            <?php
                                                if($_SESSION['userdata']['status'] == 0){
                                                    ?>
                                                        <input type="submit" name="votebtn" value="Vote" id="btn-vote"/>
                                                    <?php
                                                }else{ 
                                                    ?>
                                                        <input type="submit" name="votebtn" value="Voted" id="btn-voted" disabled/>
                                                    <?php
                                                }
                                            ?>
                                        </form>
                                    </div>
                                    <hr>
                                <?php
                            }
                        }else{

                        }
                    ?>
                </div>
            </div>
        </section>
    </body>
</html>