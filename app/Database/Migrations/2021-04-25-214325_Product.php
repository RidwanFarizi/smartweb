<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'id_category'          => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true
			],
			'id_users'          => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '250'
			],
			'type'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'size' => [
				'type'           => 'INT',
				'constraint'     => '10',
			],
			'image' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'ob' => [
				'type'           => 'int',
				'constraint'     => '100',
			],
			'inc' => [
				'type'           => 'int',
				'constraint'     => '100',
			],
			'description' => [
				'type'           => 'VARCHAR',
				'constraint'     => '250',
			],

			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'update_at DATETIME DEFAULT CURRENT_TIMESTAMP'
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('product', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('product');
	}
}
