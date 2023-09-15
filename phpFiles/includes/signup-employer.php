<?php 

session_start();
ob_start();

if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

include '../classes.php';

$controller = new Controller();
$view = new View();

$username = $_SESSION['usernameUse'];

if($_SESSION['track-employer'] == 1) {
    $controller = new Controller();
    $track = $controller->userInput($_POST['track']);
    if ($track == 'track1') {
        $company = $controller->userInput($_POST['company']);
        $rep = $controller->userInput($_POST['rep']);
        $phone = $controller->userInput($_POST['phone']);
        $website = $controller->userInput($_POST['website']);
        $city = $controller->userInput($_POST['city']);
        $state = $controller->userInput($_POST['state']);

        $_SESSION['company'] = $company;
        $_SESSION['rep'] = $rep;
        $_SESSION['phone'] = $phone;
        $_SESSION['city'] = $city;
        $_SESSION['state'] = $state;
        $_SESSION['website'] = $website;

        if(!empty($company) && !empty($rep) && !empty($city) && !empty($state) && !empty($phone)) {
            if(empty($website)) {
                $website = "";
            }
            staff();
            country();
            if(!empty($staff) && !empty($country)) {
                $updateDb = $view->updateDbView($username, 'username', $company, 'company', $rep, 'rep', $state, 'address', $city, 'city', $phone, 'phone', $website, 'website', $staff, 'staff', $country, 'country', 'users');
                $_SESSION['msgEmployer'] = "Company Details Updated";
                $_SESSION['msgClassEmployer'] = 'alert-success';
                $_SESSION['msgEmployer4'] = 'Company Details Updated';
                $_SESSION['msgClassEmployer4'] = 'alert-success';
                $_SESSION['status'] = 'done';
                header('location: ../../employer-create.php');
                ob_end_flush();
            }
            else {
                $_SESSION['msgEmployer'] = $msg;
                $_SESSION['msgClassEmployer'] = $msgClass;
                header('location: ../../employer-accounts.php#1');
                ob_end_flush();
            }
        }
        else {
            $_SESSION['msgEmployer'] = 'Please fill required fields';
            $_SESSION['msgClassEmployer'] = 'alert-danger';
            header('location: ../../employer-accounts.php#1');
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
            $_SESSION['msgEmployer2'] = 'Email updated successfully';
            $_SESSION['msgClassEmployer2'] = 'alert-success';  
            header('location: ../../employer-accounts.php#2');
            ob_end_flush();
        }
        if(!empty($oldPass) && !empty($newPass) && !empty($conNew) && !empty($email)) {
            $updateEmail = $view->updateDb2View($username,'username',$email,'email','users');
            $_SESSION['msgEmployer2'] = 'Email updated successfully';
            $_SESSION['msgClassEmployer2'] = 'alert-success';  
            
            $checkPass = $controller->searchDbContr($username, 'username', 'users');
            $password = $checkPass['password'];
            if($password === $oldPass) {
                if($newPass === $conNew) {
                    $updatePass = $view->updateDb2View($username,'username',$newPass,'password','users');
                    $_SESSION['msgEmployer3'] = 'Password changed successfully';
                    $_SESSION['msgClassEmployer3'] = 'alert-success';  
                    header('location: ../../employer-accounts.php#2');
                    ob_end_flush();
                }
                else {
                    $_SESSION['msgEmployer3'] = 'Please confirm your new password correctly';
                    $_SESSION['msgClassEmployer3'] = 'alert-danger';  
                    header('location: ../../employer-accounts.php#2');
                    ob_end_flush();
                }   
            }
            else {
                $_SESSION['msgEmployer3'] = 'Incorrect Password';
                $_SESSION['msgClassEmployer3'] = 'alert-danger';  
                header('location: ../../employer-accounts.php#2');
                ob_end_flush();
            }
        }
    }

    elseif($track == 'track3') {
        $job = $controller->userInput($_POST['job']);
        $qualification = $controller->userInput($_POST['qualification']);
        $responsibilities = $controller->userInput($_POST['responsibilities']);
        $closing = $controller->userInput($_POST['close']);
        $location = $controller->userInput($_POST['location']);

        if(!empty($job) && !empty($qualification) && !empty($responsibilities)) {
            category();
            sub();
            salary();
            type();
            if(!empty($category) && !empty($sub) && !empty($salary) && !empty($type)) {
                $_SESSION['category-use'] = $category;
                $insertJob = $controller->insertDetails3Contr($username, $category, $sub, $job, $salary, $type, $qualification, $responsibilities, $location, $closing);
                $_SESSION['msgEmployer4'] = 'Job Added Successfully';
                $_SESSION['msgClassEmployer4'] = 'alert-success';
                $_SESSION['msgDisplayEmployer'] = 'Add Another Job';
                header('location: ../../employer-created-jobs.php');
                ob_end_flush();
            }
            else {
                $_SESSION['msgEmployer4'] = $msg;
                $_SESSION['msgClassEmployer4'] = $msgClass;
                header('location: ../../employer-create.php#2');  
                ob_end_flush(); 
            }
        }
        else {
            $_SESSION['msgEmployer4'] = 'Please fill required fields';
            $_SESSION['msgClassEmployer4'] = 'alert-danger';
            header('location: ../../employer-create.php#2');
            ob_end_flush();
        }
    }

    elseif($track == 'track4') {
        $job = $controller->userInput($_POST['job']);
        $qualification = $controller->userInput($_POST['qualification']);
        $responsibilities = $controller->userInput($_POST['responsibilities']);
        $closing = $controller->userInput($_POST['close']);
        $location = $controller->userInput($_POST['location']);

        if(empty($closing) && !empty($_SESSION['closing-edit'])) {
            $closing = $_SESSION['closing-edit'];
        }

        $username = $_SESSION['username-edit'];
        $idUse = $_SESSION['idUse-edit'];

        if(!empty($job) && !empty($qualification) && !empty($responsibilities)) {
            categoryView();
            subView();
            salaryView();
            typeView();
            if(!empty($category) && !empty($sub) && !empty($salary) && !empty($type)) {
                $_SESSION['category-use'] = $category;
                $insertJob = $view->updateDb3View($idUse,"id",$location,'location',$closing,'closing',$responsibilities,'responsibilities',$qualification,'qualifications',$type,'jobType', $salary, 'salary', $job, 'jobTitle', $sub, 'subCategory', $category, 'category', 'recruitmentemployers');
                /*$_SESSION['msgEmployer4'] = 'Job Added Successfully';
                $_SESSION['msgClassEmployer4'] = 'alert-success';
                $_SESSION['msgDisplayEmployer'] = 'Add Another Job';*/
                header('location: ../../employer-created-jobs.php');
                ob_end_flush();
            }
            else {
                $_SESSION['msgEmployer4'] = $msg;
                $_SESSION['msgClassEmployer4'] = $msgClass;
                header('location: ../../employer-create.php#2');  
                ob_end_flush(); 
            }
        }
        else {
            $_SESSION['msgEmployer4'] = 'Please fill required fields';
            $_SESSION['msgClassEmployer4'] = 'alert-danger';
            header('location: ../../employer-create.php#2');
            ob_end_flush();
        }
    }
}



