<?php
echo "<pre>";
include 'connect.php';
class register{
    public function registerUser(){
        $con = connect::ConnectDb();
        $error = [];

        if(isset($_POST['register'])){
            
            // FILE HANDLING
            $dir = '../uploads/';
            $fileName = $_FILES['files']['name'];
            $uploadFile = '';
            $flag = 1;

                if (!empty($fileName)) {
                    foreach ($fileName as $key => $value) {
                    // Check if there is a valid uploaded file
                    if (isset($_FILES['files']['tmp_name'][$key]) && $_FILES['files']['tmp_name'][$key] !== '') {
                        $tempName = $_FILES['files']['tmp_name'][$key];
                        $check = getimagesize($tempName);
                        $fileSize = $_FILES['files']['size'][$key];
                        $fileType = pathinfo($fileName[$key], PATHINFO_EXTENSION);
                        $uploadFile = time() . '_' . basename($fileName[$key]);
                        $targetFile = $dir . time() .'_'. $fileName[$key];

                        // Check if file is a valid image
                        if ($check) {
                            echo "File is an image\nFile type is - " . $check['mime'];
                        } else {
                            echo "File is not an image";
                            $flag = 0;
                            continue; // Skip to the next file if this one is not an image
                        }

                        // Check for image size
                        if ($fileSize > 1500000) {  // 1.5 MB
                            echo "File size is larger than 1.5 Megabytes";
                            $flag = 0;
                            continue;
                        }

                        // Check for file type (only allow png and jpg)
                        if ($fileType !== 'png' && $fileType !== 'jpg') {
                            echo "Only png and jpg format files are allowed";
                            $flag = 0;
                            continue;
                        }

                        // Proceed with file upload if validation passes
                        if (move_uploaded_file($tempName, $targetFile)) {
                            echo "File uploaded successfully\n";
                        } else {
                            die("File upload failed");
                        }
                    } else {
                        echo "No file selected for upload.";
                    }

                    
                    // Server side validation for form fields
                    if(empty(trim($_POST['username']))){
                        $error["username empty"] = "username is empty";
                    } else if(!preg_match("/^[\sA-z]{1,50}$/", $_POST['username'])){
                        $error["invalid username"] = "username is invalid";
                    }
                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        $error["invalid_email"] = "Email is invalid";
                    }
                    else if(!preg_match("/^[\w.%+-]+@[A-z]{2,3}+\.[A-z]{2,3}(\.[A-z]{2})?$/", $_POST['email'])){
                        $error["invalid email"] = "email is invalid";
                    }
                    if(!preg_match("/^\d{10}$/", $_POST['phone'])){
                        $error["invalid phone"] = "Phone number is invalid";
                    }
                    if(empty(trim($_POST['password']))){
                        $error["password empty"] = "Password is empty";
                    } else if(!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{6}$/", $_POST['username'])){
                        $error["invalid_password"] = "Password must be at least 6 characters, contain uppercase, lowercase, number, and 
                        special character";
                    }
                    
                    if(empty($error)){
                        // Uploading file 
                        if($flag === 1){
                            if(move_uploaded_file($tempName, $targetFile)){
                                echo "File uploaded successfully\n";
                            } else{
                                die("File upload failed");
                            }
                        } #else{
                           # header('location: ../view/registerview.php');
                        #}
                        
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $password = $_POST['password'];
                        $confirmpassword = $_POST['confirmpassword'];
                        $sql = "INSERT INTO `users` (username, email, phone, password, file) VALUES ('$username', 
                        '$email', '$phone', 
                        '$password', '$uploadFile')";
                        $result = $con->query($sql);
                        if($result){
                            echo "User registered successfully";
                        } else{
                            print_r($error);
                        }
                    }
                } 
            }
        }
    }
}
$registeration = new register();
try{
    $registeration->registerUser();
} catch(Exception $e){
    echo $e;
}
?>