<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 08/01/2019
 * Time: 11:22 AM
 */

if(!isset($_GET['d'])){
    $button = "add-block-hostel";
    $block = "";

}else{

    $id = $_GET['d'];
    $_SESSION['id']=$id;
    $sql = "SELECT * FROM `get_hostel_block` WHERE blockID = '$id' LIMIT 0, 1";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows >0){
        $r = $result->fetch_assoc();
        $block = $r['block_name'];
    }
    $button = "edit-block-hostel";
}

?>

<div class="col-md-6 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hostel</h4>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="forms-sample" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName1">Black Name</label>
                            <input name="block" value="<?php echo $block;?>" type="text" class="form-control" id="exampleInputName1" placeholder="Block Name">
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
            <h4 class="card-title">Hostel Booking List</h4>
            <div class="col-md-4">
                <form method="get" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="application/x-www-form-urlencoded">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="colored-addon3">
                            <input type="hidden" name="_route" value="<?php echo $_GET['_route'];?>">
                            <input type="hidden" name="p" value="<?php echo $_GET['p'];?>">
                            <div class="input-group-append bg-primary border-primary">
                                    <span class="input-group-btn bg-transparent">
                                        <button type="submit" name="_search" value="hostel" class="btn btn-icons btn-primary">
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
                        <th>Block</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(!isset($_GET['q'])){
                        hostel_block($conn);
                    }else{
                        $hostel = $_GET['q'];
                        //search_hostel($conn,$hostel);
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

