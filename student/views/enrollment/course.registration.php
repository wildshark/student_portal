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
    function programme_list($conn){

        $programmeID = $_GET['d'];
        $studentID = $_GET['st'];
        $level = $_GET['l'];
        $semester = $_GET['s'];
        $school = $_GET['sch'];
        $admission = $_GET['adm'];
        $yearID = $_GET['y'];

        $url = "pg={$programmeID}&st={$studentID}&l={$level}&s={$semester}&sch={$school}&adm={$admission}&y={$yearID}";
        $sql = "SELECT * FROM `school_data`.`get_course_table` where progID='2' and course_level='$level' and semesterID='$semester'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            while ($r = $result->fetch_assoc()) {
                echo"
                <tr>
                    <td>{$r['course_code']}</td>
                    <td>{$r['course']}</td>
                    <td>{$r['course_level']}</td>
                    <td>{$r['semesterID']}</td>
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
                    </tr>
                    </thead>
                    <tbody>
                    <?php programme_list($conn);?>
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
                    $studentID = $_GET['st'];
                    echo total_course_registration($conn,$studentID);
                ?>
            </p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Course Title</th>
                        <th>Credit</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php get_course_registered($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>