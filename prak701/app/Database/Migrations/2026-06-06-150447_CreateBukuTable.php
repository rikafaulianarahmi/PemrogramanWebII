<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBukuTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
            ],
            'penulis' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'penerbit' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'tahun_terbit' => [
                'type' => 'YEAR',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('buku');
    }

    public function down()
    {
        $this->forge->dropTable('buku');
    }
}