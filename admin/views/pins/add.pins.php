<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/12/2018
 * Time: 4:24 PM
 */
?>
<div class="col-md-6 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Student Portal PIN Generator</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">PINs Generated</label>
                            <input type="text" name="pin" value="<?php echo random_string(7);?>" class="form-control" id="exampleInputName1" placeholder="pins">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Index Number</label>
                            <input type="text" name="index" class="form-control" id="exampleInputName1" placeholder="index">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Mobile</label>
                            <input type="text" name="mobile" class="form-control" id="exampleInputName1" placeholder="mobile">
                        </div>
                        <button type="submit" name="submit" value="add.pins" class="btn btn-success mr-2">Submit</button>
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
                        <th>Date</th>
                        <th>PINs</th>
                        <th>Index No#</th>
                        <th>Mobile</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php pin_generated($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
