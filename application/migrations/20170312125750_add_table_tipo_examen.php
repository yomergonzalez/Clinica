<?php


class Migration_Add_table_tipo_examen extends CI_Migration {


    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => FALSE],
            'name' => ['type' => 'VARCHAR', 'constraint' => '300', 'null' => false],
            
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tipo_examen');
    }

    public function down() {
        $this->dbforge->drop_table('tipo_examen', TRUE);
    }