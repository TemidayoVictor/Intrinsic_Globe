<?php 

class Model extends Dbh {

    public function dataRecieve($dat) {
        $encrypted = $this->recieveInput($dat);
        return $encrypted;
    }

    public function createCat($cat) {
        $this->connect();
        $sql = "INSERT INTO categories (category) VALUES ('".$cat."')";
        $query = mysqli_query($this->con,$sql);
        if($query) {
            echo "Successfully Inserted";
        }
        else {
            echo "Unsuccessful";
        }
    }

    public function createSub($cat, $sub) {
        $this->connect();
        $sql = "INSERT INTO sub (category, sub) VALUES ('".$cat."','".$sub."')";
        $query = mysqli_query($this->con,$sql);
        if($query) {
            echo "Successfully Inserted";
        }
        else {
            echo "Unsuccessful";
        }
    }

    public function createUser($username, $email, $password, $section) {
        $this->connect();
        $sql = "INSERT INTO users (username, email, password, section) VALUES ('".$username."','".$email."','".$password."','".$section."')";
        $query = mysqli_query($this->con,$sql);
        if($query) {
            echo "Successfully Inserted";
        }
        else {
            echo "Unsuccessful";
        }
    }

    public function createUserAll($table,$username, $email, $password, $section) {
        $this->connect();
        $sql = "INSERT INTO $table (username, email, password, section) VALUES ('".$username."','".$email."','".$password."','".$section."')";
        $query = mysqli_query($this->con,$sql);
        if($query) {
            echo "Successfully Inserted";
        }
        else {
            echo "Unsuccessful";
        }
    }

    public function insertDetails($username, $school, $start, $end, $level) {
        $this->connect();
        $sql = "INSERT INTO education (username, institution, start, end, level) VALUES ('".$username."','".$school."','".$start."','".$end."','".$level."')";
        $query = mysqli_query($this->con,$sql);
        if($query) {
            echo "Successfully Inserted";
        }
        else {
            echo "Unsuccessful";
        }
    }

    public function insertDetails2($username, $company, $position, $duty, $start2, $end2) {
        $this->connect();
        $sql = "INSERT INTO experience (username, company, position, duty, start, end) VALUES ('".$username."','".$company."','".$position."','".$duty."','".$start2."','".$end2."')";
        $query = mysqli_query($this->con,$sql);
        if($query) {
            echo "Successfully Inserted";
        }
        else {
            echo "Unsuccessful";
        }
    }

    public function insertDetails3($username, $category, $sub, $jobTitle, $salary, $jobType, $qualifications, $responsibilities, $gender, $closing) {
        $this->connect();
        $sql = "INSERT INTO recruitmentemployers (username, category, subCategory, jobTitle, salary, jobType, qualifications, responsibilities, gender, closing) VALUES ('".$username."','".$category."','".$sub."','".$jobTitle."','".$salary."','".$jobType."','".$qualifications."','".$responsibilities."','".$gender."','".$closing."')";
        $query = mysqli_query($this->con,$sql);
        if($query) {
            echo "Successfully Inserted";
        }
        else {
            echo "Unsuccessful";
        }
    }

    public function insertDetails4($username, $jobTitle, $salary, $category, $jobType, $sub) {
        $this->connect();   
        $query = mysqli_query($this->con, "SELECT * from jobs WHERE username='$username'");
        if(mysqli_num_rows($query)>0){
            $sql = "DELETE FROM jobs WHERE username = '$username'";
            $query = mysqli_query($this->con,$sql);
        }
        $sql = "INSERT INTO jobs (username, jobTitle, salary, category, jobType, subCategory) VALUES ('".$username."','".$jobTitle."','".$salary."','".$category."','".$jobType."','".$sub."')";
        $query = mysqli_query($this->con,$sql);
        if($query) {
            echo "Successfully Inserted";
        }
        else {
            echo "Unsuccessful";
        }
    }

    public function insertDetails5($username, $skill, $level) {
        $this->connect();
        $sql = "INSERT INTO skill (username, skill, level) VALUES ('".$username."','".$skill."','".$level."')";
        $query = mysqli_query($this->con,$sql);
        if($query) {
            echo "Successfully Inserted";
        }
        else {
            echo "Unsuccessful";
        }
    }

    public function insertDetails6($username, $jobTitle, $price, $category, $sub, $url, $description) {
        $this->connect();   
        $sql = "INSERT INTO freelancejobs (username, jobTitle, price, category, subCategory, url, description) VALUES ('".$username."','".$jobTitle."','".$price."','".$category."','".$sub."','".$url."','".$description."')";
        $query = mysqli_query($this->con,$sql);
        if($query) {
            echo "Successfully Inserted";
        }
        else {
            echo "Unsuccessful";
        }
    }

    public function insertDetails7($username, $title, $description, $porturl) {
        $this->connect();   
        $sql = "INSERT INTO freelanceportfolio (username, title, description, porturl ) VALUES ('".$username."','".$title."','".$description."','".$porturl."')";
        $query = mysqli_query($this->con,$sql);
        if($query) {
            echo "Successfully Inserted";
        }
        else {
            echo "Unsuccessful";
        }
    }

    public function insertDetails8($username, $category, $sub, $jobTitle, $budget, $description, $sample) {
        $this->connect();   
        $sql = "INSERT INTO freelanceemployers (username, category, subCategory, jobTitle, budget, description, sample ) VALUES ('".$username."','".$category."','".$sub."','".$jobTitle."','".$budget."','".$description."','".$sample."')";
        $query = mysqli_query($this->con,$sql);
        if($query) {
            echo "Successfully Inserted";
        }
        else {
            echo "Unsuccessful";
        }
    }

