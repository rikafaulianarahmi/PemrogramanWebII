<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'email'    => 'admin@email.com',
            'password' => password_hash('admin123', PASSWORD_BCRYPT),
        ];

        $this->db->table('user')->insert($data);
    }
}