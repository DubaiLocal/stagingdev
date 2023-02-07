<?php echo view('admin/template/header'); ?>
<?php $session = session(); ?>
<div class="main-body">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= site_url('/admin/dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= site_url('/admin/business/listing') ?>">Businesses</a></li>

        </ol>
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
    </nav>
    <div class="page-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="text-left">
                    <form method="get" action="<?= base_url(); ?>/admin/business/listing/">
                        <div class="form-row">
                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="Search" name="search" value="<?= $_GET['search']; ?>">
                            </div>
                            <div class="col-md-2">
                                <input type="submit" value="Search" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="text-right">
                    <a class="btn btn_custom" href='<?= site_url('admin/business/listing') ?>'>Export</a> &nbsp;
                    <a class="btn btn_custom " href='<?= site_url('admin/business/create') ?>'>Add Bussiness</a>
                </div>
                <table id="contact_us_table" class="table table-striped table-bordered table-responsive mt-3" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Operations</th>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Website_Url</th>
                            <th>Description</th>
                            <th>User</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($businesses as $business) {
                            if ($business['status'] == 1) {
                                $icon_active = '<i class="fa fa-check" aria-hidden="true" style="color:green"></i>';
                            } else {
                                $icon_active = '<i class="fa fa-close" style="color:red"></i>';
                            }
                        ?>
                            <tr>
                                <td><a type="button" target="_blank" class="btn btn_custom" href="<?= base_url('admin/business/edit/' . md5($business['id'])) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                <td onclick="bussinessActiveInActive('<?php echo $business['id']; ?>','<?php echo $business['status']; ?>')"><?php echo $icon_active; ?></td>
                                <td>
                                    <?php
                                    if (strlen($business['name']) > 40) {
                                        echo substr($business['name'], 0, 40) . "...";
                                    } else {
                                        echo $business['name'];
                                    }
                                    // echo $business['name'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (strlen($business['url']) > 40) {
                                        echo substr($business['url'], 0, 40) . "...";
                                    } else {
                                        echo $business['url'];
                                    }
                                    ?>
                                </td>
                                <td class="des_width">
                                    <?php
                                    if (strlen($business['description']) > 60) {
                                        echo substr($business['description'], 0, 60) . "...";
                                    } else {
                                        echo $business['description'];
                                    }
                                    ?>
                                </td>
                                <td><?php echo $business['user_id']; ?></td>
                                <td><a type="button" target="_blank" class="btn btn_custom" href="<?= base_url('business/' . $business['slug']) ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Paginate -->
        <div style='margin-top: 10px;'>
            <?= $pager->links() ?>
        </div>
    </div>
</div>
<?php echo view('admin/template/footer'); ?>