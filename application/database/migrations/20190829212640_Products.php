<?php

class Migration_Products extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'id'                => array(
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			),
			'name'              => array(
				'type'       => 'VARCHAR',
				'constraint' => 100,
			)
			,
			'category_id'       => array(
				'type'       => 'INT',
				'constraint' => 11,
			)
			,
			'brand_id'          => array(
				'type'       => 'INT',
				'constraint' => 11,
			)
			,
			'model'             => array(
				'type'       => 'VARCHAR',
				'constraint' => 150,
			)
			,
			'tag_line'          => array(
				'type'       => 'VARCHAR',
				'constraint' => 250,
			)
			,
			'features'          => array(
				'type'       => 'VARCHAR',
				'constraint' => 350,
			)
			,
			'price'             => array(
				'type'       => 'INT',
				'constraint' => 11,
			)
			,
			'qty_at_hand'       => array(
				'type'       => 'INT',
				'constraint' => 11,
			)
			,
			'editorial_reviews' => array(
				'type'       => 'VARCHAR',
				'constraint' => 750,
			)
			,
			'created_from_ip'   => array(
				'type'       => 'VARCHAR',
				'constraint' => 100,
			),
			'updated_from_ip'   => array(
				'type'       => 'VARCHAR',
				'constraint' => 100,
			)
			,
			'date_created'      => array(
				'type' => 'DATETIME',
			),
			'date_updated'      => array(
				'type' => 'DATETIME',
			),
		));
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('products');
	}

	public function down() {
		$this->dbforge->drop_table('products');
	}
}
