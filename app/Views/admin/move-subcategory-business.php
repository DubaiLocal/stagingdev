<?php echo view('admin/template/header'); ?>
<?php $session = session(); ?>
<div class="main-div move-subcategory-business">
    <!-- Page Heading Start-->
    <div class="page_head_text mb-5">
        <h3>Move business</h3>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <?php
            if ($session->getFlashdata('success_save')) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $session->getFlashdata('success_save'); ?>
                </div>
            <?php
            }
            if ($session->getFlashdata('error_save')) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $session->getFlashdata('error_save'); ?>
                </div>
            <?php
            }
            ?>
            <form method="post" action="<?= base_url() . "/admin/save_move_subcategory_business" ?>" class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="move-from">
                            <div class="form-group mb-2">
                                <label>Select Category</label>
                                <select class="form-control" id="move_from_category" name="move_from_category">
                                    <option value="">Select Category</option>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="custom">Subcategory: <span>*</span></label>
                                <select class="form-control" id="move_from_sub_category" name="move_from_sub_category">
                                    <option value="">Select Sub Category</option>
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label class="custom">Date: <span>*</span></label>
                                <input type="text" id="date_from" name="date_from" class="form-control">
                                <input type="text" id="date_to" name="date_to" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label class="custom">Business: </label>
                                <select class="form-control" id="move_from_business" name="move_from_business" multiple="multiple">
                                    <option value="">Select Businesses</option>
                                </select>
                            </div>
                            <!-- <div class="form-group mt-2 text-center">
                                <button type="button" id="move_from_submit" class="btn btn_custom">Submit -></button>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="move-to">
                            <div class="form-group mb-2">
                                <label>Select Category</label>
                                <select class="form-control" id="move_to_category" name="move_to_category">
                                    <option value="">Select Category</option>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="custom">Subcategory: <span>*</span></label>
                                <select class="form-control" id="move_to_sub_category" name="move_to_sub_category">
                                    <option value="">Select Sub Category</option>
                                </select>
                            </div>

                            <!-- <div class="form-group mb-2">
                                <label class="custom">Business: </label>
                                <select class="form-control" id="move_to_business" name="move_to_business">
                                    <option value="">Select Businesses</option>
                                </select>
                            </div> -->

                            <!-- <div class="form-group mt-2 text-center">
                                <button type="button" id="move_to_submit" class="btn btn_custom">
                                    <- Submit</button>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="form-group mt-2">
                            <button type="button" id="move_from_submit" class="btn btn_custom">Move</button>
                        </div>
                    </div>
                </div>
                <div id="business_details">
                    <div class="row">
                        <div class="col-md-12">
                            <h5></h5>
                            <p></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Page Heading End-->
</div>

<?php echo view('admin/template/footer'); ?>
</body>

</html>