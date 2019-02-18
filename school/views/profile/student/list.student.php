<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/12/2018
 * Time: 9:15 AM
 */
?>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List of Student & Profile</h4>
            <div class="col-md-4">
                <form method="get" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="application/x-www-form-urlencoded">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="colored-addon3">
                            <input type="hidden" name="_route" value="<?php echo $_GET['_route'];?>">
                            <input type="hidden" name="p" value="<?php echo $_GET['p'];?>">
                            <div class="input-group-append bg-primary border-primary">
                                    <span class="input-group-btn bg-transparent">
                                        <button type="submit" name="_search" value="student-profile" class="btn btn-icons btn-primary">
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
                        <th>Index</th>
                        <th>Name</th>
                        <th>School</th>
                        <th>Programme</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(!isset($_GET['q'])){
                            student_list($conn);
                        }elseif (empty($_GET['q'])){
                            student_list($conn);
                        }else{
                            $profile=$_GET['q'];
                            search_student_Profile($conn,$profile);
                        }
                        ;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
