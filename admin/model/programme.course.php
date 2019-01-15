<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/01/2019
 * Time: 11:43 AM
 */

if (!isset($_GET['d'])){
   $id= '0';
}else{

   $id= $_GET['d'];

    function list_course_100($conn,$id){

        $sql ="SELECT * FROM `get_course` where course_level = '100' AND progID = '$id'";
        $result = mysqli_query($conn,$sql);
        if($result->num_rows > 0){
            while ($r= $result->fetch_assoc()){
                $ids = $r['courseID'];
                echo"
                <tr>
                    <td><a href='index.php?_route=admin&p=pg.list.course&d={$ids}'>{$r['course_code']}</a></td>
                    <td>{$r['course']}</td>
                    <td>{$r['prefix']}</td>                
                    <td>{$r['credit']}</td>
                    <td>{$r['course_level']}</td>
                </tr>
            ";
            }
        }
    }

    function list_course_200($conn,$id){

        $sql ="SELECT * FROM `get_course` where course_level = '200' AND progID = '$id'";
        $result = mysqli_query($conn,$sql);
        if($result->num_rows > 0){
            while ($r= $result->fetch_assoc()){
                $ids = $r['courseID'];
                echo"
                <tr>
                    <td><a href='index.php?_route=admin&p=pg.list.course&d={$ids}'>{$r['course_code']}</a></td>
                    <td>{$r['course']}</td>
                    <td>{$r['prefix']}</td>                
                    <td>{$r['credit']}</td>
                    <td>{$r['course_level']}</td>
                </tr>
            ";
            }
        }
    }

    function list_course_300($conn,$id){

        $sql ="SELECT * FROM `get_course` where course_level = '300' AND progID = '$id'";
        $result = mysqli_query($conn,$sql);
        if($result->num_rows > 0){
            while ($r= $result->fetch_assoc()){
                $ids = $r['courseID'];
                echo"
                <tr>
                    <td><a href='index.php?_route=admin&p=pg.list.course&d={$ids}'>{$r['course_code']}</a></td>
                    <td>{$r['course']}</td>
                    <td>{$r['prefix']}</td>                
                    <td>{$r['credit']}</td>
                    <td>{$r['course_level']}</td>
                </tr>
            ";
            }
        }
    }

    function list_course_400($conn,$id){

        $sql ="SELECT * FROM `get_course` where course_level = '400' AND progID = '$id'";
        $result = mysqli_query($conn,$sql);
        if($result->num_rows > 0){
            while ($r= $result->fetch_assoc()){
                $ids = $r['courseID'];
                echo"
                <tr>
                    <td><a href='index.php?_route=admin&p=pg.list.course&d={$ids}'>{$r['course_code']}</a></td>
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
