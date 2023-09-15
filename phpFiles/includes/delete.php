<?php 
ob_start();
session_start();
$username = $_SESSION['usernameUse'];
include 'connect.php';
if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM recruitmentemployers WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $sql1 = "DELETE FROM application WHERE companyId = '$id'";
        $query1 = mysqli_query($con,$sql1);
        $sql2 = "DELETE FROM shortlist WHERE companyId = '$id'";
        $query2 = mysqli_query($con,$sql2);
        header("location: ../../employer-created-jobs.php");
        ob_end_flush();
    }
}

elseif(!empty($_GET['id2'])) {
    $id = $_GET['id2'];
    $sql = "DELETE FROM education WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $_SESSION['msgPersonal5'] = 'Education Removed Successfully';
        $_SESSION['msgClassPersonal5'] = 'alert-success';        
        header("location: ../../candidates-work-profile3.php");
        ob_end_flush();
    }
}

elseif(!empty($_GET['id3'])) {
    $id = $_GET['id3'];
    $sql = "DELETE FROM experience WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $_SESSION['msgPersonal4'] = 'Work Experience Removed Successfully';
        $_SESSION['msgClassPersonal4'] = 'alert-success';        
        header("location: ../../candidates-work-profile2.php");
        ob_end_flush();
    }
}
elseif(!empty($_GET['id4'])) {
    $id = $_GET['id4'];
    $sql = "DELETE FROM skill WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $_SESSION['msgPersonal6'] = 'Skill Removed Successfully';
        $_SESSION['msgClassPersonal6'] = 'alert-success';        
        header("location: ../../candidates-work-profile4.php");
        ob_end_flush();
    }
}
elseif(!empty($_GET['company']) && !empty($_GET['candidate'])) {
    
    $company = $_GET['company'];
    $candidate = $_GET['candidate'];
    $companyId = $_GET['companyId'];

    $sql = "DELETE FROM shortlist WHERE company = '$company' AND candidate = '$candidate' AND companyId = '$companyId'";
    $query = mysqli_query($con,$sql);
    if($query) {
        header("location: ../../employer-recommended-candidates-view.php#skill");
        ob_end_flush();
    }
}

elseif(!empty($_GET['company2']) && !empty($_GET['candidate2'])) {
    $company = $_GET['company2'];
    $candidate = $_GET['candidate2'];
    $companyId = $_GET['companyId2'];
    $sql = "DELETE FROM application WHERE company = '$company' AND candidate = '$candidate' AND companyId = '$companyId'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $_SESSION['appStat'] = "Job Application Withdrawal Successful";
        $_SESSION['appStatClass'] = "alert-success";
        header("location: ../../candidates-available-jobs-view.php#cover");
        ob_end_flush();
    }
}

elseif(!empty($_GET['companyId3']) && !empty($_GET['candidate3'])) {
    $companyId = $_GET['companyId3'];
    $candidate = $_GET['candidate3'];
    $sql = "DELETE FROM shortlistfree WHERE companyId = '$companyId' AND candidate = '$candidate'";
    $query = mysqli_query($con,$sql);
    if($query) {
        header("location: ../../freemp-shortlist.php");
        ob_end_flush();
    }
}

elseif(!empty($_GET['candidate4']) && !empty($_GET['companyId4'])) {
    $companyId = $_GET['companyId4'];
    $candidate = $_GET['candidate4'];
    $sql = "DELETE FROM applicationfree WHERE companyId = '$companyId' AND candidate = '$candidate'";
    $query = mysqli_query($con,$sql);
    $sql = "DELETE FROM milestones WHERE companyId = '$companyId' AND username = '$candidate'";
    $query = mysqli_query($con,$sql);
    if($query) {
        header("location: ../../freelance-applications.php");
        ob_end_flush();
    }
}

