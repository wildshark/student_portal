<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 17/12/2018
 * Time: 1:36 AM
 */

if(!isset($_GET['d'])){
    $button = "add-programme";
    $programme = "";
    $programme_code ="";
    $duration ="";
    $school ="";
    $schoolID="";
}else{

    $id = $_GET['d'];
    $_SESSION['id']=$id;
    $sql = "SELECT * FROM `school_data`.`get_programme` where progID='$id'";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows >0){
        $r = $result->fetch_assoc();

        $programme = $r['programme'];
        $programme_code = $r['prog_prefix'];
        $duration = $r['prog_year'];
        $schoolID = $r['schoolID'];
        $school = $r['prefix'];
    }
    $button ="edit-courses";
}

?>
<div class="col-md-6 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Programme</h4>
                    <form method="post" action="index.php" class="forms-sample" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName1">Programme</label>
                            <input name="programme" value="<?php echo $programme?>" type="text" name="faculty" class="form-control" id="exampleInputName1" placeholder="Programme Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Programme Prefix</label>
                            <input name="prefix" value="<?php echo $programme_code;?>" type="text" class="form-control" id="exampleInputName1" placeholder="Prefix">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Duration</label>
                            <input name="duration" value="<?php echo $duration;?>" type="text" class="form-control" id="exampleInputName1" placeholder="Duration">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">School</label>
                            <select name="school" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value="<?php echo $schoolID;?>"><?php echo $school;?></option>
                                <?php cmb_school_data($conn);?>
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
            <h4 class="card-title">List of Programmes</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Programme</th>
                        <th>Prefix</th>
                        <th>Duration</th>
                        <th>School</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php programme($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
