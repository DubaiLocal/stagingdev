<?php echo view('admin/template/header'); ?>
<?php $session = session(); ?>
<div class="hk-pg-wrapper">
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Dubai Local</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
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
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Edit Sub Category</h4>
        </div>
        <div class="card-body">

            <form action="<?php echo base_url('/admin/sub-category/update/' . md5($subcategory[0]->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php //echo $users[0]->id; 
                ?>
                <div class="form-group mb-2">
                    <label>Name</label>
                    <!-- <input class="form-control" name="cat_id" value="<?php //echo md5($category['id']);  
                                                                            ?>" type="hidden"> -->
                    <input class="form-control" name="id" value="<?php echo $hash_id; ?>" type="hidden">
                    <input type="text" name="name" value="<?php echo $subcategory[0]->name; ?>" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label>Category</label>
                    <select class="form-control" name="category" id="category">
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $subcategory[0]->cat_id) {
                                                                                echo 'selected="selected"';
                                                                            } ?>><?php echo $category['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <img height="100px" src="<?php echo base_url() . "/assets/sub_cat_img/" . $subcategory[0]->banner; ?>" />
                <div class="form-group mb-2">
                    <!-- <input class="form-control" name="img_name" value="<?php echo $image; ?>" type="hidden"> -->
                    Image <input class="form-control" name="image" id="image" type="file" style="height:auto">
                </div>
                <img height="20px" src="<?php echo base_url() . "/assets/sub_cat_icon/" . $subcategory[0]->icon; ?>" />
                <div class="form-group mb-2">
                    <!-- <input class="form-control" name="img_name" value="<?php echo $icon; ?>" type="hidden"> -->
                    Icon <input class="form-control" name="sub_cat_icon" id="sub_cat_icon" type="file" style="height:auto">
                </div>
                <div class="form-group mb-2">
                    <label>Priority</label>
                    <input type="number" name="priority" value="<?php echo $subcategory[0]->priority; ?>" class="form-control">
                </div>
                <div class="custom-control custom-checkbox mb-25">
                    <!-- <input class="custom-control-input" name="is_active" id="is_active" value="1" type="checkbox" checked>
                    <label class="custom-control-label font-14" for="is_active">Is Active</label> -->


                    <input class="custom-control-input" name="is_active" id="is_active" onclick="$(this).attr('value', this.checked ? 1 : 0)" type="checkbox" <?php echo ($subcategory[0]->status == 1) ? "checked" : ""; ?> value="<?= $subcategory[0]->status ?>">
                    <label class="custom-control-label font-14" for="is_active">Is Active</label>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn_custom">Update</button>
                </div>
            </form>
        </div>

        <?php echo view('admin/template/footer'); ?>