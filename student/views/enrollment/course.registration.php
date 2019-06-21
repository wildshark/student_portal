<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 18/12/2018
 * Time: 8:54 PM
 */

if (!isset($_GET['d'])){
    header("location: index.php?_route=student&p=enrollment.form&e=108");
    exit();
}elseif (!isset($_GET['l'])){
    header("location: index.php?_route=student&p=enrollment.form&e=109");
    exit();
}elseif(!isset($_GET['s'])){
    header("location: index.php?_route=student&p=enrollment.form&e=110");
    exit();
}else{

    $programmeID = $_GET['d'];
    $studentID =  $_SESSION['student_index_id'];
    $level = $_GET['l'];
    $semester = $_GET['s'];
    $school = $_GET['sch'];
    $admission = $_GET['adm'];
    $yearID = $_GET['y'];

    $url = "&pg={$programmeID}&st={$studentID}&l={$level}&s={$semester}&sch={$school}&adm={$admission}&y={$yearID}";
    $print_url = "index.php?_route=student&p=print.registration". $url;


    function programme_list($conn){

        $programmeID = $_GET['d'];
        $studentID =  $_SESSION['student_index_id'];
        $level = $_GET['l'];
        $semester = $_GET['s'];
        $school = $_GET['sch'];
        $admission = $_GET['adm'];
        $yearID = $_GET['y'];

        $url = "pg={$programmeID}&st={$studentID}&l={$level}&s={$semester}&sch={$school}&adm={$admission}&y={$yearID}";
        //$sql = "SELECT * FROM get_course_table where progID='$programmeID' and course_level='$level' and semesterID='$semester'";
        $sql = "SELECT * FROM get_course_table where progID='$programmeID' and course_level='$level'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows === 0) {
            echo "<h4><b>Courses are not available. </b>Contact your administrator for more details.</h4>";
        }else{

            while ($r = $result->fetch_assoc()) {
                if ($r['semesterID'] == 1){
                    $s = "1st Semester";
                }else{
                    $s = "2nd Semester";
                }
                echo"
                    <tr>
                        <td>{$r['course_code']}</td>
                        <td>{$r['course']}</td>
                        <td>{$r['course_level']}</td>
                        <td>{$s}</td>
                        <td>{$r['theory']}</td>
                        <td>{$r['practicals']}</td>
                        <td>{$r['credit']}</td>
                        <td><a href='index.php?submit=reg.course&c={$r['courseID']}&{$url}'>Take</a></td>
                    </tr>";
            }
        }
    }

    function sot_programme_list($conn){

        $programmeID = $_GET['d'];
        $studentID =  $_SESSION['student_index_id'];
        $level = $_GET['l'];
        $semester = $_GET['s'];
        $school = $_GET['sch'];
        $admission = $_GET['adm'];
        $yearID = $_GET['y'];

        $url = "pg={$programmeID}&st={$studentID}&l={$level}&s={$semester}&sch={$school}&adm={$admission}&y={$yearID}";
        //$sql = "SELECT * FROM get_course_table where progID='$programmeID' and course_level='$level' and semesterID='$semester'";
        $sql = "SELECT * FROM get_course where ='$programmeID' and course_level='$level'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows === 0) {
            echo "<h4><b>Courses are not available. </b>Contact your administrator for more details.</h4>";
        }else{

            while ($r = $result->fetch_assoc()) {
                if ($r['semesterID'] == 1){
                    $s = "1st Semester";
                }else{
                    $s = "2nd Semester";
                }
                echo"
                    <tr>
                        <td>{$r['course_code']}</td>
                        <td>{$r['course']}</td>
                        <td>{$r['course_level']}</td>
                        <td>{$s}</td>
                        <td>{$r['theory']}</td>
                        <td>{$r['practicals']}</td>
                        <td>{$r['credit']}</td>
                        <td><a href='index.php?submit=reg.course&c={$r['courseID']}&{$url}'>Take</a></td>
                    </tr>";
            }
        }
    }
}

?>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Course Registration List</h4>
            <p class="card-description">
                Basic form elements
            </p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Course Tile</th>
                        <th>Level</th>
                        <th>Semester</th>
                        <th>T</th>
                        <th>P</th>
                        <th>C</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php programme_list($admin_conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Courses Taken</h4>
            <p class="card-description">
               Total Course Registrated
                <?php
                    $studentID = $_SESSION['student_index_id'];
                    echo total_course_registration($admin_conn,$studentID);
                ?>
            </p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Course Title</th>
                        <th>Credit</th>
                        <th>Student</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php get_course_registered($admin_conn);?>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <a href="<?php echo $print_url;?>" class="btn btn-success mr-2 pull-left">Print</a>
            </div>
        </div>
    </div>
</div>