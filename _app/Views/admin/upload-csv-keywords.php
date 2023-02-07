<?php echo view('admin/template/header'); ?>
<?php $session = session(); ?>
<div class="main-div upload-csv-keywords">
    <!-- Page Heading Start-->
    <div class="page_head_text mb-5">
        <h3>Upload CSV for Keywords</h3>
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
            <form method="post" action="<?= base_url() . "/admin/save-upload-keywords-csv" ?>" id="upload_keywords_csv" class="form-group" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="move-from">
                            <div class="form-group mb-2">
                                <label>Select Category</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="">Select Category</option>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- <div class="form-group mb-2">
                                <label class="custom">Subcategory: <span>*</span></label>
                                <select class="form-control" id="sub_category" name="sub_category">
                                    <option value="">Select Sub Category</option>
                                </select>
                            </div> -->

                            <div class="form-group mb-2">
                                <label class="custom">Upload CSV: </label>
                                <input type="file" name="csv" id="csv" class="form-control">
                            </div>
                            <!-- <div class="form-group mt-2 text-center">
                                <button type="button" id="move_from_submit" class="btn btn_custom">Submit -></button>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="form-group mt-2">
                            <button type="submit" id="save_keywords" class="btn btn_custom">Save</button>
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