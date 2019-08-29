<?php

class BrandsSeeder extends Seeder {

	private $table = 'brands';

	public function run() {
		$this->db->truncate($this->table);

		//seed many records using faker
		$limit = 13;
		echo "seeding $limit brands";

		for ($i = 0; $i < $limit; $i++) {
			echo ".";

			$data = array(
				'description'     => $this->faker->unique()->word,
				'created_from_ip' => $this->faker->ipv4,
				'updated_from_ip' => $this->faker->ipv4,
				'date_created'    => $this->faker->date($format = 'Y-m-d'),
				'date_updated'    => $this->faker->date($format = 'Y-m-d'),
			);

			$this->db->insert($this->table, $data);
		}

		echo PHP_EOL;
	}
}
