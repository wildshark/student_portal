<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/12/2018
 * Time: 5:45 AM
 */
//echo $_SESSION['studentID'];
?>
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Horizontal Two column</h4>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-sample" enctype="multipart/form-data">
                <p class="card-description">
                    Personal info
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="date" class="form-control" placeholder="dd/mm/yyyy" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Student</label>
                            <div class="col-sm-9">
                                <input type="text" name="student" readonly value="<?php echo student_index();?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Academy Year</label>
                            <div class="col-sm-8">
                                <select name="year" class="form-control">
                                    <option value=""></option>
                                    <?php cmb_academic_session($conn);?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Semester</label>
                            <div class="col-sm-9">
                                <select name="semester" class="form-control">
                                    <option value=""></option>
                                    <option value="1">1st Semester</option>
                                    <option value="2">2nd Semester</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Programme</label>
                            <div class="col-sm-9">
                                <select name="programme" class="form-control">
                                    <option value=""></option>
                                    <?php cmb_programme_data($conn);?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <select name="level" class="form-control">
                                    <option value=""></option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="300">300</option>
                                    <option value="400">400</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pin</label>
                            <div class="col-sm-9">
                                <input type="text" name="pin" class="form-control" placeholder="Pin Number" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" name="submit" value="add.enrollment" class="btn btn-success mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
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
                        <th>Year</th>
                        <th>Programme</th>
                        <th>Semester</th>
                        <th>Level</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php enrollment_details($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


