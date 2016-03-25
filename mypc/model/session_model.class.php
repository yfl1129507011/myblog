<?php
defined('IN_MYPC') or exit('No permission resources.');
mp_base::load_sys_class('model', '', 0);

class session_model extends model {
  public function __construct(){
    $this->db_config = mp_base::load_config('database');
    $this->db_setting = 'default';
    $this->table_name = 'session';
    parent::__construct();
  }
}
?>