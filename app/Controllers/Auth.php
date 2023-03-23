<?php

namespace App\Controllers;

use \App\Models\AuthModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Exceptions\PageNotFoundException;

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
                    'required' => '{field} harus di isi.',
                    'min_length' => '{field} minimal 3 karakter.'
                ]
            ],
            'username'=>[
                'label' => 'Username',
                'rules' => 'required|min_length[4]|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'min_length' => '{field} minimal 4 karakter.',
                    'is_unique' => '{field} sudah digunakan, silahkan ganti.'
                ]
            ],
            'email'=>[
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'valid_email' => '{field} tidak valid.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'password'=>[
                'label' => 'Password',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'min_length' => '{field} minimal 6 karakter.'
                ]
            ],
            'password2'=>[
                'label' => 'Retype Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'matches' => '{field} tidak sama.'
                ]
            ],
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika valid
        if($isDataValid){
            $user = new AuthModel();
            $user->insert([
                "name" => $this->request->getPost('name'),
                "username" => $this->request->getPost('username'),
                "email" => $this->request->getPost('email'),
                "photo" => 'default.jpg',
                "password" => $this->request->getPost('password'),
                "active" => 1, //active
                "role_id" => 1, //administrator
                "created_at" => date("Y-m-d H:i:s"),
                "update_at" => null,
            ]);
            $var["info"] = "Data berhasil di simpan.";

        }else{
            $var["gagal"] = false;
            $var["error"] = [
                'name' => $validation->getError('name'),
                'username' => $validation->getError('username'),
                'email' => $validation->getError('email'),
                'password' => $validation->getError('password'),
                'password2' => $validation->getError('password2')
            ];
            $var["info"] = $validation->listErrors();
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
