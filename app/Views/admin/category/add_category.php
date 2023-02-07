<?php echo view('admin/template/header'); ?>
<?php $session = session(); ?>
<div class="hk-pg-wrapper">
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">America Local</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
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
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Add Category</h4>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('/admin/category/save'); ?>" method="POST" enctype="multipart/form-data">
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
                    <input class="form-control" name="cat_icon" id="cat_icon" type="file" style="height:auto">
                </div>
                <div class="form-group mb-2">
                    <label class="custom">Banner:</label>
                    <input class="form-control" name="cat_image" id="cat_image" type="file" style="height:auto">
                </div>
                <div class="form-group mb-2">
                    <label class="custom">Priority:</label>
                    <input type="number" name="priority" id="priority" class="form-control" style="height:auto">
                </div>
                <div class="custom-control custom-checkbox mb-25">
                    <input class="custom-control-input" name="status" onclick="$(this).attr('value', this.checked ? 1 : 0)" id="status" value="1" type="checkbox" checked>
                    <label class="custom-control-label font-14" for="status">Is Active</label>
                </div>
                <div class="form-group mt-2 text-right">
                    <button type="submit" class="btn btn_custom">Submit</button>
                </div>
            </form>
        </div>
        <?php echo view('admin/template/footer'); ?>