function category() {
    global $msg, $msgClass, $category;
    if($_POST['category'] == "") {
        $msg = "Please Choose a Category for your Company";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['category'] != "") {
        $category = $_POST['category'];
        return true;
    }
    
}

function categoryView() {
    global $msg, $msgClass, $category;
    if($_POST['category'] == "" && $_SESSION['category-edit'] == "") {
        $msg = "Please Choose a Category for your Company";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['category'] != "") {
        $category = $_POST['category'];
        return true;
    }
    elseif($_POST['category'] == "" && $_SESSION['category-edit'] != "") {
        $category = $_SESSION['category-edit'];
        return true;
    }
    
}

function sub() {
    global $msg, $msgClass, $sub;
    if($_POST['sub'] == "") {
        $msg = "Please Choose a sub-category for your Company";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['sub'] != "") {
        $sub = $_POST['sub'];
        return true;
    }
    
}

function subView() {
    global $msg, $msgClass, $sub;
    if($_POST['sub'] == "" && $_SESSION['subCategory-edit'] == "") {
        $msg = "Please Choose a sub-category for your Company";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['sub'] != "") {
        $sub = $_POST['sub'];
        return true;
    }
    elseif($_POST['sub'] == "" && $_SESSION['subCategory-edit'] != "") {
        $sub = $_SESSION['subCategory-edit'];
        return true;
    }
    
}


function type() {
    global $msg, $msgClass, $type;
    if($_POST['type'] == "") {
        $msg = "Please Choose a Job Type";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['type'] != "") {
        $type = $_POST['type'];
        return true;
    }
}

function typeView() {
    global $msg, $msgClass, $type;
    if($_POST['type'] == "" && $_SESSION['jobType-edit'] == "") {
        $msg = "Please Choose a Job Type";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['type'] != "") {
        $type = $_POST['type'];
        return true;
    }
    elseif($_POST['type'] == "" && $_SESSION['jobType-edit'] != "") {
        $type = $_SESSION['jobType-edit'];
        return true;   
    }
}

function state() {
    global $msg, $msgClass, $state;
    if($_POST['state'] == "") {
        $msg = "Please Choose the State your Company is based";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['state'] != "") {
        $state = $_POST['state'];
        return true;
    }
    
}

function staff() {
    global $msg, $msgClass, $staff;
    if($_POST['staff'] == "") {
        $msg = "Please Choose a range for your staff strenght";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['staff'] != "") {
        $staff = $_POST['staff'];
        return true;
    }
    
}

function gender() {
    global $msg, $msgClass, $gender;
    if($_POST['Gender'] == "") {
        $msg = "Please Choose a prefferred Gender";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['Gender'] != "") {
        $gender = $_POST['Gender'];
        return true;
    }
    
}

function salary() {
    global $msg, $msgClass, $salary;
    if(($_POST['salary1'] == "") && ($_POST['salary2'] == "")) {
        $msg = "Please select a salary range";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['salary1'] != "") {
        $salary = $_POST['salary1'];
        return true;
    }
    elseif($_POST['salary2'] != "") {
        $salary = $_POST['salary2'];
        return true;
    }   
}

function salaryView() {
    global $msg, $msgClass, $salary;
    if(($_POST['salary1'] == "") && ($_POST['salary2'] == "") && ($_SESSION['salary-edit'] == "")) {
        $msg = "Please select a salary range";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['salary1'] != "") {
        $salary = $_POST['salary1'];
        return true;
    }
    elseif($_POST['salary2'] != "") {
        $salary = $_POST['salary2'];
        return true;
    }   
    elseif(($_POST['salary1'] == "") && ($_POST['salary2'] == "") && ($_SESSION['salary-edit'] != "")) {
        $salary = $_SESSION['salary-edit'];
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