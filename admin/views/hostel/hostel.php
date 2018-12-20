<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 17/12/2018
 * Time: 9:40 AM
 */

if(!isset($_GET['d'])){
    $button = "add-hostel";
    $pin = "";
    $student ="";
    $ref ="";
    $year = "";
    $generate = rand(10,99)."".date('YHmids');
    $input_type ="<input name='pin' value={$generate} type='text' name='faculty' class='form-control' id='exampleInputName1' placeholder='Pin'>";

}else{

    $id = $_GET['d'];
    $_SESSION['id']=$id;
    $sql = "SELECT * FROM `school_data`.`get_hostel_booking` where userID='$id'";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows >0){
        $r = $result->fetch_assoc();

        $pin = $r['pin_index'];
        $studentID = $r['studentID'];
        $student = $r['admissionNo']." - ".$r['first_name']." ".$r['surname'];
        $ref = $r['ref_no'];
        $year = $r['yearID'];

    }

    $input_type ="<input name='pin' readonly value=".$pin." type='text' name='faculty' class='form-control' id='exampleInputName1' placeholder='Pin'>";
    $button ="edit-hostel";
}

?>
<div class="col-md-6 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hostel</h4>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="forms-sample" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName1">Generate PINs</label>
                            <?php echo $input_type;?>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Academy Year</label>
                            <select name="year" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value="<?php echo $year;?>"><?php echo $year;?></option>
                                <?php cmb_academic_session($conn);?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Student</label>
                            <select name="student" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value="<?php echo $studentID;?>"><?php echo $student;?></option>
                                <?php student_index_list($conn);?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Ref. Number</label>
                            <input name="ref" value="<?php echo $ref;?>" type="text" class="form-control" id="exampleInputName1" placeholder="Ref. Number">
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
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Pin(s)</th>
                        <th>Student</th>
                        <th>Arrival</th>
                        <th>Status</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php hostel($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
