<?php  

session_start();
ob_start();

if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

include '../classes.php';
include 'connect.php';

$controller = new Controller();
$view = new View();

$username = $_SESSION['usernameUse'];


if($_SESSION['track-freelancerEmp'] == 1) {
    $controller = new Controller();
    $track = $controller->userInput($_POST['track-freeEmp']);
    if ($track == 'track1') {
        $firstName = $controller->userInput($_POST['firstName']);
        $lastName = $controller->userInput($_POST['lastName']);
        $phone = $controller->userInput($_POST['phone']);
        $address = $controller->userInput($_POST['state']);
        $city = $controller->userInput($_POST['city']);
        
        $_SESSION['firstName'] = $firstName; 
        $_SESSION['lastName'] = $lastName;
        $_SESSION['phone'] = $phone;
        $_SESSION['address'] = $address;
        $_SESSION['city'] = $city;

        if(!empty($firstName) && !empty($lastName) && !empty($phone) && !empty($city)) {
            Gender();
            country();
            if(!empty($address) && !empty($Gender) && !empty($country)) {
                $updateDb = $view->updateDb4View($username, 'username', $firstName, 'firstName', $lastName, 'lastName', $address, 'address', $city, 'city', $phone, 'phone', $country, 'country', $Gender, 'gender', 'users');
                move_uploaded_file($fileTempName1,$path1);
                $_SESSION['msgFreeEmp1'] = 'Personal details uploaded Successfully';
                $_SESSION['msgClassFreeEmp1'] = 'alert-success';
                $_SESSION['msgFreeEmp4'] = 'Personal details uploaded Successfully';
                $_SESSION['msgClassFreeEmp4'] = 'alert-success';
                $_SESSION['status'] = 'done';
                header('location: ../../freemp-create.php');
                ob_end_flush();
            }
            else {
                $_SESSION['msgFreeEmp1'] = $msg;
                $_SESSION['msgClassFreeEmp1'] = $msgClass;
                header('location: ../../freemp-account.php#1');
                ob_end_flush();
            }
        }
        else {
            $_SESSION['msgFreeEmp1'] = 'Please fill all fields';
            $_SESSION['msgClassFreeEmp1'] = 'alert-danger';
            header('location: ../../freemp-account.php#1');
            ob_end_flush();
        }
    }
    elseif($track == 'track2') {
        $email = $controller->userInput($_POST['email']);
        $oldPass = $controller->userInput($_POST['oldPass']);
        $newPass = $controller->userInput($_POST['newPass']);
        $conNew = $controller->userInput($_POST['conNew']);

        if(!empty($email) && empty($oldPass)) {
            $updateEmail = $view->updateDb2View($username,'username',$email,'email','users');
            $_SESSION['msgFreeEmp2'] = 'Email updated successfully';
            $_SESSION['msgClassFreeEmp2'] = 'alert-success';  
            header('location: ../../freemp-account.php#2');
            ob_end_flush();
        }
        if(!empty($oldPass) && !empty($newPass) && !empty($conNew) && !empty($email)) {
            $updateEmail = $view->updateDb2View($username,'username',$email,'email','users');
            $_SESSION['msgFreeEmp2'] = 'Email updated successfully';
            $_SESSION['msgClassFreeEmp2'] = 'alert-success';  
            
            $checkPass = $controller->searchDbContr($username, 'username', 'users');
            $password = $checkPass['password'];
            if($password === $oldPass) {
                if($newPass === $conNew) {
                    $updatePass = $view->updateDb2View($username,'username',$newPass,'password','users');
                    $_SESSION['msgFreeEmp3'] = 'Password changed successfully';
                    $_SESSION['msgClassFreeEmp3'] = 'alert-success';  
                    header('location: ../../freemp-account.php#2');
                    ob_end_flush();
                }
                else {
                    $_SESSION['msgFreeEmp3'] = 'Please confirm your new password correctly';
                    $_SESSION['msgClassFreeEmp3'] = 'alert-danger';  
                    header('location: ../../freemp-account.php#2');
                    ob_end_flush();
                }   
            }
            else {
                $_SESSION['msgFreeEmp3'] = 'Incorrect Password';
                $_SESSION['msgClassFreeEmp3'] = 'alert-danger';  
                header('location: ../../freemp-account.php#2');
                ob_end_flush();
            }
        }

    }

    elseif($track == 'track3') {
        $job = $controller->userInput($_POST['job']);
        $description = $controller->userInput($_POST['description']);
        $sample = $_FILES['sample']['name'];
        $_SESSION['job'] = $job;
        $_SESSION['description'] = $description;
        
        if(!empty($job) && !empty($description)) {
            category();
            sub();
            price();

            if(!empty($sample)) {
                $fileTempName1 = $_FILES['sample']['tmp_name'];
                $path1 = "../../samplesfreemp/".$sample;   
            }

            if(!empty($category) && !empty($sub) && !empty($price)) {
                $_SESSION['category-use'] = $category;
                $updateJob = $controller->insertDetails8Contr($username, $category, $sub, $job, $price, $description, $sample);
                move_uploaded_file($fileTempName1,$path1);
                $_SESSION['msgFreeEmp4'] = 'Job created successfully';
                $_SESSION['msgClassFreeEmp4'] = 'alert-success';
                $_SESSION['msgDisplayFreeEmp'] = 'Create another Job';
                header('location: ../../freemp-created-jobs.php');
                ob_end_flush();
            }
            else {
                $_SESSION['msgFreeEmp4'] = $msg;
                $_SESSION['msgClassFreeEmp4'] = $msgClass;
                header('location: ../../freemp-create.php#1');
                ob_end_flush();
            }
        }
    }
}


function address() {
    global $msg, $msgClass, $address;
    if($_POST['address'] == "") {
        $msg = "Please Choose your state of residence";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['address'] != "") {
        $address = $_POST['address'];
        return true;
    }
    
}

function category() {
    global $msg, $msgClass, $category;
    if($_POST['category'] == "") {
        $msg = "Please select a category";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['category'] != "") {
        $category = $_POST['category'];
        return true;
    }
    
}

function sub() {
    global $msg, $msgClass, $sub;
    if($_POST['sub'] == "") {
        $msg = "Please select a sub category";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['sub'] != "") {
        $sub = $_POST['sub'];
        return true;
    }
    
}

function type() {
    global $msg, $msgClass, $type;
    if($_POST['type'] == "") {
        $msg = "Please select a job type";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['type'] != "") {
        $type = $_POST['type'];
        return true;
    }   
}

function price() {
    global $msg, $msgClass, $price;
    if(($_POST['price1'] == "") && ($_POST['price2'] == "")) {
        $msg = "Please select your budget for this project";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['price1'] != "") {
        $price = $_POST['price1'];
        return true;
    }
    elseif($_POST['price2'] != "") {
        $price = $_POST['price2'];
        return true;
    }   
}

function level() {
    global $msg, $msgClass, $level;
    if($_POST['level'] == "") {
        $msg = "Please select a salary range";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['level'] != "") {
        $level = $_POST['level'];
        return true;
    }   
}

function Gender() {
    global $msg, $msgClass, $Gender;
    if($_POST['Gender'] == "") {
        $msg = "Please Choose your Gender";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['Gender'] != "") {
        $Gender = $_POST['Gender'];
        return true;
    }
    
}

function country() {
    global $msg, $msgClass, $country;
    if($_POST['country'] == "") {
        $msg = "Please select a country";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['country'] != "") {
        $country = $_POST['country'];
        return true;
    }
    
}

?>