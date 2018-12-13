<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/12/2018
 * Time: 6:58 PM
 */
?>
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
                    <h4 class="card-title">Hostel Booking</h4>
                    <form action="index.php" method="post" class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">Student</label>
                            <input type="text" name="student" value="<?php echo random_string(5);?>" class="form-control" id="exampleInputName1" placeholder="pins">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Programme</label>
                            <input type="text" name="programme" class="form-control" id="exampleInputName1" placeholder="index">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">RefNo</label>
                            <input type="text" name="ref" class="form-control" id="exampleInputName1" placeholder="ref no">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Amount</label>
                            <input type="text" name="amount" class="form-control" id="exampleInputName1" placeholder="0.00">
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
            <h4 class="card-title">Booked Details</h4>
            <p class="card-description">
                Basic form elements
            </p>
            <form class="forms-sample">
                <div class="form-group">
                    <label for="exampleInputName1">Total Fees</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="0.000">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Total Payment</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="0.000">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Balance Due</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="0.000">
                </div>
            </form>
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

