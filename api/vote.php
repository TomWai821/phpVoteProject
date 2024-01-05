<?php
    session_start();
    include("connect.php");

    $votes = $_POST['vote'];
    $total_votes = $votes + 1;
    $gid = $_POST['gid'];                                   // gid = Group ID
    $uid = $_SESSION['userdata']['id'];                     // uid = User ID(get from session storage)

    $update_votes = mysqli_query($connect, "UPDATE user SET votes = '$total_votes' WHERE id = '$gid'");
    $update_user_status = mysqli_query($connect, "UPDATE user SET status = 1 WHERE id = '$uid'");

    if($update_votes and $update_user_status){
        // change group data
        $group = mysqli_query($connect, "SELECT id, name, votes, photo FROM user WHERE role = 2");
        $groupsdata = mysqli_fetch_all($group, MYSQLI_ASSOC);

        $_SESSION['userdata']['status'] = 1;
        $_SESSION['groupsdata'] = $groupsdata;

        echo "
            <script>
                alert('Voting successfully!');
                window.location = '../routes/dashboard.php';
            </script>
        ";
    }else{
        echo "
        <script> 
            alert('Some error ouccured!!'); 
            window.location = '../routes/dashboard.php';
        </script>";
    }
?>