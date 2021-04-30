<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_category'          => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'category_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '250'
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id_category', TRUE);

		// Membuat tabel news
		$this->forge->createTable('category', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('category');
	}
}
