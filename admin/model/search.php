<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 01/01/2019
 * Time: 10:24 AM
 */

function search_pin($conn){

    if(!isset($_REQUEST['q'])){
        header("location: index.php?_route=admin&p=pins.list&e=112");
    }else{

        $q = $_REQUEST['q'];
        $sql="SELECT * FROM `get_all_pins` where `pin`LIKE '%{$q}%' ORDER BY pin_id DESC LIMIT 0,20";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
            while ($r = mysqli_fetch_assoc($result)){
                if ($r['status'] == 1){
                    $status = "<label class='badge badge-info'>Active</label>";
                }elseif ($r['status'] == 2){
                    $status = "<label class='badge badge-success'>Used</label>";
                }else{
                    $status = "<label class='badge badge-danger'>Block</label>";
                }
                echo"
                <tr>
                    <td>{$r['pin_date']}</td>
                    <td>{$r['pin']}</td>
                    <td>{$r['username']}</td>
                    <td>{$r['mobile']}</td>                
                    <td>{$status}</td>                   
                </tr>
                ";
            }
        }else{

            $sql="SELECT * FROM `get_all_pins` where `username`LIKE '%{$q}%' ORDER BY pin_id DESC LIMIT 0,20";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
                while ($r = mysqli_fetch_assoc($result)) {
                    if ($r['status'] == 1) {
                        $status = "<label class='badge badge-info'>Active</label>";
                    } elseif ($r['status'] == 2) {
                        $status = "<label class='badge badge-success'>Used</label>";
                    } else {
                        $status = "<label class='badge badge-danger'>Block</label>";
                    }
                    echo "
                        <tr>
                            <td>{$r['pin_date']}</td>
                            <td>{$r['pin']}</td>
                            <td>{$r['username']}</td>
                            <td>{$r['mobile']}</td>                
                            <td>{$status}</td>                   
                        </tr>
                        ";
                }
            }else{
                echo"error 111";
            }
        }

    }
}

?>

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Active PIN List</h4>
            <div class="table-responsive">
                <div class="col-md-4">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="application/x-www-form-urlencoded">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="q" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="colored-addon3">
                                <div class="input-group-append bg-primary border-primary">
                                    <span class="input-group-btn bg-transparent">
                                        <button type="submit" name="submit" value="search-pin" class="btn btn-icons btn-primary">
                                            <i class="mdi mdi-account-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
                            search_pin($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>