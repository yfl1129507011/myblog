<?php
defined('IN_MYPC') or exit('No permission resources.');
mp_base::load_sys_class('model', '', 0);

class times_model extends model {
    public function __construct(){
        $this->db_config = C('database');
        $this->db_setting = 'default';
        $this->table_name = 'times';
        parent::__construct();
    }
}
?>