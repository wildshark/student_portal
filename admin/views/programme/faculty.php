<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 16/12/2018
 * Time: 2:20 AM
 */

if(!isset($_GET['d'])){
    $button = "add-faculty";
    $faculty = "";
    $prefix ="";
    $affiliateID ="";
    $affiliate ="";
}else{


    $id = $_GET['d'];
    $_SESSION['id']=$id;
    $sql = "SELECT * FROM `school_data`.`get_school` where schoolID='$id'";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows >0){
        $r = $result->fetch_assoc();

        $faculty = $r['school'];
        $prefix = $r['prefix'];
        $affiliateID = $r['affliateID'];
        $affiliate = $r['affliate'];

    }

    $button ="edit-faculty";

}

?>
<div class="col-md-6 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Faculty/School</h4>
                    <form method="post" action="index.php" class="forms-sample" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName1">Faculty Name</label>
                            <input name="faculty" value="<?php echo $faculty?>" type="text" name="faculty" class="form-control" id="exampleInputName1" placeholder="Faculty">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Prefix</label>
                            <input name="prefix" value="<?php echo $prefix;?>" type="text" class="form-control" id="exampleInputName1" placeholder="Prefix">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Institute Affiliated</label>
                            <select name="affiliate" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value="<?php echo $affiliateID;?>"><?php echo $affiliate;?></option>
                                <?php cmb_affliate($conn);?>
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
            <h4 class="card-title">List of School/Faculty</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>School</th>
                        <th>Prefix</th>
                        <th>Affiliate</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php faculty($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
