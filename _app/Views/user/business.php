<?php echo view('user/template/header'); ?>
<div class="main-body">
    <div class="page-wrapper">

        <div class="row">
            <div class="col-md-12">
                <?php if (is_array($user_approved_bussiness) && count($user_approved_bussiness) > 0) { ?>
                    <!--   <form method="post"> -->
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <!-- <th>Actions</th> -->
                                <th>S.No</th>
                                <th>Name</th>
                                <th>User</th>
                                <th>Description</th>
                                <th>View</th>
                                <!--  <th colspan="2">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($user_approved_bussiness as $business) {
                                $i++;
                            ?>
                                <tr>
                                    <!-- <td><a href='<?php //echo base_url(); 
                                                        ?>/user-business/edit/<?php //echo md5($my_bussiness['id']);  
                                                                                ?>'>Edit</a></td> -->
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $business['name']; ?></td>
                                    <td><?php echo $business['user_name']; ?></td>
                                    <td><?php echo $business['description']; ?></td>
                                    <td><a type="button" target="_blank" class="btn btn_custom" href="<?= base_url('business/' . $business['slug']) ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else {
                    echo "No records found";
                } ?>
                <!-- 
                                             </form> -->
            </div>
        </div>
        <!-- Paginate -->
    </div>
</div>
<?php echo view('user/template/footer'); ?>