<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 10/01/2019
 * Time: 6:27 AM
 */

if (!isset($_GET['d'])){
    $button = "add-index-number";
    $name ="";
    $mobile ="";
    $year ="";
    $programmeID="";
    $programme ="";
    $streamID="";
}else{
    $id = $_GET['d'];
    $_SESSION['id'] = $id;
    $sql ="SELECT * FROM get_student_index where stud_indexID='$id'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        $r=$result->fetch_assoc();

        $name = $r['name'];
        $mobile = $r['mobile'];
        $programmeID= $r['progID'];
        $programme = $r['programme'];
        $streamID = $r['streamID'];
    }
    $button ="edit-index-number";
}

?>

<div class="col-md-6 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Student Index Generator</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" name="student-name" value="<?php echo $name;?>" class="form-control" id="exampleInputName1" placeholder="index">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Mobile</label>
                            <input type="text" name="mobile" value="<?php echo $mobile;?>"  class="form-control" id="exampleInputName1" placeholder="mobile">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Academy Year</label>
                            <select name="year" class="form-control">
                                <option value="<?php echo $year;?>"><?php echo $year;?></option>
                                <?php cmb_academic_session($conn);?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Programme</label>
                            <select name="programme" class="form-control">
                                <option value="<?php echo $programmeID;?>"><?php echo $programme;?></option>
                                <?php cmb_programme_data($conn);?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Stream</label>
                            <select name="stream" class="form-control">
                                <option class="active" value="<?php echo $streamID?>"><?php echo student_stream($streamID);?></option>
                                <option value="1">Regular</option>
                                <option value="2">Weekend</option>
                            </select>
                        </div>
                        <button type="submit" name="submit" value="<?php echo $button;?>" class="btn btn-success mr-2">Submit</button>
                        <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Help Box</h4>
            <p class="card-description">
                Contact ICT Department
            </p>
        </div>
    </div>
</div>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">PIN List</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Index</th>
                        <th>Mobile</th>
                        <th>Programme</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  student_index_data_list($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>