<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/01/2019
 * Time: 11:43 AM
 */

if (!isset($_GET['pg'])){
   $progID = '0';
}else{

    $progID = $_GET['pg'];

    function list_course_100($conn,$progID){

        $sql ="SELECT * FROM `get_course` where course_level = '100' AND progID = '$progID'";
        $result = mysqli_query($conn,$sql);
        if($result->num_rows > 0){
            while ($r= $result->fetch_assoc()){
                $couresID = $r['courseID'];
                echo"
                <tr>
                    <td><a href='index.php?_route=admin&p=pg.list.course&d={$couresID}'>{$r['course_code']}</a></td>
                    <td>{$r['course']}</td>
                    <td>{$r['prefix']}</td>                
                    <td>{$r['credit']}</td>
                    <td>{$r['course_level']}</td>
                </tr>
            ";
            }
        }
    }

    function list_course_200($conn,$progID){

        $sql ="SELECT * FROM `get_course` where course_level = '200' AND progID = '$progID'";
        $result = mysqli_query($conn,$sql);
        if($result->num_rows > 0){
            while ($r= $result->fetch_assoc()){
                $couresID = $r['courseID'];
                echo"
                <tr>
                    <td><a href='index.php?_route=admin&p=pg.list.course&d={$couresID}'>{$r['course_code']}</a></td>
                    <td>{$r['course']}</td>
                    <td>{$r['prefix']}</td>                
                    <td>{$r['credit']}</td>
                    <td>{$r['course_level']}</td>
                </tr>
            ";
            }
        }
    }

    function list_course_300($conn,$progID){

        $sql ="SELECT * FROM `get_course` where course_level = '300' AND progID = '$progID'";
        $result = mysqli_query($conn,$sql);
        if($result->num_rows > 0){
            while ($r= $result->fetch_assoc()){
                $couresID = $r['courseID'];
                echo"
                <tr>
                    <td><a href='index.php?_route=admin&p=pg.list.course&d={$couresID}'>{$r['course_code']}</a></td>
                    <td>{$r['course']}</td>
                    <td>{$r['prefix']}</td>                
                    <td>{$r['credit']}</td>
                    <td>{$r['course_level']}</td>
                </tr>
            ";
            }
        }
    }

    function list_course_400($conn,$progID){

        $sql ="SELECT * FROM `get_course` where course_level = '400' AND progID = '$progID'";
        $result = mysqli_query($conn,$sql);
        if($result->num_rows > 0){
            while ($r= $result->fetch_assoc()){
                $couresID = $r['courseID'];
                echo"
                <tr>
                    <td><a href='index.php?_route=admin&p=pg.list.course&d={$couresID}'>{$r['course_code']}</a></td>
                    <td>{$r['course']}</td>
                    <td>{$r['prefix']}</td>                
                    <td>{$r['credit']}</td>
                    <td>{$r['course_level']}</td>
                </tr>
            ";
            }
        }
    }


}
