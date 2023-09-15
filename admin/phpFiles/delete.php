<?php 
ob_start();
session_start();
include 'connect.php';
if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM recruitmentemployers WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $_SESSION['msgEmployer2'] = 'Job Removed Successfully';
        $_SESSION['msgClassEmployer2'] = 'alert-success';        
        header("location: ../dashboard-employer.php#2");
        ob_end_flush();
    }
}
elseif(!empty($_GET['id2'])) {
    $id = $_GET['id2'];
    $sql = "DELETE FROM education WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $_SESSION['msgPersonal2'] = 'Education Removed Successfully';
        $_SESSION['msgClassPersonal2'] = 'alert-success';        
        header("location: ../dashboard-candidate.php#2");
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
        header("location: ../dashboard-candidate.php#4");
        ob_end_flush();
    }
}
elseif(!empty($_GET['id4'])) {
    $id = $_GET['id4'];
    $sql = "DELETE FROM skill WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $_SESSION['msgPersonal5'] = 'Skill Removed Successfully';
        $_SESSION['msgClassPersonal5'] = 'alert-success';        
        header("location: ../dashboard-candidate.php#5");
        ob_end_flush();
    }
}
elseif(!empty($_GET['company']) && !empty($_GET['candidate'])) {
    $company = $_GET['company'];
    $candidate = $_GET['candidate'];
    $sql = "DELETE FROM shortlist WHERE company = '$company' AND candidate = '$candidate'";
    $query = mysqli_query($con,$sql);
    if($query) {
        header("location: ../recommended-candidates-view.php");
        ob_end_flush();
    }
}

elseif(!empty($_GET['company2']) && !empty($_GET['candidate2'])) {
    $company = $_GET['company2'];
    $candidate = $_GET['candidate2'];
    $sql = "DELETE FROM application WHERE company = '$company' AND candidate = '$candidate'";
    $query = mysqli_query($con,$sql);
    if($query) {
        header("location: ../available-jobs-view.php");
        ob_end_flush();
    }
}

