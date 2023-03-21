<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    function _template($data)
    {
        echo view('temp_back/content', $data);
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['subTitle'] = "Sub title";
        //$data['subTitle2'] = "Sub title 2";
        $ajax = $this->request->getPost("ajax");
        if ($ajax == "yes") {
            $var["data"] = view("dashboard/index", $data);
            return $this->response->setJSON($var);
        } else {
            $data['content'] = "dashboard/index";
            $this->_template($data);
        }
    }
    public function profil()
    {
        $ajax = $this->request->getPost("ajax");
        if ($ajax == "yes") {
            $var["data"] = view("dashboard/profil");
            return $this->response->setJSON($var);
        } else {
            $data['content'] = "dashboard/profil";
            $this->_template($data);
        }
    }
}
