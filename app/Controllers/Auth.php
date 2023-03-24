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

    public function proses_login(){
        $user = new AuthModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        //cek username
        $dataUser = $user->where(['username' => $username])->first();
        // var_dump($dataUser); die;
        if($dataUser){//ada user
            if(password_verify($password, $dataUser["password"])){
                //password benar
                //active tidak?

                //buat session
                // session()->set([
                //     'name'      => $dataUser->name,
                //     'username'  => $dataUser->username,
                //     'email'     => $dataUser->email,
                //     'photo'     => $dataUser->photo,
                //     'active'    => $dataUser->active,
                //     'role_id'   => $dataUser->role_id
                // ]);
                //return response json true
                $var["login"] = true;
                $var["info"] = "Berhasil login.";

            }else{
                //return password salah
                $var["gagal"] = 'password';
                $var["info"] = "Password salah.";
            }
        }else{
            //return alert username tidak terdaftar
            $var["gagal"] = 'username';
            $var["info"] = "Username tidak terdaftar.";
        }
        return json_encode($var);
        
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
                "password" => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                "active" => 1, //active
                "role_id" => 1, //administrator
                "created_at" => date("Y-m-d H:i:s"),
                "update_at" => null,
            ]);
            $var["info"] = "Akun berhasil di buat.";

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

}
