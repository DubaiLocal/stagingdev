<?php echo view('admin/template/header'); ?>

<form method='post' id="searchForm">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group mb-2">
                <input class="form-control" type='text' name='search' value='<?= $search ?>' placeholder="Search here...">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <select class="form-control" id="category" name="category">
                    <option value="">Select Category</option>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                    <?php } ?>
                    <select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <select class="form-control" id="sub_category" name="sub_category">
                    <option value="">Select Sub Category</option>

                    <select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <input type='button' class="btn btn-primary" id='btnsearch' value='Submit'>
            </div>
        </div>
    </div>
    <!-- <input type='button' id='btnsearch' value='Submit' onclick='document.getElementById("searchForm").submit();'> -->
</form>
<br />
<div class="ajax_table">
    <?php echo view('bussiness/table'); ?>
</div>


<?php echo view('admin/template/footer'); ?>