elseif(!empty($_GET['candidate5']) && !empty($_GET['companyId5'])) {
    $companyId = $_GET['companyId5'];
    $candidate = $_GET['candidate5'];
    $sql = "DELETE FROM shortlistout WHERE companyId = '$companyId' AND candidate = '$candidate'";
    $query = mysqli_query($con,$sql);
    if($query) {
        header("location: ../recommended-outsourcers-view.php");
        ob_end_flush();
    }
}

elseif(!empty($_GET['candidate6']) && !empty($_GET['companyId6'])) {
    $companyId = $_GET['companyId6'];
    $candidate = $_GET['candidate6'];
    $sql = "DELETE FROM applicationout WHERE companyId = '$companyId' AND candidate = '$candidate'";
    $query = mysqli_query($con,$sql);
    if($query) {
        header("location: ../available-jobs-out-view.php");
        ob_end_flush();
    }
}

elseif(!empty($_GET['company7']) && !empty($_GET['candidate7'])) {
    $company = $_GET['company7'];
    $candidate = $_GET['candidate7'];
    $companyId = $_GET['companyId7'];
    $sql = "DELETE FROM application WHERE company = '$company' AND candidate = '$candidate' AND companyId = '$companyId'";
    $query = mysqli_query($con,$sql);
    if($query) {
        header("location: ../../candidates-applications.php");
        ob_end_flush();
    }
}

elseif(!empty($_GET['id5'])) {
    $id = $_GET['id5'];
    $sql = "DELETE FROM freelancejobs WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $_SESSION['msgFree4'] = 'GIG Removed Successfully';
        $_SESSION['msgClassFree4'] = 'alert-success';        
        header("location: ../../freelance-gig.php#1");
        ob_end_flush();
    }
}

elseif(!empty($_GET['id6'])) {
    $id = $_GET['id6'];
    $sql = "DELETE FROM freelanceportfolio WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $_SESSION['msgFree5'] = 'Portfolio Removed Successfully';
        $_SESSION['msgClassFree5'] = 'alert-success';        
        header("location: ../../freelance-gig.php#2");
        ob_end_flush();
    }
}

elseif(!empty($_GET['id7'])) {
    $id = $_GET['id7'];
    $sql = "DELETE FROM outsourcejobs WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $_SESSION['msgOut3'] = 'Service Removed Successfully';
        $_SESSION['msgClassOut3'] = 'alert-success';        
        header("location: ../dashboard-outsourcer.php#3");
        ob_end_flush();
    }
}

elseif(!empty($_GET['id8'])) {
    $id = $_GET['id8'];
    $sql = "DELETE FROM outsourceportfolio WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $_SESSION['msgOut5'] = 'Portfolio Removed Successfully';
        $_SESSION['msgClassOut5'] = 'alert-success';        
        header("location: ../dashboard-outsourcer.php#5");
        ob_end_flush();
    }
}

elseif(!empty($_GET['id9'])) {
    $id = $_GET['id9'];
    $sql = "DELETE FROM freelanceemployers WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $sql1 = "DELETE FROM applicationfree WHERE companyId = '$id'";
        $query1 = mysqli_query($con,$sql1);
        $sql2 = "DELETE FROM shortlistfree WHERE companyId = '$id'";
        $query2 = mysqli_query($con,$sql2);
        header("location: ../../freemp-created-jobs.php");
        ob_end_flush();
    }
}

elseif(!empty($_GET['id10'])) {
    $id = $_GET['id10'];
    $sql = "DELETE FROM outsourceemployers WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $_SESSION['msgOutEmp2'] = 'Job Removed Successfully';
        $_SESSION['msgClassOutEmp2'] = 'alert-success';        
        header("location: ../dashboard-outsourcerEmp.php#2");
        ob_end_flush();
    }
}

elseif(!empty($_GET['id11'])) {
    $id = $_GET['id11'];
    $sql = "DELETE FROM milestones WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $_SESSION['msgFreeMile'] = 'Milestone Removed Successfully';
        $_SESSION['msgClassFreeMile'] = 'alert-success';        
        header("location: ../terms.php#2");
        ob_end_flush();
    }
}

else {
    header("location: ../login.php");
    ob_end_flush();
}
?>