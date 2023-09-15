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
$prevPic = $_SESSION['prevPic'];

if($_SESSION['track-freelancer'] == 1) {
    $controller = new Controller();
    $track = $controller->userInput($_POST['track']);
    if ($track == 'track1') {
        $firstName = $controller->userInput($_POST['firstName']);
        $lastName = $controller->userInput($_POST['lastName']);
        $phone = $controller->userInput($_POST['phone']);
        $address = $controller->userInput($_POST['state']);
        $city = $controller->userInput($_POST['city']);
        $about = $controller->userInput($_POST['about']);
        $picture = $_FILES['picture']['name'];

        if(!empty($picture)) {
            $fileTempName1 = $_FILES['picture']['tmp_name'];
            $path1 = "../../freelanceimages/".$picture;   
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
        $_SESSION['about'] = $about;

        if(!empty($firstName) && !empty($lastName) && !empty($phone) && !empty($city)&& !empty($about)) {
            Gender();
            country();
            if(!empty($address) && !empty($country) && !empty($Gender)) {
                $updateDb = $view->updateDb3View($username, 'username', $firstName, 'firstName', $lastName, 'lastName', $address, 'address', $city, 'city', $country, 'country', $phone, 'phone', $picture, 'picture', $Gender, 'gender', $about, 'about', 'users');
                move_uploaded_file($fileTempName1,$path1);
                $_SESSION['msgFree'] = 'Personal details uploaded Successfully';
                $_SESSION['msgClassFree'] = 'alert-success';
                $_SESSION['msgFree4'] = 'Personal details uploaded Successfully';
                $_SESSION['msgClassFree4'] = 'alert-success';
                $_SESSION['status'] = 'done';
                header('location: ../../freelance-gig.php');
                ob_end_flush();
            }
            else {
                $_SESSION['msgFree'] = $msg;
                $_SESSION['msgClassFree'] = $msgClass;
                header('location: ../../freelance-account.php#1');
                ob_end_flush();
            }
        }
        else {
            $_SESSION['msgFree'] = 'Please fill all fields';
            $_SESSION['msgClassFree'] = 'alert-danger';
            header('location: ../../freelance-account.php#1');
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
            $_SESSION['msgFree2'] = 'Email updated successfully';
            $_SESSION['msgClassFree2'] = 'alert-success';  
            header('location: ../../freelance-account.php#2');
            ob_end_flush();
        }
        if(!empty($oldPass) && !empty($newPass) && !empty($conNew) && !empty($email)) {
            $updateEmail = $view->updateDb2View($username,'username',$email,'email','users');
            $_SESSION['msgFree2'] = 'Email updated successfully';
            $_SESSION['msgClassFree2'] = 'alert-success';  
            
            $checkPass = $controller->searchDbContr($username, 'username', 'users');
            $password = $checkPass['password'];
            if($password === $oldPass) {
                if($newPass === $conNew) {
                    $updatePass = $view->updateDb2View($username,'username',$newPass,'password','users');
                    $_SESSION['msgFree3'] = 'Password changed successfully';
                    $_SESSION['msgClassFree3'] = 'alert-success';  
                    header('location: ../../freelance-account.php#2');
                    ob_end_flush();
                }
                else {
                    $_SESSION['msgFree3'] = 'Please confirm your new password correctly';
                    $_SESSION['msgClassFree3'] = 'alert-danger';  
                    header('location: ../../freelance-account.php#2');
                    ob_end_flush();
                }   
            }
            else {
                $_SESSION['msgFree3'] = 'Incorrect Password';
                $_SESSION['msgClassFree3'] = 'alert-danger';  
                header('location: ../../freelance-account.php#2');
                ob_end_flush();
            }
        }

    }

    elseif($track == 'track3') {
        $job = $controller->userInput($_POST['job']);
        $url = $controller->userInput($_POST['url']);
        $description = $controller->userInput($_POST['description']);
        $_SESSION['job'] = $job;
        $_SESSION['url'] = $url;
        
        if(!empty($job) && !empty($description)) {
            category();
            sub();
            price();
            if(!empty($category) && !empty($sub) && !empty($price)) {
                $_SESSION['category-use'] = $category;
                $updateJob = $controller->insertDetails6Contr($username, $job, $price, $category, $sub, $url, $description);
                $_SESSION['msgFree4'] = 'GIG created successfully';
                $_SESSION['msgClassFree4'] = 'alert-success';
                $_SESSION['msgGIG'] = 'Create another GIG';
                header('location: ../../freelance-recommended-jobs.php');
                ob_end_flush();
            }
            else {    
                $_SESSION['msgFree4'] = $msg;
                $_SESSION['msgClassFree4'] = $msgClass;
                header('location: ../../freelance-gig.php#1');
                ob_end_flush();
            }
        }

        else {
            $_SESSION['msgFree4'] = 'Please fill in all fields ';
            $_SESSION['msgClassFree4'] = 'alert-danger';
            header('location: ../../freelance-gig.php#1');
            ob_end_flush();
        }
    }

    elseif($track == 'track4') {
        $title = $controller->userInput($_POST['title']);
        $project = $controller->userInput($_POST['project']);
        $porturl = $controller->userInput($_POST['porturl']);
        $_SESSION['title'] = $title;
        $_SESSION['project'] = $project;
        $_SESSION['porturl'] = $porturl;
        if(!empty($title) && !empty($project)) {
            $update = $controller->insertDetails7Contr($username, $title, $project, $porturl);
            $_SESSION['msgFree5'] = 'Portfolio added successfully.';
            $_SESSION['msgClassFree5'] = 'alert-success';
            $_SESSION['msgDisplayFree2'] = 'Add another Portfolio';  
            header('location: ../../freelance-gig.php#2');
            ob_end_flush();
        }
        else {
            $_SESSION['msgFree5'] = 'Please fill in all fields';
            $_SESSION['msgClassFree5'] = 'alert-danger';  
            header('location: ../../freelance-gig.php#2');
            ob_end_flush();
        }
    }

    elseif($track == 'track5') {
        $company = $_SESSION['company'];
        $candidate = $_SESSION['candidate'];
        $companyId = $_SESSION['companyId'];
        $bid = $controller->userInput($_POST['bid']);
        $cover = $controller->userInput($_POST['cover']);
        $support = $_FILES['support']['name'];

        $_SESSION['bid'] = $bid;
        $_SESSION['cover'] = $cover;

        if(!empty($support)) {
            $fileTempName1 = $_FILES['support']['tmp_name'];
            $path1 = "../../support/".$support;   
        }
        
        $sql = "INSERT INTO applicationfree (company, candidate, companyId, coverLetter, bid, support) VALUES ('".$company."','".$candidate."','".$companyId."','".$cover."','".$bid."','".$support."')";
        $query = mysqli_query($con,$sql);       
        if($query) {
            move_uploaded_file($fileTempName1,$path1);
            $_SESSION['msgFreeTerms'] = "Application Successful";
            $_SESSION['msgClassFreeTerms'] = "alert-success";
            header('location: ../../freelance-recommended-jobs-view.php#1');
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
        $msg = "Please select a starting price for this GIG";
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