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
            <h4 class="card-title">Member of the room</h4>
            <p class="card-description">
                Basic form elements
            </p>
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
                    <?php student_list($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
