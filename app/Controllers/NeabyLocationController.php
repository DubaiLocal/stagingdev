<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\NeabyLocationModel;
use App\Models\Bussinesses;

class NeabyLocationController extends BaseController
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
    public function nearby_location_listing()
    {
        $NeabyLocationModel = new NeabyLocationModel();
        $district_id = $this->request->getvar('id');
        $nearby_locations = $NeabyLocationModel->search_nearby_location_listing($district_id);
        $body = "";
        if (is_array($nearby_locations) && count($nearby_locations) > 0) {
            foreach ($nearby_locations as $nearby_location) {
                $body .= "<option value='" . $nearby_location['id'] . "'>" . $nearby_location['name'] . "</option>";
            }
        } else {
            $body = "<option value=''>No Locations found, Please select another district</option>";
        }
        echo $body;
    }
}
