<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bid extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_bid'          => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true
			],
			'id_users'          => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true
			],
			'id_product'          => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true
			],
			'bid_price'       => [
				'type'           => 'INT',
				'constraint'     => '10'
			],
			'bid_at'      => [
				'type'           => 'DATETIME',
			],
			'bid_finish'      => [
				'type'           => 'DATETIME',
			]
		]);

		// Membuat primary key
		$this->forge->addKey('id_bid', TRUE);

		// Membuat tabel news
		$this->forge->createTable('bid', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('bid');
	}
}
