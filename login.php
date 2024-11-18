<?php
session_start();
include 'error.php';
$loginerror = [];
if(isset($_POST['login'])){
    if(empty($_POST['email'])){
        array_push($loginerror, "email");
    }
    if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST['email'])){
        array_push($loginerror, "validemail");
    }
    if(empty($_POST['password'])){
        array_push($loginerror, "password");
    }
    $passlength = strlen($_POST['password']);
    if($passlength<6){
        array_push($inerror, $passlength);
    }
    if(!empty($loginerror)){
        header("location: login.php");
    }
}

include 'connect.php';
if(isset($_POST['login'])){
    $mes = "";
    $sql = "SELECT * FROM users WHERE email='$_POST[email]'";
    $result = $con->query($sql);
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if($_POST['password'] == $row['password']) {
            $arrLogin = [];
            header('location:view.php');
            array_push($arrLogin, "login");
            $_SESSION['flag'] = $arrLogin;
        } 
        else {
            $mes = "Invalid Credentials";
        }
    } else{
        $mes = "User not found";
    }
}
?>

<script>
    $(document).ready(function(){
    $('#loginform').validate({
        rules:{
            email:{
                required: true,
                email: true
            },
            password:{
                required: true,
                minlength: 6
            }
        },
        messages:{
            email:{
                required: 'Email is required',
                email: 'Please enter a valid email'
            },
            password:{
                required: 'Password is required',
                minlength: 'Password must be atleast 6 characters long',
            }
        },
        submitHandler: function(form){
            form.submit();
        }
    });
});
</script>