    public function insertDetails9($username, $jobTitle, $price, $category, $sub, $url, $description) {
        $this->connect();   
        $sql = "INSERT INTO outsourcejobs (username, jobTitle, price, category, subCategory, url, description) VALUES ('".$username."','".$jobTitle."','".$price."','".$category."','".$sub."','".$url."','".$description."')";
        $query = mysqli_query($this->con,$sql);
        if($query) {
            echo "Successfully Inserted";
        }
        else {
            echo "Unsuccessful";
        }
    }

    public function insertDetails10($username, $title, $description, $porturl) {
        $this->connect();   
        $sql = "INSERT INTO outsourceportfolio (username, title, description, porturl ) VALUES ('".$username."','".$title."','".$description."','".$porturl."')";
        $query = mysqli_query($this->con,$sql);
        if($query) {
            echo "Successfully Inserted";
        }
        else {
            echo "Unsuccessful";
        }
    }

    public function insertDetails11($username, $category, $sub, $jobTitle, $budget, $description, $sample) {
        $this->connect();   
        $sql = "INSERT INTO outsourceemployers (username, category, subCategory, jobTitle, budget, description, sample ) VALUES ('".$username."','".$category."','".$sub."','".$jobTitle."','".$budget."','".$description."','".$sample."')";
        $query = mysqli_query($this->con,$sql);
        if($query) {
            echo "Successfully Inserted";
        }
        else {
            echo "Unsuccessful";
        }
    }

    public function searchDb($data, $column, $table) {
        $this->connect();
        $query = mysqli_query($this->con,"SELECT * FROM $table WHERE $column ='$data'");
        if (mysqli_num_rows($query)>0) {
            if($table == "users") {
                $values = array();
                $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
                foreach ($results as $result) {
                    $values["id"] = $result['id'];
                    $values["email"] = $result['email'];
                    $values["firstName"] = $result['firstName'];
                    $values["lastName"] = $result['lastName'];
                    $values["address"] = $result['address'];
                    $values["password"] = $result['password'];
                    $values["phone"] = $result['phone'];
                    $values["jobTitle"] = $result['jobTitle'];
                    $values["picture"] = $result['picture'];
                    $values["about"] = $result['about'];
                    $values["city"] = $result['city'];
                    $values["gender"] = $result['gender'];
                    $values["company"] = $result['company'];
                    $values["rep"] = $result['rep'];
                    $values["website"] = $result['website'];
                    $values["staff"] = $result['staff'];
                    $values["country"] = $result['country'];
                    
                }
                return $values;
            }
            if($table == "jobs") {
                $values = array();
                $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
                foreach ($results as $result) {
                    $values["id"] = $result['id'];
                    $values["jobTitle"] = $result['jobTitle'];
                    $values["salary"] = $result['salary'];
                    $values["category"] = $result['category'];
                    $values["subCategory"] = $result['subCategory'];
                    $values["jobType"] = $result['jobType'];
                }
                return $values;
            }
            if($table == "recruitmentemployers") {
                $values = array();
                $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
                foreach ($results as $result) {
                    $values["id"] = $result['id'];
                    $values["username"] = $result['username'];
                    $values["category"] = $result['category'];
                    $values["subCategory"] = $result['subCategory'];
                    $values["jobTitle"] = $result['jobTitle'];
                    $values["salary"] = $result['salary'];
                    $values["jobType"] = $result['jobType'];
                    $values["qualifications"] = $result['qualifications'];
                    $values["responsibilities"] = $result['responsibilities'];
                    $values["gender"] = $result['gender'];
                    $values["created"] = $result['created'];
                    $values["closing"] = $result['closing'];
                    $values["status"] = $result['status'];
                }
                return $values;
            }
            if($table == "freelanceemployers" || $table == "outsourceemployers") {
                $values = array();
                $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
                foreach ($results as $result) {
                    $values["id"] = $result['id'];
                    $values["username"] = $result['username'];
                    $values["category"] = $result['category'];
                    $values["subCategory"] = $result['subCategory'];
                    $values["jobTitle"] = $result['jobTitle'];
                    $values["budget"] = $result['budget'];
                    $values["description"] = $result['description'];
                    $values["created"] = $result['created'];
                    $values["sample"] = $result['sample'];
                }
                return $values;
            }
        }
        else {
            return false;
        }
    }

    public function userLogin($username, $password) {
        $this->connect();
        $query = mysqli_query($this->con, "SELECT * from admin WHERE username='$username' and password='$password'");
        if(mysqli_num_rows($query)>0){
            $values = array();
            $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
            foreach ($results as $result) {
                $values["id"] = $result['id'];
            }
            return $values;
        }
        else {
            return false;
        }
    }

    public function updateDb($selector, $column, $value1, $column1, $value2, $column2, $value3, $column3, $value4, $column4, $value5, $column5, $value6, $column6, $value7, $column7, $table) {
        $this->connect();
        $query = mysqli_query($this->con, "UPDATE $table SET $column1 = '$value1', $column2 = '$value2', $column3 = '$value3', $column4 = '$value4', $column5 = '$value5', $column6 = '$value6', $column7 = '$value7' WHERE $column = '$selector'");
        $query2 = mysqli_query($this->con, "UPDATE users SET status = 'done' WHERE $column = '$selector'");
        if($query) {
            echo "Succesful";
            return true;
        }
        else {
            echo mysqli_error($this->connect());
            return false;
        }
    }

    public function updateDb2($selector, $column, $value, $column1, $table) {
        $this->connect();
        $query = mysqli_query($this->con, "UPDATE $table SET $column1 = '$value' WHERE $column = '$selector'");
        if($query) {
            echo "Succesful";
            return true;
        }
        else {
            echo "Unsuccessful";
            return false;
        }
    }
}






?>