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
$prevPic = $_SESSION['prevPic'];

if($_SESSION['track-candidate'] == 1) {
    $controller = new Controller();
    $track = $controller->userInput($_POST['track']);
    if ($track == 'track1') {
        $firstName = $controller->userInput($_POST['firstName']);
        $lastName = $controller->userInput($_POST['lastName']);
        $phone = $controller->userInput($_POST['phone']);
        $address = $controller->userInput($_POST['state']);
        $city = $controller->userInput($_POST['city']);
        $picture = $_FILES['picture']['name'];

        if(!empty($picture)) {
            $fileTempName1 = $_FILES['picture']['tmp_name'];
            $path1 = "../../recruitimages/".$picture;   
        }
        elseif(!empty($prevPic)) {
            $picture = $prevPic;
        }
        else {
            $picture = "image.jpg";
        }

        $_SESSION['prevPic'] = $picture;

        $_SESSION['firstName'] = $firstName; 
        $_SESSION['lastName'] = $lastName;
        $_SESSION['phone'] = $phone;
        $_SESSION['city'] = $city;
        $_SESSION['state'] = $address;

        if(!empty($firstName) && !empty($lastName) && !empty($phone) && !empty($city)) {
            Gender();
            country();
            if(!empty($address) && !empty($Gender) && !empty($country)) {
                $updateDb = $view->updateDbView($username, 'username', $firstName, 'firstName', $lastName, 'lastName', $address, 'address', $city, 'city', $phone, 'phone', $picture, 'picture', $Gender, 'gender', $country, 'country', 'users');
                move_uploaded_file($fileTempName1,$path1);
                $_SESSION['msgWork'] = 'Personal details updated successfully';
                $_SESSION['msgClassWork'] = 'alert-success';
                $_SESSION['msgPersonal'] = 'Personal details updated successfully';
                $_SESSION['msgClassPersonal'] = 'alert-success';
                $_SESSION['status'] = 'done';
                header('location: ../../candidates-work-profile1.php');
                ob_end_flush();
            }
            else {
                $_SESSION['msgPersonal'] = $msg;
                $_SESSION['msgClassPersonal'] = $msgClass;
                header('location: ../../candidates-account.php#1');
                ob_end_flush();
            }
        }
        
        else {
            $_SESSION['msgPersonal'] = 'Please fill all fields';
            $_SESSION['msgClassPersonal'] = 'alert-danger';
            header('location: ../../candidates-account.php#1');
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
            $_SESSION['msgPersonal2'] = 'Email updated successfully';
            $_SESSION['msgClassPersonal2'] = 'alert-success';  
            header('location: ../../candidates-account.php#2');
            ob_end_flush();
        }
        
        if(!empty($oldPass) && !empty($newPass) && !empty($conNew) && !empty($email)) {
            $updateEmail = $view->updateDb2View($username,'username',$email,'email','users');
            $_SESSION['msgPersonal2'] = 'Email updated successfully';
            $_SESSION['msgClassPersonal2'] = 'alert-success';  
            
            $checkPass = $controller->searchDbContr($username, 'username', 'users');
            $password = $checkPass['password'];
            if($password === $oldPass) {
                if($newPass === $conNew) {
                    $updatePass = $view->updateDb2View($username,'username',$newPass,'password','users');
                    $_SESSION['msgPersonal3'] = 'Password changed successfully';
                    $_SESSION['msgClassPersonal3'] = 'alert-success';  
                    header('location: ../../candidates-account.php#2');
                    ob_end_flush();
                }
                else {
                    $_SESSION['msgPersonal3'] = 'Please confirm your new password correctly';
                    $_SESSION['msgClassPersonal3'] = 'alert-danger';  
                    header('location: ../../candidates-account.php#2');
                    ob_end_flush();
                }   
            }
            else {
                $_SESSION['msgPersonal3'] = 'Incorrect Password';
                $_SESSION['msgClassPersonal3'] = 'alert-danger';  
                header('location: ../../candidates-account.php#2');
                ob_end_flush();
            }
        }

    }

    elseif($track == 'track3') {
        $job = $controller->userInput($_POST['job']);
        $_SESSION['job'] = $job;
        if(!empty($job)) {
            category();
            sub();
            type();
            salary();
            experience();
            if(!empty($category) && !empty($sub) && !empty($type) && !empty($salary) && !empty($exp)) {
                $_SESSION['category-use'] = $category;
                $updateJob = $controller->insertDetails4Contr($username, $job, $salary, $category, $type, $sub, $exp);
                $_SESSION['msgPersonal4'] = 'Your work details has been updated. Update us on your work experience';
                $_SESSION['msgClassPersonal4'] = 'alert-success';
                $_SESSION['msgWork'] = 'Your work details has been updated.';
                $_SESSION['msgClassWork'] = 'alert-success';
                header('location: ../../candidates-work-profile2.php');
                ob_end_flush();
            }
            else {
                $_SESSION['msgWork'] = $msg;
                $_SESSION['msgClassWork'] = $msgClass;
                header('location: ../../candidates-work-profile1.php');
                ob_end_flush();
            }
        }
        else {
            $_SESSION['msgWork'] = 'Please choose a Job Title ';
            $_SESSION['msgClassWork'] = 'alert-danger';
            header('location: ../../candidates-work-profile1.php');
            ob_end_flush();
        }
    }

    elseif($track == 'track4') {
        $company = $controller->userInput($_POST['company']);
        $position = $controller->userInput($_POST['position']);
        $duty = $controller->userInput($_POST['duty']);
        $start2 = $controller->userInput($_POST['start2']);
        $end2 = $controller->userInput($_POST['end2']);
        
        if(!empty($company) && !empty($position) && !empty($duty) && !empty($start2) && !empty($end2)) {
            $insert = $controller->insertDetails2Contr($username, $company, $position, $duty, $start2, $end2);
            $_SESSION['msgPersonal4'] = 'Work Experience added successfully. You can add another or click next below to proceed to the next segment';
            $_SESSION['msgClassPersonal4'] = 'alert-success';
            $_SESSION['msgDisplay2'] = 'Add another Work Experience';
            header('location: ../../candidates-work-profile2.php');
            ob_end_flush();
        }

        else {
            $_SESSION['msgPersonal4'] = 'Please fill in all fields ';
            $_SESSION['msgClassPersonal4'] = 'alert-danger';
            header('location: ../../candidates-work-profile2.php');
            ob_end_flush();
        }
    }

    elseif($track == 'track5') {
        $school1 = $controller->userInput($_POST['school1']);
        $start1 = $controller->userInput($_POST['start1']);
        $end1 = $controller->userInput($_POST['end1']);
        $course = $controller->userInput($_POST['course']);

        if(!empty($school1) && !empty($start1) && !empty($end1)) {
            qualification();
            if(!empty($qualification)) {
                $insert = $controller->insertDetailsContr($username, $school1, $start1, $end1, $qualification, $course);
                $_SESSION['msgPersonal5'] = 'Educational Experience Successfully Updated. You can add another or click next below to proceed to the next segment';
                $_SESSION['msgClassPersonal5'] = 'alert-success';
                $_SESSION['msgDisplay'] = 'Add another Educational Background';
                header('location: ../../candidates-work-profile3.php');
                ob_end_flush();
            }
            else {
                $_SESSION['msgPersonal5'] = $msg;
                $_SESSION['msgClassPersonal5'] = $msgClass;
                header('location: ../../candidates-work-profile3.php');
                ob_end_flush();   
            }
        }
        else {
            $_SESSION['msgPersonal5'] = 'Please fill in all fields';
            $_SESSION['msgClassPersonal5'] = 'alert-danger';
            header('location: ../../candidates-work-profile3.php');
            ob_end_flush();
        }

    }

    elseif($track == 'track6') {
        $about = $controller->userInput($_POST['about']);
        $skill = $controller->userInput($_POST['Skill']);
        $_SESSION['about'] = str_replace( '\r\n', '', $about);
        if(!empty($about) && empty($skill)) {
            $update = $view->updateDb2View($username, 'username', $about, 'about', 'users');
            $_SESSION['msgPersonal6'] = 'Profile updated successfully. You can add another skill or click "recommended jobs" to view recommended jobs .' ;
            $_SESSION['msgClassPersonal6'] = 'alert-success';  
            header('location: ../../candidates-work-profile4.php');
            ob_end_flush();
        }
        else if(!empty($about) && !empty($skill)) {
            level();
            if(!empty($level)) {
                $update = $view->updateDb2View($username, 'username', $about, 'about', 'users');
                $insertSkill = $controller->insertDetails5Contr($username, $skill, $level);
                $_SESSION['msgPersonal6'] = 'Profile updated successfully. You can add another skill or click "recommended jobs" to view recommended jobs .';
                $_SESSION['msgClassPersonal6'] = 'alert-success';
                $_SESSION['msgDisplay3'] = 'Add another Skill.';  
                header('location: ../../candidates-work-profile4.php');
                ob_end_flush();
            }
        }
        elseif(empty($about)) {
            $_SESSION['msgPersonal6'] = 'Please fill in all fields';
            $_SESSION['msgClassPersonal6'] = 'alert-danger';  
            header('location: ../../candidates-work-profile4.php');
            ob_end_flush();
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
        $msg = "Please select a Category";
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

function experience() {
    global $msg, $msgClass, $exp;
    if($_POST['exp'] == "") {
        $msg = "Please select a your experience";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['exp'] != "") {
        $exp = $_POST['exp'];
        return true;
    }   
}

function qualification() {
    global $msg, $msgClass, $qualification;
    if($_POST['qualification'] == "") {
        $msg = "Please select a your qualification";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['qualification'] != "") {
        $qualification = $_POST['qualification'];
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