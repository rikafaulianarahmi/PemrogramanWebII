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
            'prodi' => 'Teknologi Informasi',
            'hobi'  => 'Menonton Film',
            'skill' => 'Design Grafis',
            'motto' => 'YOLO'
        ];
    }
}