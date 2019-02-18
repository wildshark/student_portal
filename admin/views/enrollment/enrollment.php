<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/12/2018
 * Time: 5:25 AM
 */

if (!isset($_GET['d'])){
    $button = "add-enrollment";
    $generate = random_string(7);
    $input_type ="<input type='text' name='pin' value='{$generate}' class='form-control' id='exampleInputName1' placeholder='Institute'>";
    $pin ="";
    $student ="";
    $studentID ="";
    $semesterID = "";
    $levelID ="";
}else{

    $id = $_GET['d'];
    $_SESSION['id'] = $id;
    $sql ="SELECT * FROM get_enrollment where enrollID='$id'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        $r=$result->fetch_assoc();

        $pin = $r['pins'];
        $student = $r['admissionNo']." - ". $r['first_name'] ." ". $r['surname'];
        $studentID = $r['studentID'];
        $semesterID = $r['semesterID'];
        $levelID = $r['s_level'];
    }
    $input_type ="<input type='text' name='pin' readonly value='{$pin}' class='form-control' id='exampleInputName1' placeholder='Institute'>";
    $button ="edit-enrollment";
}
?>
<div class="col-md-6 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Enrollment & Course Registration</h4>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="forms-sample" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName1">PIN Number</label>
                            <?php echo $input_type;?>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Semester</label>
                            <select name="semester" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value="<?php echo $semesterID;?>"><?php echo semester($semesterID);?></option>
                                <option value="1">1st Semester</option>
                                <option value="2">2nd Semester</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Level</label>
                            <select name="level" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value="<?php echo $levelID;?>"><?php echo $levelID;?></option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Student Index</label>
                            <select name="student" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value="<?php echo $studentID;?>"><?php echo $student;?></option>
                                <?php cmb_student_index($conn);?>
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
            <h4 class="card-title">Help</h4>
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
            <h4 class="card-title">Student Enrollment & Course Registration List</h4>
            <div class="col-md-4">
                <form method="get" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="application/x-www-form-urlencoded">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="colored-addon3">
                            <input type="hidden" name="_route" value="<?php echo $_GET['_route'];?>">
                            <input type="hidden" name="p" value="<?php echo $_GET['p'];?>">
                            <div class="input-group-append bg-primary border-primary">
                                    <span class="input-group-btn bg-transparent">
                                        <button type="submit" name="_search" value="enrollment" class="btn btn-icons btn-primary">
                                            <i class="mdi mdi-account-search"></i>
                                        </button>
                                    </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table" id="example">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Pin</th>
                        <th>Index</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php enrollment_list($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
