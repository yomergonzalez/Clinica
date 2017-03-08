<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faker_seeds extends CI_Controller {

    private $faker;

    public function __construct() {
        parent::__construct();
        if (!$this->input->is_cli_request()) {
            exit( 'no se puede desde el navegador');
        }
        if (ENVIRONMENT != 'development') {
            exit('solo valido para desarrollos');
        }
        $this->faker = Faker\Factory::create();
    }

    public function users() {
        echo 'seeding users table users'.PHP_EOL;
        $this->db->truncate('users');
        for ($i = 0; $i < 200; $i++) {
            $data = [
                'clasificacionid' => $this->faker->randomNumber(1),
                'names' => $this->faker->firstName,
                'surnames' => $this->faker->lastName,
                'email' => $this->faker->email,
                'pass' => $this->faker->password,
                'name_org' => $this->faker->name_org,
                'tlf' => $this->faker->phoneNumber
            ];

            $this->db->insert('users', $data);
            echo 'User ' . $this->db->insert_id().''.PHP_EOL;
        }
        echo 'seeding users complete';
    }

}
