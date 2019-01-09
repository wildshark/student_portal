<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/12/2018
 * Time: 4:25 PM
 */

?>

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Active PIN List</h4>
            <div class="col-md-4">
                <form method="get" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="application/x-www-form-urlencoded">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="colored-addon3">
                            <input type="hidden" name="_route" value="<?php echo $_GET['_route'];?>">
                            <input type="hidden" name="p" value="<?php echo $_GET['p'];?>">
                            <div class="input-group-append bg-primary border-primary">
                                    <span class="input-group-btn bg-transparent">
                                        <button type="submit" name="_search" value="pin" class="btn btn-icons btn-primary">
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
                        <th>PINs</th>
                        <th>Index No#</th>
                        <th>Mobile</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!isset($_GET['q'])){
                                pin_list($conn);
                            }elseif($_GET['q'] == ""){
                                pin_list($conn);
                            }elseif ($_GET['q'] == "all"){
                                pin_list($conn);
                            }else{
                                $search = $_GET['q'];
                                search_pin($conn,$search);
                            }
                        ;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>