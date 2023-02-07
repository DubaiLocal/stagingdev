<?php

namespace App\Controllers;

use App\Models\BussinessesModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\Users;
use App\Models\FeatureModel;
use App\Models\DistrictsModel;
use App\Models\NeabyLocationModel;

class BussinessController extends BaseController
{
    /* Method for update bussiness data */
    public function update($id)
    {
        if ($this->IsloggedIn()) {
            $session = session();
            helper(['form', 'url', 'dubaiFunction']);
            $logo = "";
            $logo_input = $this->validate([
                'logo' => [
                    'uploaded[logo]',
                    'mime_in[logo,image/jpg,image/jpeg,image/png,image/svg]',
                    'max_size[logo,2048]',
                ]
            ]);
            if ($logo_input) {
                $db = \Config\Database::connect();
                $builder_unlink = $db->table('business');
                $builder_unlink->select('logo');
                $builder_unlink->where("md5(id)", $id);
                $query = $builder_unlink->get();
                $result = $query->getResultArray();
                if ($result[0]['logo'] != "") {
                    if (file_exists('assets/logo/' . $result[0]['logo'])) {
                        unlink('assets/logo/' . $result[0]['logo']);
                        unlink('assets/subcategory-business-thumbnail/' . $result[0]['logo'] . '-275x220');
                        unlink('assets/business-thumbnail/' . $result[0]['logo'] . '-590x375');
                    }
                }
                $img = $this->request->getFile('logo');
                $logo = $img->getRandomName();
                $subcategory_thumbnail = \Config\Services::image()->withFile($img)->resize(275, 220, true, 'height')->save('assets/subcategory-business-thumbnail/' . $logo . '-275x220');
                $banner_thumbnail = \Config\Services::image()->withFile($img)->resize(590, 375, true, 'height')->save('assets/business-thumbnail/' . $logo . '-590x375');
                $img->move('assets/logo', $logo);
            }
            $more_images = "";
            $validated = $this->validate([
                'more_images' => [
                    'uploaded[more_images]',
                    'mime_in[more_images,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[more_images,10240]',
                ],
            ]);
            $filePreviewName = array();
            if (!$validated) {
                $session->setFlashdata('error_save', 'Error Saving more image');
                return redirect()->to(base_url() . '/bussiness/create/');
            } else {
                // Grab the file by name given in HTML form
                $files = $this->request->getFileMultiple('more_images');
                foreach ($files as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $newName = $file->getRandomName();
                        $file->move('assets/more_images', $newName);
                        array_push($filePreviewName, $newName);
                    }
                }
            }
            if (count($filePreviewName) != 0) {
                $more_images =  implode(",", $filePreviewName);
            }
            $business = new BussinessesModel();
            $id = $this->request->getvar('id');
            $featured = $this->request->getvar('featured');
            $name = $this->request->getvar('name');
            $slug = slugify($name);
            $category_id = $this->request->getvar('category_id');
            $subcategory_id = $this->request->getvar('subcategory_id');
            $district = $this->request->getvar('district');
            $nearby_location = $this->request->getvar('nearby_loc');
            $description = $this->request->getvar('Description');
            $url = $this->request->getvar('unique_url');
            $address = $this->request->getvar('address');
            $email = $this->request->getvar('email');
            $num_rating = $this->request->getvar('num_rating');
            $aeverage_rating = $this->request->getvar('aeverage_rating');
            $phone = $this->request->getvar('phone');
            $pending = $this->request->getvar('pending');
            $lat = $this->request->getvar('lat');
            $lng = $this->request->getvar('lng');
            $status = "1";
            /*----------- Create json for timings of business------------ */

            $full_timing_array = array();
            $full_timing = array();
            $open_hours = $this->request->getPost('open_hours');
            $close_hours = $this->request->getvar('close_hours');
            for ($i = 0; $i < sizeof($open_hours); $i++) {
                $full_timing = array(
                    'opening' => date('Y-m-d H:i:s', strtotime($open_hours[$i])),
                    'closing' => date('Y-m-d H:i:s', strtotime($close_hours[$i]))
                );
                array_push($full_timing_array, $full_timing);
            }
            $full_timing_array =  json_encode($full_timing_array);

            /*---------------End Create json for timings of business----------- */




            $update_business = $business->update_business($id, $featured, $Name, $slug, $district, $nearby_location, $Description, $address, $unique_url);


            $update_business = $business->update_bussiness($featured, $name, $slug, $district, $nearby_location, $description, $address, $url, $status);
            if ($save_business) {
                $save_business_detail = $business->add_bussiness_details($save_business, $email, $phone, $logo, $lat, $lng, $more_images, $full_timing_array, $num_rating, $aeverage_rating);
                if ($save_business_detail) {
                    $save_business_cat_subcat = $business->save_business_cat_subcat($save_business, $category_id, $subcategory_id);
                    if ($save_business_cat_subcat) {
                        $session->setFlashdata('success_save', 'Done updating');
                        return redirect()->to(base_url() . '/bussiness/edit/' . $this->request->uri->getSegment(3));
                    } else {
                        $session->setFlashdata('error_save', 'Error updating');
                        return redirect()->to(base_url() . '/bussiness/edit/' . $this->request->uri->getSegment(3));
                    }
                }
            }



            if ($result) {
                $session->setFlashdata('success_save', 'Done updating');
                return redirect()->to(base_url() . '/bussiness/edit/' . $this->request->uri->getSegment(3));
            } else {
                $session->setFlashdata('error_save', 'Error updating');
                return redirect()->to(base_url() . '/bussiness/edit/' . $this->request->uri->getSegment(3));
                // return redirect()->to(base_url() . '/bussiness/listing');
            }
        } else {
            return redirect()
                ->to(base_url() . '/admin/login');
        }
    }
}
