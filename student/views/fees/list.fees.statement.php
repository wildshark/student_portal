<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04/11/2018
 * Time: 8:49 AM
 */

?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Bordered table</h4>
            <p class="card-description">
                Add class
                <code>.table-bordered</code>
            </p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            Date
                        </th>
                        <th>
                            Ref no#
                        </th>
                        <th>
                            Academy Year/Semester
                        </th>
                        <th>
                            Bill
                        </th>
                        <th>
                            Paid
                        </th>
                        <th>
                            Balance
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php fees_details($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
