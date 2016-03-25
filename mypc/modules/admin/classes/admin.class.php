<?php
defined('IN_MYPC') or die('No permission resources');
$session_storage = 'session_' . mp_base::load_config('system','session_storage');
mp_base::load_sys_class($session_storage);
//定义后台标识
define('IN_ADMIN', true);

class admin{
    public function __construct(){
        
    }
    
    /**
     * 判断用户是否已经登录
     */
    final public function check_admin(){
        if (ROUTE_M == 'admin' && ROUTE_C == 'index' && in_array(ROUTE_A, array('login', 'public_card'))) {
        	return true;
        }else {
            $userid = param::get_cookie('userid');
        }
    }
    
    
    /**
     * 加载后台模板
     * @param string $file 文件名
     * @param string $m 模型名
     */
    final public static function admin_tpl($file, $m=''){
        $m = empty($m) ? ROUTE_M : $m;
        if (empty($m)) {
        	return false;
        }
        
        return MP_PATH.'modules'.DIRECTORY_SEPARATOR.$m.DIRECTORY_SEPARATOR.'tpls'.DIRECTORY_SEPARATOR.$file.'.tpl.php';
    }
}
?>