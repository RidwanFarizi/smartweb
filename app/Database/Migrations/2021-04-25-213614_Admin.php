<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_admin'          => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'admin_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '250'
			],
			'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '250'
			],
			'password'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'address'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'phone_number'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '15',
			],
			'email'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'update_at DATETIME DEFAULT CURRENT_TIMESTAMP'
		]);

		// Membuat primary key
		$this->forge->addKey('id_admin', TRUE);

		// Membuat tabel news
		$this->forge->createTable('admin', TRUE);
	}
	public function down()
	{
		$this->forge->dropTable('admin');
	}
}
