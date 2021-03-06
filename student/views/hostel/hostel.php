<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04/11/2018
 * Time: 7:28 PM
 */

$OldDate = date("Y") - 1;
$academy_yr = $OldDate."/".date("Y");

$studentID = $_SESSION['studentID'];

function get_room_list_for_student($conn,$studentID){


    $sql = "SELECT * FROM `get_hostel_booking_details` where studentID='$studentID' LIMIT 0, 1";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $r = $result->fetch_assoc();
        $block = $r['blockID'];
    }

    $sql = "SELECT * FROM `get_hostel_room` where  blockID ='$block' LIMIT 0, 100";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === "0") {
        echo "<option value='0'>No Room</option>";
    } else {
        while ($r = $result->fetch_assoc()) {
            echo "<option value='{$r['roomID']}'>{$r['room']}</option>";
        }
    }
}

?>
<div class="col-md-6 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hostel Booking</h4>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" class="forms-sample">

                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Academy Year</label>
                            <select name="year" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option class="active" value="<?php echo $academy_yr;?>"><?php echo $academy_yr;?></option>
                                <?php cmb_academic_session($admin_conn);?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Arrival Date</label>
                            <input type="date" name="date" class="form-control" id="exampleInputName1" placeholder="dd/mm/yyyy">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Hostel Voucher Pin</label>
                            <input type="text" name="pin" class="form-control" id="exampleInputName1" placeholder="PIN NUMBER">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Hall/room</label>
                            <select name="room" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value=""></option>
                                <?php get_room_list_for_student($admin_conn,$studentID);?>
                            </select>
                        </div>
                        <button type="submit" name="submit" value="add-booking" class="btn btn-success mr-2">Submit</button>
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
            <h4 class="card-title">Booked Details</h4>
            <p class="card-description">
                Basic form elements
            </p>
            <form class="forms-sample">
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Index Number</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Bed Number</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
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
                        <th>Block/Room</th>
                        <th>Arrival Date</th>
                        <th>Departure Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php hostel_details($admin_conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>