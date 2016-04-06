<?php
defined('IN_MYPC') or exit('No permission resources.');
mp_base::load_app_class('admin', 'admin', 0);

class menu extends admin{
  public function __construct(){
    parent::__construct();
    $this->db = mp_base::load_model('menu_model');
  }


  //菜单列表
  public function init(){
    include $this->admin_tpl('menu');
  }

  //添加菜单
  public function add(){
    include $this->admin_tpl('menu');
  }

  //编辑菜单
  public function edit(){
    include $this->admin_tpl('menu');
  }

  //删除菜单
  public function delete(){
    
  }
}
 ?>
