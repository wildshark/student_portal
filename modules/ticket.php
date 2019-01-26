<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 21/01/2019
 * Time: 4:07 PM
 */

class TICKET{

    function add_ticket($conn){

        $date = date("Y-m-d H:i:s");
        $ticket = $_POST['ticket'];
        $user = $_SESSION['student_index_id']."-".$_SESSION['student_name'];
        $subject = $_POST['subject'];
        $comment = $_POST['comment'];
        $userID =  $_SESSION['user-id'];

        $sql ="INSERT INTO `ticket` (`ticket_no`, `user`, `subject`, `ticket_note`, `ticket_date`,`userID`) VALUES ('$ticket', '$user', '$subject', '$comment', '$date', '$userID')";

        $result = mysqli_query($conn,$sql);
        if ($result == TRUE){
            header("location: index.php?_route=student&p=ticket&e=104");
        }else{
            header("location: index.php?_route=student&p=ticket&e=103");
        }
    }

}