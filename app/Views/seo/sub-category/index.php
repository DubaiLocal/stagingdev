<?php echo view('seo/template/header'); ?>
<div class="main-body">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?= site_url('/seo/dashboard') ?>">Home</a></li>

         <?php
         foreach ($categories as $category) {
         ?>

            <li class="breadcrumb-item active" aria-current="page" <?php echo md5($category['id']);  ?>><?php echo $category['name']; ?></li>
         <?php } ?>

      </ol>

   </nav>
   <div class="page-wrapper">
      <div class="row">
         <div class="col-md-12">
            <table class="table table-striped table-bordered" style="width:100%">
               <thead class="thead-dark">
                  <tr>
                     <th>S.No</th>
                     <th>Name</th>
                     <th>Slug</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $i = 0;
                  if (is_array($subcategories) && count($subcategories) > 0) {
                     foreach ($subcategories as $subcategory) {
                        $i++;
                  ?>
                        <tr>
                           <td><?php echo $i; ?></td>

                           <td><?php echo $subcategory->name; ?></td>
                           <td><?= $subcategory->slug; ?></td>
                           <td><a type="button" class="btn btn_custom" href="<?= base_url() ?>/seo/sub-category/edit/<?php echo md5($subcategory->id);  ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        </tr>
                  <?php }
                  } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<?php echo view('seo/template/footer'); ?>