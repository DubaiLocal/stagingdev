<?php echo view('user/template/header'); ?>
<?php $session = session(); ?>
<div class="hk-pg-wrapper">
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Dubai Local</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Business</li>
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
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Edit Business</h4>
        </div>
        <div class="card-body">

            <form action="<?php echo base_url('user/business/update/' . md5($bussinesses[0]->id)); ?>" method="POST" enctype="multipart/form-data" id="update_user_business">

                <?php if ($pending == "true") { ?>
                    <input type="hidden" name="pending" value="true" class="form-control">
                <?php } else { ?>
                    <input type="hidden" name="pending" value="false" class="form-control">
                <?php } ?>
                <div class="form-group mb-2">
                    <label class="custom">Name</label>
                    <input class="form-control" name="id" value="<?php echo $hash_id; ?>" type="hidden">
                    <input type="text" name="name" value="<?php echo $bussinesses[0]->name; ?>" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label class="custom">Website_Url: </label>
                    <input type="text" value="<?php echo $bussinesses[0]->url; ?>" name="unique_url" id="unique_url" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <label class="custom">Category: </label>
                    <select class="form-control" id="category" name="category_id">
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $business_category[0]->category_id) {
                                                                                echo 'selected="selected"';
                                                                            } ?>><?php echo $category['name']; ?></option>
                        <?php } ?>
                        <select>
                </div>
                <div class="form-group mb-2">
                    <label class="custom">Subcategory: <span>*</span></label>
                    <select class="form-control" id="sub_category" name="subcategory_id">
                        <option value="">Select Sub Category</option>
                        <?php foreach ($subcategories as $subcategory) {
                            if ($subcategory['cat_id'] == $business_category[0]->category_id) {
                        ?>
                                <option value="<?php echo $subcategory['sub_cat_id']; ?>" <?php if ($subcategory['sub_cat_id'] == $business_category[0]->subcategory_id) {
                                                                                                echo 'selected="selected"';
                                                                                            } ?>><?php echo $subcategory['sub_cat_name']; ?></option>
                        <?php }
                        } ?>
                        <select>
                </div>
                <div class="form-group mb-2">
                    <label class="custom">District: <span>*</span></label>
                    <select class="form-control" id="district" name="district">
                        <option value="NULL">Select district</option>
                        <?php foreach ($districts as $district) { ?>
                            <option value="<?php echo $district['id']; ?>" <?= ($district['id'] == $bussinesses[0]->district_id) ? 'selected="selected"' : ""; ?>><?= $district['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label class="custom">Nearby Location: <span>*</span></label>
                    <select class="form-control" id="nearby_location" name="nearby_location">
                        <option value="">Select Nearby Location</option>
                        <?php foreach ($nearby_locations as $nearby_location) {
                            if ($nearby_location['district_id'] == $business_category[0]->district_id)
                        ?>
                            <option value="<?php echo $nearby_location['id']; ?>" <?= ($nearby_location['id'] == $bussinesses[0]->nearby_loc_id) ? 'selected="selected"' : ""; ?>><?= $nearby_location['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <img height="100px" src="<?php echo base_url() . "/assets/logo/" . $bussinesses[0]->banner; ?>" />
                <div class="form-group mb-2">
                    <input class="form-control" name="logo" value="<?php echo $logo; ?>" type="hidden">
                    Logo <input class="form-control" name="logo" id="logo" type="file" style="height:auto">
                </div>
                <div class="form-group mb-2">
                    <label class="custom">Email</label>
                    <input type="text" name="email" value="<?php echo $bussinesses[0]->email; ?>" class="form-control" placeholder="email">
                </div>
                <div class="form-group mb-2">
                    <label class="custom">Phone</label>
                    <input type="text" name="phone" value="<?php echo $bussinesses[0]->phone; ?>" class="form-control" placeholder="phone">
                </div>
                <div class="form-group mb-2">
                    <label class="custom"> Description</label>
                    <textarea type="text" name="Description" id="Description" rows="5" class="form-control"><?php echo $bussinesses[0]->description; ?></textarea>
                    <!-- <input type="text" name="Description" value="<?php echo $bussinesses[0]->description; ?>" class="form-control" placeholder="Description"> -->
                </div>
                <div class="form-group mb-2">
                    <label class="custom"> Address</label>
                    <input type="text" name="address" value="<?php echo $bussinesses[0]->address; ?>" class="form-control" placeholder="Address">
                </div>
                <!-- <div class="form-group mb-2">
                    <label class="custom">Rating</label>
                    <input type="number" name="num_rating" value="<?php echo $bussinesses[0]->num_rating; ?>" class="form-control" placeholder="Rating">
                </div>
                <div class="form-group mb-2">
                    <label class="custom"> Aeverage Rating</label>
                    <input type="number" name="aeverage_rating" value="<?php echo $bussinesses[0]->aeverage_rating; ?>" class="form-control" placeholder="Aeverage Rating">
                </div> -->
                <?php
                $more_image_array =  explode(",", $bussinesses[0]->more_images);
                foreach ($more_image_array as $single_more_image) {
                ?>
                    <img src="<?php echo base_url() . "/assets/more_images/" . $single_more_image; ?>" height="100px" />
                <?php } ?>
                <!-- <img src="<?php echo base_url() . "/assets/more_images/" . $more_image_array[0]; ?>" height="100px" />
                <img src="<?php echo base_url() . "/assets/more_images/" . $more_image_array[1]; ?>" height="100px" />
                <img src="<?php echo base_url() . "/assets/more_images/" . $more_image_array[2]; ?>" height="100px" /> -->
                <div class="form-group mb-2">
                    <input class="form-control" name="more_images" value="<?php echo $more_images; ?>" type="hidden">
                    More Images <input class="form-control multi with-preview" name="more_images[]" multiple="" id="more_images" type="file" accept="jpg|jpeg|png" data-maxfile="4096" style="height:auto">
                </div>
                <div class="form-group">
                    <h4 class="custom">Timings</h4>
                </div>

                <div class="row align-items-center">
                    <div class="col-md-1">
                        <span class="strong1">Monday</span>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="open_hours">Opening Hours:</label>
                            <input type="text" name="open_hours[]" id="open_hours_mon" class="form-control" value="<?php
                                                                                                                    if ($timings[0]['opening'] == '1969-12-31 18:00:00') {
                                                                                                                        echo "Closed";
                                                                                                                    } else {
                                                                                                                        echo date('h:i A', strtotime($timings[0]['opening']));
                                                                                                                    }
                                                                                                                    ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="close_hours">Closing Hours:</label>
                            <input type="text" name="close_hours[]" id="close_hours_mon" class="form-control" value="<?php
                                                                                                                        if ($timings[0]['closing'] == '1969-12-31 18:00:00') {
                                                                                                                            echo "Closed";
                                                                                                                        } else {
                                                                                                                            echo date('h:i A', strtotime($timings[0]['closing']));
                                                                                                                        } ?>">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-1">
                        <span class="strong1">Tuesday</span>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="open_hours">Opening Hours:</label>
                            <input type="text" name="open_hours[]" id="open_hours_tue" class="form-control" value="<?php
                                                                                                                    if ($timings[1]['opening'] == '1969-12-31 18:00:00') {
                                                                                                                        echo "Closed";
                                                                                                                    } else {
                                                                                                                        echo date('h:i A', strtotime($timings[1]['opening']));
                                                                                                                    }
                                                                                                                    ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="close_hours">Closing Hours:</label>
                            <input type="text" name="close_hours[]" id="close_hours_tue" class="form-control" value="<?php
                                                                                                                        if ($timings[1]['closing'] == '1969-12-31 18:00:00') {
                                                                                                                            echo "Closed";
                                                                                                                        } else {
                                                                                                                            echo date('h:i A', strtotime($timings[1]['closing']));
                                                                                                                        }
                                                                                                                        ?>">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-1">
                        <span class="strong1">Wednesday</span>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="open_hours">Opening Hours:</label>
                            <input type="text" name="open_hours[]" id="open_hours_wed" class="form-control" value="<?php
                                                                                                                    if ($timings[2]['opening'] == '1969-12-31 18:00:00') {
                                                                                                                        echo "Closed";
                                                                                                                    } else {
                                                                                                                        echo date('h:i A', strtotime($timings[2]['opening']));
                                                                                                                    } ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="close_hours">Closing Hours:</label>
                            <input type="text" name="close_hours[]" id="close_hours_wed" class="form-control" value="<?php
                                                                                                                        if ($timings[2]['closing'] == '1969-12-31 18:00:00') {
                                                                                                                            echo "Closed";
                                                                                                                        } else {
                                                                                                                            echo date('h:i A', strtotime($timings[2]['closing']));
                                                                                                                        } ?>">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-1">
                        <span class="strong1">Thursday</span>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="open_hours">Opening Hours:</label>
                            <input type="text" name="open_hours[]" id="open_hours_th" class="form-control" value="<?php
                                                                                                                    if ($timings[3]['opening'] == '1969-12-31 18:00:00') {
                                                                                                                        echo "Closed";
                                                                                                                    } else {
                                                                                                                        echo date('h:i A', strtotime($timings[3]['opening']));
                                                                                                                    } ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="close_hours">Closing Hours:</label>
                            <input type="text" name="close_hours[]" id="close_hours_th" class="form-control" value="<?php
                                                                                                                    if ($timings[3]['closing'] == '1969-12-31 18:00:00') {
                                                                                                                        echo "Closed";
                                                                                                                    } else {
                                                                                                                        echo date('h:i A', strtotime($timings[3]['closing']));
                                                                                                                    }  ?>">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-1">
                        <span class="strong1">Friday</span>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="open_hours">Opening Hours:</label>
                            <input type="text" name="open_hours[]" id="open_hours_fri" class="form-control" value="<?php
                                                                                                                    if ($timings[4]['opening'] == '1969-12-31 18:00:00') {
                                                                                                                        echo "Closed";
                                                                                                                    } else {
                                                                                                                        echo date('h:i A', strtotime($timings[4]['opening']));
                                                                                                                    }  ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="close_hours">Closing Hours:</label>
                            <input type="text" name="close_hours[]" id="close_hours_fri" class="form-control" value="<?php
                                                                                                                        if ($timings[4]['closing'] == '1969-12-31 18:00:00') {
                                                                                                                            echo "Closed";
                                                                                                                        } else {
                                                                                                                            echo date('h:i A', strtotime($timings[4]['closing']));
                                                                                                                        } ?>">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-1">
                        <span class="strong1">Saturday</span>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="open_hours">Opening Hours:</label>
                            <input type="text" name="open_hours[]" id="open_hours_sat" class="form-control" value="<?php
                                                                                                                    if ($timings[5]['opening'] == '1969-12-31 18:00:00') {
                                                                                                                        echo "Closed";
                                                                                                                    } else {
                                                                                                                        echo date('h:i A', strtotime($timings[5]['opening']));
                                                                                                                    }  ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="close_hours">Closing Hours:</label>
                            <input type="text" name="close_hours[]" id="close_hours_sat" class="form-control" value="<?php
                                                                                                                        if ($timings[5]['closing'] == '1969-12-31 18:00:00') {
                                                                                                                            echo "Closed";
                                                                                                                        } else {
                                                                                                                            echo date('h:i A', strtotime($timings[5]['closing']));
                                                                                                                        }  ?>">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-1">
                        <span class="strong1">Sunday</span>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="open_hours">Opening Hours:</label>
                            <input type="text" name="open_hours[]" id="open_hours_sun" class="form-control" value="<?php
                                                                                                                    if ($timings[6]['opening'] == '1969-12-31 18:00:00') {
                                                                                                                        echo "Closed";
                                                                                                                    } else {
                                                                                                                        echo date('h:i A', strtotime($timings[6]['opening']));
                                                                                                                    }
                                                                                                                    ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="close_hours">Closing Hours:</label>
                            <input type="text" name="close_hours[]" id="close_hours_sun" class="form-control" value="<?php
                                                                                                                        if ($timings[6]['closing'] == '1969-12-31 18:00:00') {
                                                                                                                            echo "Closed";
                                                                                                                        } else {
                                                                                                                            echo date('h:i A', strtotime($timings[6]['closing']));
                                                                                                                        } ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn_custom">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo view('user/template/footer'); ?>