elseif(!empty($_GET['companyId3']) && !empty($_GET['candidate3'])) {
    $companyId = $_GET['companyId3'];
    $candidate = $_GET['candidate3'];
    $sql = "DELETE FROM shortlistfree WHERE companyId = '$companyId' AND candidate = '$candidate'";
    $query = mysqli_query($con,$sql);
    if($query) {
        header("location: ../recommended-freelancers-view.php");
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
        header("location: ../available-jobs-free-view.php");
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

elseif(!empty($_GET['id5'])) {
    $id = $_GET['id5'];
    $sql = "DELETE FROM freelancejobs WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $_SESSION['msgFree3'] = 'GIG Removed Successfully';
        $_SESSION['msgClassFree3'] = 'alert-success';        
        header("location: ../dashboard-freelancer.php#3");
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
        header("location: ../dashboard-freelancer.php#5");
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
        $_SESSION['msgFreeEmp2'] = 'Job Removed Successfully';
        $_SESSION['msgClassFreeEmp2'] = 'alert-success';        
        header("location: ../dashboard-freelancerEmp.php#2");
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

elseif(!empty($_GET['id12'])) {
    $id = $_GET['id12'];
    $sql = "DELETE FROM categories WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $_SESSION['msgCat'] = 'Category Removed Successfully';
        $_SESSION['msgClassCat'] = 'alert-success';        
        header("location: ../create-cat.php");
        ob_end_flush();
    }
}

elseif(!empty($_GET['id13'])) {
    $id = $_GET['id13'];
    $sql = "DELETE FROM sub WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query) {
        $_SESSION['msgSub'] = 'Sub category Removed Successfully';
        $_SESSION['msgClassSub'] = 'alert-success';        
        header("location: ../create-sub.php");
        ob_end_flush();
    }
}

elseif(!empty($_GET['idcandidate'])) {
    $username = $_GET['idcandidate'];
    $query1 = mysqli_query($con, "DELETE FROM users WHERE username = '$username'");
    $query2 = mysqli_query($con, "DELETE FROM application WHERE candidate = '$username'");
    $query3 = mysqli_query($con, "DELETE FROM experience WHERE username = '$username'");
    $query4 = mysqli_query($con, "DELETE FROM jobs WHERE username = '$username'");
    $query5 = mysqli_query($con, "DELETE FROM paymentcandidates WHERE paidFor = '$username'");
    $query6 = mysqli_query($con, "DELETE FROM paymentemployers WHERE paidBy = '$username'");
    $query7 = mysqli_query($con, "DELETE FROM shortlist WHERE candidate = '$username'");
    $query8 = mysqli_query($con, "DELETE FROM skill WHERE username = '$username'");
    $query8 = mysqli_query($con, "DELETE FROM education WHERE username = '$username'");

    $_SESSION['deleteMsg'] = $username.' '.'removed Successfully';
    $_SESSION['deleteMsgClass'] = 'alert-success';        
    header("location: ../recruitment-candidates.php");
    ob_end_flush();
}

elseif(!empty($_GET['idemployer'])) {
    $id = $_GET['idemployer'];
    $username = $_GET['username'];
    $query1 = mysqli_query($con, "DELETE FROM users WHERE username = '$username'");
    $query2 = mysqli_query($con, "DELETE FROM application WHERE company = '$username'");
    $query3 = mysqli_query($con, "DELETE FROM recruitmentemployers WHERE username = '$username'");
    $query5 = mysqli_query($con, "DELETE FROM paymentcandidates WHERE paidBy = '$username'");
    $query6 = mysqli_query($con, "DELETE FROM paymentemployers WHERE paidFor = '$username'");
    $query7 = mysqli_query($con, "DELETE FROM shortlist WHERE company = '$username'");

    $_SESSION['deleteMsgEmp'] = $username.' '.'removed Successfully';
    $_SESSION['deleteMsgEmpClass'] = 'alert-success';        
    header("location: ../dashboard-employers.php");
    ob_end_flush();
    
}

elseif(!empty($_GET['idEmployerDeactivate'])) {
    $id = $_GET['idEmployerDeactivate'];
    $query = mysqli_query($con, "UPDATE recruitmentemployers SET status = 'inactive' WHERE id = '$id'");
    header("location: ../recruitment-employers.php");
    ob_end_flush();
}

elseif(!empty($_GET['idEmployerActivate'])) {
    $id = $_GET['idEmployerActivate'];
    $query = mysqli_query($con, "UPDATE recruitmentemployers SET status = 'active' WHERE id = '$id'");
    header("location: ../recruitment-employers-inactive.php");
    ob_end_flush();
}

elseif(!empty($_GET['idfreelance'])) {
    $username = $_GET['idfreelance'];
    $query1 = mysqli_query($con, "DELETE FROM users WHERE username = '$username'");
    $query2 = mysqli_query($con, "DELETE FROM applicationfree WHERE candidate = '$username'");
    $query4 = mysqli_query($con, "DELETE FROM freelancejobs WHERE username = '$username'");
    $query5 = mysqli_query($con, "DELETE FROM freelanceportfolio WHERE username = '$username'");
    $query6 = mysqli_query($con, "DELETE FROM paymentfreelance WHERE paidFor = '$username'");
    $query7 = mysqli_query($con, "DELETE FROM paymentfreelanceemp WHERE paidBy = '$username'");
    $query8 = mysqli_query($con, "DELETE FROM shortlistfree WHERE candidate = '$username'");
    $query9 = mysqli_query($con, "DELETE FROM milestones WHERE username = '$username'");

    $_SESSION['deleteMsgFree'] = $username.' '.'removed Successfully';
    $_SESSION['deleteMsgFreeClass'] = 'alert-success';        
    header("location: ../freelance-all.php");
    ob_end_flush();  
    
}

elseif(!empty($_GET['idfreelanceemp'])) {
    $id = $_GET['idfreelanceemp'];
    $query2 = mysqli_query($con, "DELETE FROM applicationfree WHERE companyId = '$id'");
    $query4 = mysqli_query($con, "DELETE FROM freelanceemployers WHERE id = '$id'");
    $query8 = mysqli_query($con, "DELETE FROM shortlistfree WHERE companyId = '$id'");
    
    $_SESSION['deleteMsgFreeEmp'] = $username.' '.'removed Successfully';
    $_SESSION['deleteMsgFreeEmpClass'] = 'alert-success';        
    header("location: ../freemp-all.php");
    ob_end_flush();   
}

else {
    header("location: ../login.php");
    ob_end_flush();
}
?>