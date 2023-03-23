<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class Auth extends ResourceController
{
    public function __construct(){
        
    }

    public function login()
    {
       return view('auth/login');
    }

    public function registrasi()
    {
        return view('auth/registrasi');
    }

    public function proses_registrasi()
    {
        // validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name'=>[
                'label' => 'Nama',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => '{field} harusa di isi.',
                    'min_length' => '{field} minimal 3 karakter.'
                ]
            ],
            'username'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika valid
        if($isDataValid){
            $var["info"] = "data insert";
        }else{
            $var["gagal"] = false;
            $var["info"] = \Config\Services::validation()->getError('name');
        }

        return json_encode($var);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
