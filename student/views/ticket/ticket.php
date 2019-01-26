<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 21/01/2019
 * Time: 4:09 PM
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
                        <input type="hidden" name="ticket" value="<?php echo $ticket;?>">
                        <div class="form-group">
                            <label for="exampleInputName1">Subject</label>
                            <input type="text" name="subject" class="form-control" id="exampleInputName1" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Comment</label>
                            <textarea name="comment" class="form-control" id="exampleText-area1" rows="7"></textarea>
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
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">Manage Tickets</h5>
            <div class="fluid-container">
                <?php manage_ticket($conn);?>
            </div>
        </div>
    </div>
</div>