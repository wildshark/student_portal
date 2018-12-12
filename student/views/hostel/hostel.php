<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04/11/2018
 * Time: 7:28 PM
 */


?>
<div class="col-md-6 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hostel Booking</h4>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">Booking Date</label>
                            <input type="date" class="form-control" id="exampleInputName1" placeholder="dd/mm/yyyy">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Hostel Voucher Pin</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="PIN NUMBER">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Hall</label>
                            <select class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value=""></option>
                                <?php cmb_room_list($conn);?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
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