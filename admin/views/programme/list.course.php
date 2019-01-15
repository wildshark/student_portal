<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/12/2018
 * Time: 4:22 PM
 */

if(!isset($_GET['d'])){
    $button = "add-courses";
    $programmeID = "";
    $programme = "";
    $course ="";
    $course_code ="";
    $credit ="";
    $level ="";
    $semesterID ="";
    $semester = "";
}else{

    $id = $_GET['d'];
    $_SESSION['id']=$id;
    $sql = "SELECT * FROM `school_data`.`get_course` where courseID='$id'";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows >0){
        $r = $result->fetch_assoc();

        $programmeID = $r['progID'];
        $programme = $r['programme'];
        $course = $r['course'];
        $course_code = $r['course_code'];
        $credit = $r['credit'];
        $level = $r['course_level'];
        $semester = $r['semesterID'];
        $semester = $r['semester'];
    }

    $button ="edit-courses";

}

?>
<div class="col-md-6 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Course</h4>
                    <form method="post" action="index.php" class="forms-sample" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Programme</label>
                            <select name="programme" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value="<?php echo $programmeID;?>"><?php echo $programme;?></option>
                                <?php cmb_programme_data($conn);?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Course</label>
                            <input name="course" value="<?php echo $course?>" type="text" name="faculty" class="form-control" id="exampleInputName1" placeholder="Course Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Course Code</label>
                            <input name="code" value="<?php echo $course_code;?>" type="text" class="form-control" id="exampleInputName1" placeholder="Course Code">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Credit</label>
                            <input name="credit" value="<?php echo $credit;?>" type="text" class="form-control" id="exampleInputName1" placeholder="Credit Unit">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Level</label>
                            <select name="level" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value="<?php echo $level;?>"><?php echo $level;?></option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Semester</label>
                            <select name="semester" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value="<?php echo $programmeID;?>"><?php echo $programme;?></option>
                                <option value="1">1st Semester</option>
                                <option value="2">2nd Semester</option>
                            </select>
                        </div>
                        <button type="submit" name="submit" value="<?php echo $button;?>" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Paragraph</h4>
            <p class="card-description">
                Write text in
                <code>&lt;p&gt;</code> tag
            </p>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s, when an unknown printer took a galley not only five centuries,
            </p>
        </div>
    </div>
</div>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Member of the room</h4>
            <p class="card-description">
                Basic form elements
            </p>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-a" role="tab" aria-controls="nav-home" aria-selected="true">Level 100</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-b" role="tab" aria-controls="nav-profile" aria-selected="false">Level 200</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-c" role="tab" aria-controls="nav-contact" aria-selected="false">Level 300</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-d" role="tab" aria-controls="nav-contact" aria-selected="false">Level 400</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-a" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Course</th>
                                <th>School</th>
                                <th>Credit</th>
                                <th>Level</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php list_course_100($conn,$id);?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-b" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Course</th>
                                <th>School</th>
                                <th>Credit</th>
                                <th>Level</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php list_course_200($conn,$id);?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-c" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Course</th>
                                <th>School</th>
                                <th>Credit</th>
                                <th>Level</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php list_course_300($conn,$id);?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-d" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Course</th>
                                <th>School</th>
                                <th>Credit</th>
                                <th>Level</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php list_course_400($conn,$id);?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
