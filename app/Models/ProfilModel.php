<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    public function getProfil()
    {
        return [
            'nama'  => 'Rika Fauliana Rahmi',
            'nim'   => '2410817120017',
            'prodi' => 'Teknik Informatika',
            'hobi'  => 'Menonton Film, Mendengar Musik',
            'skill' => 'Memasak, Design Grafis',
            'motto' => 'YOLO'
        ];
    }
}