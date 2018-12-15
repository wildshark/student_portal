<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/12/2018
 * Time: 5:45 AM
 */
//echo $_SESSION['studentID'];
?>
<div class="col-md-6 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Semester Enrollment</h4>
                    <form action="index.php" method="post" class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">Date</label>
                            <input type="date" name="date" class="form-control" id="exampleInputName1" placeholder="yyyy-mm-dd">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Student</label>
                            <input type="text" name="student" readonly value="<?php echo student_index();?>" class="form-control" id="exampleInputName1" placeholder="pins">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Academy Year</label>
                            <select class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value=""></option>
                                <?php cmb_academic_session($conn);?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Semester</label>
                            <select class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value=""></option>
                                <option value="1">1st Semester</option>
                                <option value="2">2nd Semester</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Programme</label>
                            <select class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value=""></option>
                                <?php cmb_programme_data($conn);?>
                            </select>
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
                        <th>Student</th>
                        <th>Academy Year</th>
                        <th>Semester</th>
                        <th>Program</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


