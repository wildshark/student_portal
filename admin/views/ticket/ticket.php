<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 21/01/2019
 * Time: 1:56 PM
 */

if(isset($_GET['d'])){

}else{

}

?>
<div class="col-md-9 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ticket # <?php echo $ticket = date('ymdHis');?></h4>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">Subject</label>
                            <input type="text" name="subject" class="form-control" id="exampleInputName1" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Comment</label>
                            <textarea name="comment" class="form-control" id="exampleTextarea1" rows="7"></textarea>
                        </div>
                        <button type="submit" name="submit" value="add-comment" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Booked Details</h4>
            <p class="card-description">
                Basic form elements
            </p>

        </div>
    </div>
</div>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Active Pins</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Bed</th>
                        <th>Student</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Jacob</td>
                        <td>53275531</td>
                        <td>12 May 2017</td>
                        <td>
                            <label class="badge badge-danger">Pending</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Messsy</td>
                        <td>53275532</td>
                        <td>15 May 2017</td>
                        <td>
                            <label class="badge badge-warning">In progress</label>
                        </td>
                    </tr>
                    <tr>
                        <td>John</td>
                        <td>53275533</td>
                        <td>14 May 2017</td>
                        <td>
                            <label class="badge badge-info">Fixed</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Peter</td>
                        <td>53275534</td>
                        <td>16 May 2017</td>
                        <td>
                            <label class="badge badge-success">Completed</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Dave</td>
                        <td>53275535</td>
                        <td>20 May 2017</td>
                        <td>
                            <label class="badge badge-warning">In progress</label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>