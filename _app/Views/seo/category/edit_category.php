<?php echo view('seo/template/header'); ?>
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
            <form action="<?php echo base_url('/seo/category/update/' . $category->slug); ?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                <?php //echo $users[0]->id; 
                ?>
                <div class="form-group mb-2">
                    <label>Category Name</label>
                    <input class="form-control" name="id" value="<?php echo $id; ?>" type="hidden">
                    <input class="form-control" name="cat_id" value="<?php echo $category->id; ?>" type="hidden">
                    <input type="text" name="name" value="<?php echo $category->name; ?>" class="form-control" disabled>
                </div>

                <div class="form-group mb-2">
                    Title <input class="form-control" value="<?= $cat_seo_data->title; ?>" name="title" id="title" style="height:auto">
                </div>

                <div class="form-group mb-2">
                    Meta Title <input class="form-control" value="<?= $cat_seo_data->meta_title; ?>" name="meta_title" id="meta_title" style="height:auto">
                </div>

                <div class="form-group mb-2">
                    Meta description <input class="form-control" value="<?= $cat_seo_data->meta_desc; ?>" name="meta_desc" id="meta_desc" style="height:auto">
                </div>

                <div class="form-group text-right  mt-2">
                    <button type="submit" class="btn btn_custom">Update</button>
                </div>
            </form>
        </div>
        <?php echo view('seo/template/footer'); ?>