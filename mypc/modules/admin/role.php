<?php
defined('IN_MYPC') or exit('No permission resources.');
pc_base::load_app_class('admin', 'admin', 0);

class role extends admin{
  private $db, $priv_db;

  function __construct(){
    parent::__construct();
    $this->db = mp_base::load_model('admin_role_model');
  }


  /**
  * 角色管理列表
  */
  public function init(){
    $infos = $this->db->select($where='', $data='*', $limit='', $order='listorder DESC, roleid DESC', $group='');
  }
}
 ?>
