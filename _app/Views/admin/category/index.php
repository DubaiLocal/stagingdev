<?php echo view('admin/template/header'); ?>

<div class="main-body">
    <div class="page-wrapper">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn_custom d-table ml-auto" href='<?= site_url('/admin/category/create') ?>'>Add Category</a><br><br>
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>S.No</th>
                            <!-- <th>Created</th> -->
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Isactive</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($categories as $category) {
                            $i++;
                            if ($category['status'] == 1) {
                                $icon = '<i class="fa fa-check" aria-hidden="true" style="color:green"></i>';
                            } else {
                                $icon = '<i class="fa fa-close" style="color:red"></i>';
                            }

                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <!-- <td>
                                    <?php $originalDate = $category['created'];
                                    $newDate = date("d-M-Y", strtotime($originalDate));
                                    echo $newDate; ?>
                                </td> -->
                                <td><a href='<?php echo base_url(); ?>/admin/sub-category/<?php echo md5($category['id']);  ?>'><?= $category['name']; ?></a><?= " (" . $category['sub_count'] . ")" ?></td>
                                <td><?= $category['slug']; ?></td>
                                <td onclick="catStatusUpdate('<?php echo $category['id']; ?>','<?php echo $category['status']; ?>')"><?php echo $icon; ?></td>
                                <td><a href='<?php echo base_url(); ?>/admin/category/edit/<?php echo md5($category['id']);  ?>'>Edit</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Paginate -->
        <!-- <div style='margin-top: 10px;'> 
               
            </div> -->
    </div>
</div>
<?php echo view('admin/template/footer'); ?>