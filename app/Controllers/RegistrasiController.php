<?php

namespace App\Controllers;
use App\Models\MRegistrasi;
use CodeIgniter\RESTful\ResourceController;

class RegistrasiController extends ResourceController
{
    protected $format = 'json';
    public function registrasi()
    {
    $data = [
       'nama' => $this->request->getVar('nama'),
       'email' => $this->request->getVar('email'),
       'password' => password_hash($this->request->getVar('password'),
       PASSWORD_DEFAULT)
    ];

    $model = new MRegistrasi();
    $model->save($data);
    return $this->respondCreated($data);
    }
}