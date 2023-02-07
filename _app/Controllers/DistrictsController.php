<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\DistrictsModel;
use App\Models\Bussinesses;
use App\Models\SubCategoryModel;

class DistrictsController extends BaseController
{
    public function __construct()
    {
        $session = session();
    }
    //Method for login check
    public function IsloggedIn()
    {
        $session = session();
        if (!session()->get('userid')) {
            return 0;
        } else {
            return 1;
        }
    }
    public function get_all_districts()
    {
        helper(['dubaiFunction']);
        $districtsModel = new DistrictsModel();
        $SubCategoryModel = new SubCategoryModel();
        $category_id = $this->request->getvar('category');
        $keyword = $this->request->getvar('keyword');
        $subcat_data = $SubCategoryModel->get_subcategories_search($category_id);
        $districts = $districtsModel->all_districts($category_id);
        $body = "";
        if (is_array($districts) && count($districts) > 0) {
            foreach ($districts as $district) {
                // $body .= "<a href='" . base_url() . "/businesses/" .  $keyword['subcat_slug'] . "'>" . $keyword_name . "</a><br/>";
                $body .= "<a href='" . base_url() . "/search?query=" . $keyword . "&d=" . md5($district['id']) . "&z=" . $category_id . "'>" . $district['name'] . "</a><br/>";
            }
        } else {
            $body .= "No results found";
        }
        echo $body;


        /* $subcategory_array = array();
        if (is_array($subcat_data) && count($subcat_data) > 0) {
            foreach ($subcat_data as $subcategory) {
                array_push($subcategory_array, $subcategory['sub_cat_id']);
            }
        }
        $find_keywords = $SubCategoryModel->find_keywords($subcategory_array, $keyword);

        $body = "";
        if (is_array($find_keywords) && count($find_keywords) > 0) {
            foreach ($find_keywords as $keyword) {
                if ($keyword['keyword_source'] == "1") {
                    $keyword_name = camelCase($keyword['name']);
                    $body .= "<a href='" . base_url() . "/businesses/" .  $keyword['subcat_slug'] . "'>" . $keyword_name . "</a><br/>";
                } else if ($keyword['keyword_source'] == "2") {
                    $keyword_name = slugify($keyword['name']);
                    $body .= "<a href='" . base_url() . "/business/" .  $keyword_name . "'>" . $keyword['name'] . "</a><br/>";
                }
            }
        } else {
            $body .= "No results found";
        }
        echo $body; */
    }
}
