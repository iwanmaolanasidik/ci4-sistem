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
        $ajax = $this->request->getPost("ajax");
        if ($ajax == "yes") {
            $var["data"] = view("dashboard/index");
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
