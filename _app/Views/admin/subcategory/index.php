<?php echo view('admin/template/header'); ?>
<div class="main-body">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?= site_url('/admin/dashboard') ?>">Home</a></li>

         <?php
         foreach ($categories as $category) {
         ?>

            <li class="breadcrumb-item active" aria-current="page" <?php echo md5($category['id']);  ?>><?php echo $category['name']; ?>(<?php echo $category['sub_count']; ?>)</li>
         <?php } ?>

      </ol>

   </nav>
   <div class="page-wrapper">
      <div class="row">
         <div class="col-md-12">
            <a class="btn btn_custom d-table ml-auto" href='<?= site_url('/admin/sub-category/create') ?>'>Add Sub Category</a><br>
            <table class="table table-striped table-bordered" style="width:100%">
               <thead class="thead-dark">
                  <tr>
                     <th>S.No</th>
                     <th>Name</th>
                     <th>Slug</th>
                     <th>Banner</th>
                     <th>Icon</th>
                     <th>Status</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $i = 0;
                  if (is_array($subcategories) && count($subcategories) > 0) {
                     /* print("<pre>" . print_r($subcategories, true) . "</pre>");
                     die(); */
                     foreach ($subcategories as $subcategory) {
                        $i++;
                        if ($subcategory->status == 1) {
                           $icon = '<i class="fa fa-check" aria-hidden="true" style="color:green"></i>';
                        } else {
                           $icon = '<i class="fa fa-close" style="color:red"></i>';
                        }
                  ?>
                        <tr>
                           <td><?php echo $i; ?></td>

                           <td><a href='<?php echo base_url(); ?>/admin/business/listing/subcategory/<?php echo md5($subcategory->id);  ?>'><?php echo $subcategory->name . "(" . $subcategory->count_business . ")"; ?></a></td>
                           <td><?= $subcategory->slug; ?></td>
                           <td>
                              <?php if ($subcategory->banner != "") { ?>
                                 <a href="<?= base_url() . "/assets/sub_cat_img/" . $subcategory->banner ?>" target="_blank"> <img src="<?= base_url() . "/assets/sub_cat_img/" . $subcategory->banner ?>" height="40px"></a>
                              <?php } else {
                                 echo "<p>No Image</p>";
                              } ?>

                           </td>
                           <td>
                              <?php if ($subcategory->icon != "") { ?>
                                 <img src="<?= base_url() . "/assets/sub_cat_icon/" . $subcategory->icon ?>" height="40px">
                              <?php } else {
                                 echo "<p>No Icon</p>";
                              } ?>

                           </td>


                           <td onclick="subcatStatusUpdate('<?php echo $subcategory->id; ?>','<?php echo $subcategory->status; ?>')"><?php echo $icon; ?></td>
                           <td><a type="button" class="btn btn_custom" href="<?= base_url() ?>/admin/sub-category/edit/<?php echo md5($subcategory->id);  ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        </tr>
                  <?php }
                  } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<?php echo view('admin/template/footer'); ?>