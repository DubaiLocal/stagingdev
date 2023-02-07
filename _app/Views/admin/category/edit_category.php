<?php echo view('admin/template/header'); ?>
<?php $session = session(); ?>
<div class="hk-pg-wrapper">
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Dubai Local</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
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
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Edit Category</h4>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('/admin/category/update/' . md5($category[0]->id)); ?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                <?php //echo $users[0]->id; 
                ?>
                <div class="form-group mb-2">
                    <label>Name</label>
                    <input class="form-control" name="id" value="<?php echo $hash_id; ?>" type="hidden">
                    <input type="text" name="name" value="<?php echo $category[0]->name; ?>" class="form-control" required>
                </div>
                <img height="100px" src="<?php echo base_url() . "/assets/image/" . $category[0]->banner; ?>" />
                <div class="form-group mb-2">
                    Image <input class="form-control" name="image" id="image" type="file" style="height:auto">
                </div>
                <img height="100px" src="<?php echo base_url() . "/assets/category/icon/" . $category[0]->icon; ?>" />
                <div class="form-group mb-2">
                    Icon <input class="form-control" name="cat_icon" id="cat_icon" type="file" style="height:auto">
                </div>
                <img height="100px" src="<?php echo base_url() . "/assets/category/image" . $category[0]->image; ?>" />
                <div class="form-group mb-2">
                    Banner <input class="form-control" name="cat_image" id="cat_image" type="file" style="height:auto">
                </div>
                <div class="form-group mb-2">
                    <label>Priority</label>
                    <input type="text" name="priority" value="<?php echo $category[0]->priority; ?>" class="form-control">
                </div>
                <div class="custom-control custom-checkbox mb-25">
                    <input class="custom-control-input" name="status" id="status" onclick="$(this).attr('value', this.checked ? 1 : 0)" type="checkbox" <?php echo ($category[0]->status == 1) ? "checked" : ""; ?> value="<?= $category[0]->status ?>">
                    <label class="custom-control-label font-14" for="is_active">Is Active</label>
                </div>
                <div class="form-group text-right  mt-2">
                    <button type="submit" class="btn btn_custom">Update</button>
                </div>
            </form>
        </div>
        <?php echo view('admin/template/footer'); ?>