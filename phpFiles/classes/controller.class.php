<?php 

class Controller extends Model {

    public function createUserContr($username, $email, $password, $section) {
        $this->createUser($username, $email, $password, $section);
    }
    public function createUserAllContr($table,$username, $email, $password, $section) {
        $this->createUserAll($table,$username, $email, $password, $section);
    }
    public function userLoginContr($username, $password) {
        return $this->userLogin($username, $password);
    }

    public function insertDetailsContr($username, $school, $start, $end, $level, $course) {
        return $this->insertDetails($username, $school, $start, $end, $level, $course);
    }

    public function insertDetails2Contr($username, $company, $position, $duty, $start2, $end2) {
        return $this->insertDetails2($username, $company, $position, $duty, $start2, $end2);
    }

    public function insertDetails3Contr($username, $category, $sub, $jobTitle, $salary, $jobType, $qualifications, $responsibilities, $location, $closing) {
        return $this->insertDetails3($username, $category, $sub, $jobTitle, $salary, $jobType, $qualifications, $responsibilities, $location, $closing);
    }

    public function insertDetails4Contr($username, $jobTitle, $salary, $category, $jobType, $sub, $expe) {
        return $this->insertDetails4($username, $jobTitle, $salary, $category, $jobType, $sub, $expe);
    }

    public function insertDetails5Contr($username, $skill, $level) {
        return $this->insertDetails5($username, $skill, $level);
    }

    public function insertDetails6Contr($username, $jobTitle, $price, $category, $sub, $url, $description) {
        return $this->insertDetails6($username, $jobTitle, $price, $category, $sub, $url, $description);
    }

    public function insertDetails7Contr($username, $title, $description, $porturl) {
        return $this->insertDetails7($username, $title, $description, $porturl);
    }

    public function insertDetails8Contr($username, $category, $sub, $jobTitle, $budget, $description, $sample) {
        return $this->insertDetails8($username, $category, $sub, $jobTitle, $budget, $description, $sample);
    }

    public function insertDetails9Contr($username, $jobTitle, $price, $category, $sub, $url, $description) {
        return $this->insertDetails9($username, $jobTitle, $price, $category, $sub, $url, $description);
    }

    public function insertDetails10Contr($username, $title, $description, $porturl) {
        return $this->insertDetails10($username, $title, $description, $porturl);
    }

    public function insertDetails11Contr($username, $category, $sub, $jobTitle, $budget, $description, $sample) {
        return $this->insertDetails11($username, $category, $sub, $jobTitle, $budget, $description, $sample);
    }

    public function userInput($data) {
        return $this->dataRecieve($data);
    }
    
    public function searchDbContr($data, $column, $table) {
        return $this->searchDb($data, $column, $table);
    }
    
}



?>