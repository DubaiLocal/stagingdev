<?php echo view('admin/template/header'); ?>
<div class="main-body admin-pending">
    <div class="page-wrapper">
        <div class="row">
            <div class="col-md-12">

                <table class="table table-striped table-bordered" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Action</th>
                            <th>Name</th>
                            <th>User</th>
                            <th>Feature Type</th>
                            <th>Remarks</th>
                            <th>Details</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($businesses as $bussines) {
                            $i++;
                            // $bussines['status'] == 0;

                            // $icon = '<i class="fa fa-check" aria-hidden="true" style="color:green"></i>';
                            if ($business['status'] == 0) {
                                $icon = '<i class="fa fa-close" aria-hidden="true" style="color:red"></i>';
                            } else {
                                $icon = '<i class="fa fa-check" style="color:green"></i>';
                            }

                        ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><a type="button" target="_blank" class="btn btn_custom" href="<?= base_url('admin/business/pending-bussiness/edit/' . md5($bussines['id'])) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                <td><?php
                                    // echo $bussines['name'];
                                    if (strlen($bussines['name']) > 20) {
                                        echo substr($bussines['name'], 0, 20) . "...";
                                    } else {
                                        echo $bussines['name'];
                                    }
                                    ?></td>
                                <td><span class="b_400"><?= ucfirst($bussines['user_name']); ?></span> - <?= $bussines['user_email']; ?></td>
                                <td>
                                    <div class="form-group">
                                        <!-- <label for="exampleFormControlSelect1">Example select</label> -->
                                        <select class="form-control" name="feature_type" id="feature_type" onchange="pendingFeatureUpdate('<?php echo $bussines['id']; ?>',this)">
                                            <option value="">Select Feature Type</option>
                                            <option value="1" <?= $bussines['feature_id'] == 1 ? "selected" : ""; ?>>Best rate</option>
                                            <option value="2" <?= $bussines['feature_id'] == 2 ? "selected" : ""; ?>>Most View</option>
                                            <option value="3" <?= $bussines['feature_id'] == 3 ? "selected" : ""; ?>>Popular</option>
                                            <option value="4" <?= $bussines['feature_id'] == 4 ? "selected" : ""; ?>>Featured</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn <?php echo ($bussines['remarks'] == "") ?  "btn-primary" : "btn-success"; ?> " data-toggle="modal" data-target="#remarkModal<?= $bussines['id']; ?>" href="">
                                        <?= ($bussines['remarks'] == "") ?  "Add" : "Edit"; ?> Remark
                                    </button>
                                    <!-- <button type="button" class="btn btn_custom" data-toggle="modal" data-target="#remarkModal<?= $bussines['id']; ?>" href="">Add Remark</button> -->
                                    <div class="modal fade bd-example-modal-lg" id="remarkModal<?= $bussines['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="remarkModalTitle<?= $bussines['id']; ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="" class="admin_pending_remarks_form">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="<?= $bussines['id']; ?>LongTitle">Add Remarks for - <?= $bussines['name']; ?></h5>
                                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button> -->
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label class="custom">Remarks: <span>*</span></label>
                                                            <textarea name="admin_pending_remarks" id="admin_pending_remarks" class="form-control" cols="30" rows="3"><?= $bussines['remarks']; ?></textarea>
                                                            <input type="hidden" name="" id="b_id" value="<?= $bussines['id']; ?>">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn_custom admin_pending_remarks_submit">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><a type="button" target="_blank" class="btn btn_custom" href="<?= base_url('admin/business/preview/' . $bussines['slug']) ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                                <td onclick="bussinessStatusUpdate('<?php echo $bussines['id']; ?>','<?php echo $bussines['status']; ?>')">
                                    <?php echo $icon; ?></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Paginate -->
            <div style='margin-top: 10px;'>
                <?= $pager->links() ?>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- <div class="modal fade" id="remarkModal" tabindex="-1" role="dialog" aria-labelledby="remarkModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="remarkModalLongTitle">Add Remarks for - <span class="remark_business_title"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label class="custom">Remarks: <span>*</span></label>
                        <textarea name="admin_pending_remarks" id="admin_pending_remarks" class="form-control" cols="30" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn_custom">Save changes</button>
            </div>
        </div>
    </div>
</div> -->
<?php echo view('admin/template/footer'); ?>