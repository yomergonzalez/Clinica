<?php

class Migration_Modify_table_user extends CI_Migration {

    public function up() {
      $fields = [
            'email' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'cedula_prof' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'institucion' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'especialidad_id' => ['type' => 'INT', 'null' => FALSE],
            'consultorio' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'direccion' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'country_id' => ['type' => 'INT', 'null' => FALSE],
            'state_id' =>['type' => 'INT', 'null' => FALSE],
            'CP' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'city_id' => ['type' => 'INT', 'null' => FALSE],
            'phone' => ['type' => 'VARCHAR', 'constraint' => '15', 'null' => FALSE],
            'photo' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'logo' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],

        ];
        $this->dbforge->add_column('users', $fields);
    }

    public function down() {
      $fields = [
            'id','email','cedula_prof','institucion','especialidad_id','consultorio','direccion','country_id','state_id','CP',
            'city_id','phone','photo','logo'   ];
      $this->dbforge->drop_column('users', $fields);

    }

}
