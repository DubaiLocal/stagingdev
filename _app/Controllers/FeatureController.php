<?php

namespace App\Controllers;

use App\Models\Feature;

class FeatureController extends BaseController
{
    public function __construct()
    {
        $session = session();
    }
    public function index()
    {
        $FeatureModel = new Feature();
        $paginateData = $FeatureModel->select('*')->paginate(10);
        $data = [
            'features' => $paginateData,
            'pager' => $FeatureModel->pager,
        ];
        return view('admin/featured/index', $data);
    }
    public function IsloggedIn()
    {
        $session = session();
        if (!session()->get('userid')) {
            return 0;
        } else {
            return 1;
        }
    }
    public function create()
    {
        if ($this->IsloggedIn()) {
            $data['add_cat'] = "active";
            return view('admin/featured/add_feature', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    public function save()
    {
        $session = session();
        $FeatureModel = new Feature();
        $name = $this->request->getvar('name');
        $isactive = $this->request->getvar('is_active');
        $save = $FeatureModel->add_feature($name, $isactive);
        if ($save) {
            $session->setFlashdata('success_save', 'Added Successfully');
            return redirect()->to(base_url() . '/admin/featured');
        } else {
            $session->setFlashdata('error_save', 'Error inserting');
            return redirect()->to(base_url() . '/admin/featured/create');
        }
    }
    public function edit($id = null)
    {
        if ($this->IsloggedIn()) {
            $FeatureModel = new Feature();
            $data['feature'] = $FeatureModel->edit($id);
            $data['hash_id'] = $id;
            return view('admin/featured/edit_feature', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    public function update($id)
    {
        $session = session();
        $FeatureModel = new Feature();
        $id = $this->request->getvar('id');
        $name = $this->request->getvar('name');
        $isactive = $this->request->getvar('is_active');
        $result = $FeatureModel->update_feature($id, $name, $isactive);
        if ($result) {
            $session->setFlashdata('success_save', 'Done updating');
            return redirect()->to(base_url() . '/admin/featured');
        } else {
            $session->setFlashdata('error_save', 'Error updating');
            redirect($_SERVER['REQUEST_URI'], 'refresh');
        }
    }
    public function update_feature_status()
    {
        $session = session();
        $userid = $this->request->getvar('UserId');
        $status = ($this->request->getvar('status') == 1) ? 0 : 1;
        $FeatureModel = new Feature();
        $update = $FeatureModel->update_feature_status($userid, $status);
        if ($update) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
