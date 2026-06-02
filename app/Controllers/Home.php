<?php

namespace App\Controllers;

use App\Models\ProfilModel;

class Home extends BaseController
{
    protected $profilModel;

    public function __construct()
    {
        $this->profilModel = new ProfilModel();
    }

    // Halaman Beranda
    public function index()
    {
        $data = [
            'profil' => $this->profilModel->getProfil()
        ];
        return view('beranda', $data);
    }

    // Halaman Profil
    public function profil()
    {
        $data = [
            'profil' => $this->profilModel->getProfil()
        ];
        return view('profil', $data);
    }
}