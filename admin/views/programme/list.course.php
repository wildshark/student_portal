<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/12/2018
 * Time: 4:22 PM
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
                        <th>Code</th>
                        <th>Course</th>
                        <th>School</th>
                        <th>Affiliate</th>
                        <th>Credit</th>
                        <th>Level</th>
                        <th>Semester</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php course($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
