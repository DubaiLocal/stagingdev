<?php echo view('admin/template/header'); ?>
<div class="main-body">
    <div class="page-wrapper">
        <div class="row">
            <div class="col-md-12">

                <!--   <form method="post"> -->
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Business</th>
                            <th>Status</th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($pending_claims as $pending_claim) {
                            $i++;
                            // $pending_claim['status'] == 0;

                            if ($pending_claim['status'] == 1) {
                                $icon = '<i class="fa fa-check" aria-hidden="true" style="color:green"></i>';
                            } else {
                                $icon = '<i class="fa fa-close" style="color:red"></i>';
                            }

                        ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $pending_claim['name']; ?></a></td>
                                <td><?php echo $pending_claim['email']; ?></a></td>
                                <td><?php echo $pending_claim['business_name']; ?></a></td>
                                <td onclick="PendingClaimsStatusUpdate('<?php echo $pending_claim['id']; ?>','<?php echo $pending_claim['status']; ?>')">
                                    <?php echo $icon; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- 
                                             </form> -->
            </div>
        </div>
        <!-- Paginate -->

    </div>
</div>
<?php echo view('admin/template/footer'); ?>