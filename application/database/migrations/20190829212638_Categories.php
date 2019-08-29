<?php

class Migration_Categories extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'id'              => array(
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			),
			'description'     => array(
				'type'       => 'VARCHAR',
				'constraint' => 100,
			)
			,
			'created_from_ip' => array(
				'type'       => 'VARCHAR',
				'constraint' => 100,
			),
			'updated_from_ip' => array(
				'type'       => 'VARCHAR',
				'constraint' => 100,
			)
			,
			'date_created'    => array(
				'type' => 'DATETIME',
			),
			'date_updated'    => array(
				'type' => 'DATETIME',
			),
		));
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('categories');
	}

	public function down() {
		$this->dbforge->drop_table('categories');
	}
}
