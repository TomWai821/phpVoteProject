<?php
    include("connect.php");
    
    // Get data from name, mobile, password and address input field.
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $address = $_POST['address'];

    $image = $_FILES['photo']['name'];
    $temp_name = $_FILES['photo']['tmp_name']
    
    $role = $_POST['role']

    if($password == $password2){
        move_uploaded_file($temp_name, "../uploads/$image");
        $insert = mysqli_query($connect ,"INSERT INTO user (name, mobile, password, address, photo, role, status, vote) 
            VALUES ('$name' , '$mobile' , '$password' , '$address', '$image', '$role', '0', '0')");
        if($insert){
            echo "
            <script>
                alert('Registration Successfull!')
                window.location = "../"
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Some error occured!');
                windows.location = "../routes/register.html"
            </script>
            ";
        }
    }else{
        echo "
        <script>
            alert('Password and Confirm password does not match!');
            window.location = "../routes/register.html";
        </script>
        ";
    }
?>