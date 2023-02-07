<?php echo view('user/template/header'); ?>
<?php $session = session(); ?>
<div class="main-body">
    <div class="page-wrapper">
        <div class="row">
            <?php
            if ($session->getFlashdata('success_save')) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $session->getFlashdata('success_save'); ?>
                </div>
            <?php }
            ?>
            <?php
            if ($session->getFlashdata('error_save')) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $session->getFlashdata('error_save'); ?>
                </div>
            <?php }
            ?>
            <div class="col-md-12">
                <!--   <form method="post"> -->
                <?php if (is_array($user_pending_business) && count($user_pending_business) > 0) { ?>
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>S.No</th>
                                <th>Action</th>

                                <th>Name</th>
                                <th>Remarks</th>
                                <th>Category</th>
                                <!-- <th>Subcategory</th> -->
                                <th>Website_Url</th>
                                <!-- <th>Address</th> -->
                                <th>Phone</th>
                                <!-- <th>Logo</th> -->
                                <!-- <th>More_images</th> -->
                                <th>Description</th>
                                <th>Details</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($user_pending_business as $business) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>
                                        <a type="button" target="_blank" class="btn btn_custom" href="<?= base_url("/user/business/edit/" . md5($business['id'])); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    </td>
                                    <td>
                                        <?php
                                        // echo $business['name'];
                                        if (strlen($business['name']) > 20) {
                                            echo substr($business['name'], 0, 20) . "...";
                                        } else {
                                            echo $business['name'];
                                        }
                                        ?>
                                    </td>

                                    <td><?php
                                        if (strlen($business['remarks']) > 20) {
                                            echo substr($business['remarks'], 0, 20) . "<a href='' data-toggle='modal' data-target='#remarkModal" . $business['id'] . "'>[...]</a>";
                                        } else {
                                            echo $business['remarks'];
                                        }
                                        ?>
                                        <div class="modal fade bd-example-modal-lg" id="remarkModal<?= $business['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="remarkModalTitle<?= $business['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="<?= $business['id']; ?>LongTitle">Remarks for - <?= $business['name']; ?></h5>
                                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button> -->
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div id="user_pending_remarks_show">
                                                                        <span><?= $business['remarks']; ?></span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div id="admin_pending_remarks_show">

                                                    </div> -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $business['cat_name']; ?></td>
                                    <!-- <td><?php echo $business['sub_cat_name ']; ?></td> -->
                                    <td>
                                        <?php
                                        // echo $business['unique_url'];
                                        if (strlen($business['url']) > 30) {
                                            echo substr($business['url'], 0, 30) . "...";
                                        } else {
                                            echo $business['url'];
                                        }
                                        ?>
                                    </td>
                                    <!-- <td><?php
                                                $small_address1 = substr($business['address1'], 0, 30);
                                                echo $small_address1 . " ..."; ?></td> -->
                                    <td><?php echo $business['phone']; ?></td>
                                    <!-- <td><img height="50px" src="<?php echo base_url(); ?>/assets/logo/<?= $business['logo'] ?>" /></td> -->
                                    <!-- <td><?php //echo $business['more_images']; 
                                                ?></td> -->
                                    <td><?php
                                        $small_description = substr($business['description'], 0, 20);
                                        echo $small_description . " ...";
                                        // echo $business['description'];
                                        ?>
                                    </td>
                                    <td><a type="button" target="_blank" class="btn btn_custom" href="<?= base_url('user/preview/' . $business['slug']) ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                                    <td style="color: red;"><?php
                                                            if ($business['status'] == 0) {
                                                                echo "Pending";
                                                            }
                                                            ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else {
                    echo "No Pending Business found";
                }  ?>
                <!-- 
                                             </form> -->
            </div>
        </div>
        <!-- Paginate -->
    </div>
</div>
<?php echo view('user/template/footer'); ?>