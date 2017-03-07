<?php class Migration_Modify_table_user extends CI_Migration {

    public function up() {
      $fields = [
            'clasification_id' => ['type' => 'INT', 'null' => FALSE],
        ];
        $this->dbforge->add_column('users', $fields);
    }

    public function down() {
      $this->dbforge->drop_column('users', 'clasification_id');

    }

}
