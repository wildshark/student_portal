<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 20/01/2019
 * Time: 9:17 AM
 */
?>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Fees Summary Ledger</h4>
            <p class="card-description">
                Basic form elements
            </p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Student</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Balance</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php fees_summary_ledger($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
