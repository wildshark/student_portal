<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 19/03/2019
 * Time: 1:01 PM
 */
?>
<!--Picture upload modal-->
<div class="modal fade" id="picture-modal">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Upload Picture</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                        Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" value="upload-image" name="submit">Upload</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!--School Bill Modal-->
<div class="modal fade" id="school-bill-modal">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Prepare Fees Bill</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Academic Year</label>
                        <select name="academic-year" class="form-control" id="exampleFormControlSelect2">
                            <?php cmb_academic_session($conn);?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect3">Programme</label>
                        <select name="programme" class="form-control form-control-sm" id="exampleFormControlSelect3">
                            <?php cmb_programme_data($conn);?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect3">Semester</label>
                        <select name="semester" class="form-control form-control-sm" id="exampleFormControlSelect3">
                            <option value="1">1st Semester</option>
                            <option value="2">2nd Semester</option>
                        </select>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" value="school-bill" name="submit">submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
