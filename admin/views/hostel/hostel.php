<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 17/12/2018
 * Time: 9:40 AM
 */

if(!isset($_GET['d'])){
    $button = "add-hostel";
    $block = get_random_block_name($conn);
    $pin = "";
    $student ="";
    $ref ="";
    $year = "";
    $generate = "A".date('yhmids');
    $input_type ="<input name='pin' value={$generate} type='text' name='faculty' class='form-control' id='exampleInputName1' placeholder='Pin'>";
    $input_block ="<input name='block' readonly value='{$block}' type='text' class='form-control' id='exampleInputName1' placeholder='Block'>";
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
        $block = $r['block'];

    }

    $input_type ="<input name='pin' readonly value=".$pin." type='text' name='faculty' class='form-control' id='exampleInputName1' placeholder='Pin'>";
    $input_block ="<input name='block' readonly value=".$block." type='text' class='form-control' id='exampleInputName1' placeholder='Ref. Number'>";
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
                        <input type="hidden" name="block-id" value="<?php echo $_SESSION['blockID'];?>"/>
                        <div class="form-group">
                            <label for="exampleInputName1">Generate PINs</label>
                            <?php echo $input_type;?>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Block Name</label>
                            <?php echo $input_block;?>
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
                                <?php cmb_student_index($conn);?>
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
            <h4 class="card-title">Hostel Booking List</h4>
            <div class="col-md-4">
                <form method="get" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="application/x-www-form-urlencoded">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="colored-addon3">
                            <input type="hidden" name="_route" value="<?php echo $_GET['_route'];?>">
                            <input type="hidden" name="p" value="<?php echo $_GET['p'];?>">
                            <div class="input-group-append bg-primary border-primary">
                                    <span class="input-group-btn bg-transparent">
                                        <button type="submit" name="_search" value="hostel" class="btn btn-icons btn-primary">
                                            <i class="mdi mdi-account-search"></i>
                                        </button>
                                    </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
                    <?php
                        if(!isset($_GET['q'])){
                            hostel($conn);
                        }else{
                            $hostel = $_GET['q'];
                            search_hostel($conn,$hostel);
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
