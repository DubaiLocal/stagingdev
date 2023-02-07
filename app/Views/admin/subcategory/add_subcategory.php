<?php echo view('admin/template/header'); ?>
<?php $session = session(); ?>
<div class="hk-pg-wrapper">
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Dubai Local</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Sub Category</li>
        </ol>
    </nav>

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

    <hr>
    <div class="container-fluid px-xxl-65 px-xl-20">

        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Add Sub-Category</h4>
        </div>
        <div class="card-body">

            <form action="<?php echo base_url('/admin/sub-category/save'); ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group mb-2">
                    <label>Category</label>
                    <select class="form-control" id="category" name="category">
                        <option value="">Please Select</option>
                        <?php foreach ($categories as $category) { ?>

                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php } ?>
                        <select>
                </div>
                <div class="form-group mb-2">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label class="custom">Image:</label>
                    <input type="file" name="image" id="image" class="form-control" style="height:auto">
                </div>
                <div class="form-group mb-2">
                    <label class="custom">Icon:</label>
                    <input class="form-control" name="sub_cat_icon" id="sub_cat_icon" type="file" style="height:auto">
                </div>
                <div class="form-group mb-2">
                    <label class="custom">Priority:</label>
                    <input type="number" name="priority" class="form-control">
                </div>
                <div class="custom-control custom-checkbox mb-25">
                    <input class="custom-control-input" name="is_active" id="is_active" onclick="$(this).attr('value', this.checked ? 1 : 0)" value="1" type="checkbox" checked>
                    <label class="custom-control-label font-14" for="is_active">Is Active</label>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn_custom">Submit</button>
                </div>
            </form>
        </div>

        <?php echo view('admin/template/footer'); ?>