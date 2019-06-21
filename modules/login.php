<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 22/05/2019
 * Time: 8:05 AM
 */

class USER_LOGIN
{

    function login($conn,$data){

        $username = $data['username'];
        $password = $data['password'];

        $token = md5($username . "/" . $password);

        $username = strtoupper($username);

        $sql = "SELECT * FROM `get_active_pin` where `token`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$token);

        $stmt->execute();

        $result = $stmt->get_result();
        if($result->num_rows === 0){
            return 101;
        }else {
            $row = $result->fetch_assoc();

            if(($username === $row['username']) && ($password === $row['password']) && ($token === $row['token'])){

                $sql = "SELECT * FROM `get_student_index` WHERE `stud_index`=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s",$username);
                $stmt->execute();

                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    return array(
                        "studentID"=>$row['stud_indexID'],
                        "index"=>$row['stud_index'],
                        "name"=>$row['name'],
                        "surname"=>$row['surname'],
                        "programmeID"=>$row['progID'],
                        "programme"=>$row['programme'],
                        "streamID"=>$row['streamID'],
                        "categoryID"=>$row['categoryID'],
                        "token"=>$token
                        ) ;
                }
            }
        }

    }

    function registration($conn,$data){

        $index = $data['username'];
        $username = $data['username'];
        $password = $data['password'];
        $mobile = $data['mobile'];
        $email = $data['email'];
        $voucher = $data['voucher'];

        $sql = "SELECT * FROM `get_pins` where pin =? and username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $voucher,$username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0){
            return 101;
        }else {
            $row = $result->fetch_assoc();
            $id = $row['pin_id'];
            $token = md5($index . "/" . $password);
            $date = date("Y-m-d H:i:s");
            $status = 2;

            $sql ="UPDATE `pins` SET `password`=?, `mobile`=?, `email`=?, `active_date`=?, `token`=?, status=?  WHERE (`pin_id`=?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $password,$mobile,$email,$date,$token,$status,$id);
            if(TRUE == $stmt->execute()){
                return 200;
            }else{
                return array("index"=>$index,"username"=>$username,"password"=>$password,"mobile"=>$mobile,"email"=>$email,"token"=>$token);
            }
        }
    }

    function token($conn,$data){

        $token = $data['token'];

        $sql ="INSERT INTO `student_profile` (`token`) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $token);
        if(TRUE == $stmt->execute()){
            return 200;
        }else{
            return 101;
        }

    }

    function check_profile($conn,$data){

        $index = $data['index'];

        $sql="SELECT * FROM `get_student_profile_detail` where `admissionNo`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $index);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0){
            return 101;
        }else {
            $row = $result->fetch_assoc();
            return array("name"=>$row['first_name'],"surname"=>$row['surname'],"admission"=>$row['admissionNo']);
        }
    }

}
