<?php echo view('admin/template/header'); ?>
<?php $session = session(); ?>
<div class="hk-pg-wrapper">
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
   <div class="main-div">
      <div class="page_head_text mb-5">
         <h3>Add Bussiness</h3>
      </div>
      <form action="<?php echo base_url('admin/business/save'); ?>" method="POST" enctype="multipart/form-data" id="add_business">
         <div class="section_box">
            <div class="row">
               <div class="col-md-4 col-sm-6 col-12">
                  <div class="form-group">
                     <label class="custom">FeaturedType:</label>
                     <select class="form-control" name="featured" id="featured">
                        <option value="">Select FeaturedType</option>
                        <?php foreach ($features as $feature) { ?>
                           <option value="<?php echo $feature['Id']; ?>"><?php echo $feature['name']; ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6 col-12">
                  <div class="form-group">
                     <label class="custom">Category: <span>*</span></label>
                     <select class="form-control" id="category" name="category_id">
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category) { ?>
                           <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6 col-12">
                  <div class="form-group">
                     <label class="custom">Subcategory: <span>*</span></label>
                     <select class="form-control" id="sub_category" name="subcategory_id">
                        <option value="">Select Sub Category</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                     <label class="custom">Name: <span>*</span></label>
                     <input type="text" name="name" class="form-control" placeholder="" id="name">
                  </div>
               </div>

               <div class="col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                     <label class="custom">Website Url: </label>
                     <input type="text" name="unique_url" id="unique_url" class="form-control">
                  </div>
               </div>
               <div class="col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                     <label class="custom">Email: </label>
                     <input type="text" name="email" id="email" class="form-control">
                  </div>
               </div>
               <!-- <div class="col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                     <label class="custom">Rating: </label>
                     <input type="text" name="num_rating" id="num_rating" class="form-control">
                  </div>
               </div>
               <div class="col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                     <label class="custom">Aeverage Rating: </label>
                     <input type="text" name="aeverage_rating" id="aeverage_rating" class="form-control">
                  </div>
               </div> -->
               <div class="col-md-8 col-sm-12 col-12">
                  <div class="form-group">
                     <label class="custom">Address: <span>*</span></label>
                     <!-- <input type="text" name="address1" id="address1" class="form-control"> -->
                     <textarea type="text" name="address" id="address" class="form-control" rows="2"></textarea>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6 col-12">
                  <div class="form-group">
                     <label class="custom">District: <span>*</span></label>
                     <select class="form-control" id="district" name="district">
                        <option value="">Select District</option>
                        <?php foreach ($districts as $district) {
                        ?>
                           <option value="<?= $district['id']; ?>"><?= $district['name']; ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6 col-12">
                  <div class="form-group">
                     <label class="custom">Nearby Location: <span>*</span></label>
                     <select class="form-control" id="nearby_location" name="nearby_location">
                        <option value="">Select Nearby Location</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-6 col-sm-12 col-12">
                  <div class="form-group">
                     <label class="custom">Phone No: <span>*</span></label>
                     <input type="text" name="phone" id="phone" class="form-control">
                  </div>
               </div>
               <div class="col-lg-6 col-sm-6 col-12">
                  <div class="form-group">
                     <label class="custom">Banner:</label>
                     <input type="file" name="logo" id="logo" class="form-control" style="height:auto">
                  </div>
               </div>
               <div class="col-lg-6 col-sm-6 col-12">
                  <div class="form-group">
                     <label class="custom">More Images:</label>
                     <input class="form-control" name="more_images" value="" type="hidden">
                     <input class="form-control multi with-preview" name="more_images[]" multiple="" id="more_images" type="file" accept="jpg|jpeg|png" data-maxfile="4096" style="height:auto">
                  </div>
               </div>

               <div class="col-md-12 col-sm-12 col-12">
                  <div class="form-group">
                     <label class="custom">Description:</label>
                     <textarea type="text" name="description" id="description" class="form-control"></textarea>
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 col-12">
                  <div class="form-group">
                     <h4>Timings</h4>
                  </div>
               </div>

               <div class="col-md-12 col-sm-12 col-12">
                  <div class="row align-items-center">
                     <div class="col-md-1">
                        <span class="strong1">Monday</span>
                     </div>
                     <div class="col-md-5">
                        <div class="form-group">
                           <label class="open_hours">Opening Hours:</label>
                           <input type="text" autocomplete="off" name="open_hours[]" id="open_hours_mon" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="close_hours">Closing Hours:</label>
                           <input type="text" autocomplete="off" name="close_hours[]" id="close_hours_mon" class="form-control">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 col-12">
                  <div class="row align-items-center">
                     <div class="col-md-1">
                        <span class="strong1">Tuesday</span>
                     </div>
                     <div class="col-md-5">
                        <div class="form-group">
                           <label class="open_hours">Opening Hours:</label>
                           <input type="text" autocomplete="off" name="open_hours[]" id="open_hours_tue" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="close_hours">Closing Hours:</label>
                           <input type="text" autocomplete="off" name="close_hours[]" id="close_hours_tue" class="form-control">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 col-12">
                  <div class="row align-items-center">
                     <div class="col-md-1">
                        <span class="strong1">Wednesday</span>
                     </div>
                     <div class="col-md-5">
                        <div class="form-group">
                           <label class="open_hours">Opening Hours:</label>
                           <input type="text" autocomplete="off" name="open_hours[]" id="open_hours_wed" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="close_hours">Closing Hours:</label>
                           <input type="text" autocomplete="off" name="close_hours[]" id="close_hours_wed" class="form-control">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 col-12">
                  <div class="row align-items-center">
                     <div class="col-md-1">
                        <span class="strong1">Thursday</span>
                     </div>
                     <div class="col-md-5">
                        <div class="form-group">
                           <label class="open_hours">Opening Hours:</label>
                           <input type="text" autocomplete="off" name="open_hours[]" id="open_hours_th" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="close_hours">Closing Hours:</label>
                           <input type="text" autocomplete="off" name="close_hours[]" id="close_hours_th" class="form-control">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 col-12">
                  <div class="row align-items-center">
                     <div class="col-md-1">
                        <span class="strong1">Friday</span>
                     </div>
                     <div class="col-md-5">
                        <div class="form-group">
                           <label class="open_hours">Opening Hours:</label>
                           <input type="text" autocomplete="off" name="open_hours[]" id="open_hours_fri" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="close_hours">Closing Hours:</label>
                           <input type="text" autocomplete="off" name="close_hours[]" id="close_hours_fri" class="form-control">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 col-12">
                  <div class="row align-items-center">
                     <div class="col-md-1">
                        <span class="strong1">Saturday</span>
                     </div>
                     <div class="col-md-5">
                        <div class="form-group">
                           <label class="open_hours">Opening Hours:</label>
                           <input type="text" autocomplete="off" name="open_hours[]" id="open_hours_sat" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="close_hours">Closing Hours:</label>
                           <input type="text" autocomplete="off" name="close_hours[]" id="close_hours_sat" class="form-control">
                        </div>
                     </div>
                  </div>

               </div>
               <div class="col-md-12 col-sm-12 col-12">
                  <div class="row align-items-center">
                     <div class="col-md-1">
                        <span class="strong1">Sunday</span>
                     </div>
                     <div class="col-md-5">
                        <div class="form-group">
                           <label class="open_hours">Opening Hours:</label>
                           <input type="text" autocomplete="off" name="open_hours[]" id="open_hours_sun" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="close_hours">Closing Hours:</label>
                           <input type="text" autocomplete="off" name="close_hours[]" id="close_hours_sun" class="form-control">
                        </div>
                     </div>
                  </div>
               </div>

            </div>
         </div>


         <div class="form-group text-right">
            <button type="submit" name="submit" id="submit" class="btn btn_custom">Submit</button>
         </div>
      </form>

      <?php echo view('admin/template/footer'); ?>