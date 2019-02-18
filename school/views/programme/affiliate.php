<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 16/12/2018
 * Time: 2:19 AM
 */
if (!isset($_GET['d'])){
    $button = "school-affiliated";
    $affiliate ="";
    $prefix ="";
    $note ="";
}else{
    $id = $_GET['d'];
    $_SESSION['id'] = $id;
    $sql ="SELECT * FROM `school_data`.`get_affliate_school` where affliateID='$id'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        $r=$result->fetch_assoc();

        $affiliate = $r['affliate'];
        $prefix = $r['affliate_prefix'];
        $note = $r['note'];
    }

    $button ="edit-school-affiliated";

}
?>
<div class="col-md-6 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">School Affiliated</h4>
                    <form method="post" action="index.php" class="forms-sample" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName1">Institute Name</label>
                            <input type="text" name="affiliate" value="<?php echo $affiliate;?>" class="form-control" id="exampleInputName1" placeholder="Institute">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Prefix</label>
                            <input type="text" name="prefix" value="<?php echo $prefix;?>" class="form-control" id="exampleInputName1" placeholder="Prefix">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Short Note</label>
                            <textarea name="note" value="<?php echo $note;?>" class="form-control" id="exampleTextarea1" rows="2"></textarea>
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
            <h4 class="card-title">List of Affiliate(s)</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Institute</th>
                        <th>Prefix</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php affiliate($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
