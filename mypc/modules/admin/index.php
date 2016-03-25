<?php
defined('IN_MYPC') or die('No permission resources');
mp_base::load_app_class('admin', 'admin', 0);
/**
 *
 */
class index extends admin{

  function __construct()
  {
    parent::__construct();
    $this->db = mp_base::load_model('admin_model');
  }


  public function init(){
    $userid = $_SESSION['userid'];
    $admin_username = param::get_cookie('admin_username');
  }
  
  /**
   * 后台登录
   */
  public function login(){
      if (isset($_GET['dosubmit'])) {
        $err_msg = '';
        if (strtolower($_POST['vcode']) == strtolower($_SESSION['vcode'])) {
        	$username = trim($_POST['username']);
        	//密码错误剩余重试次数
        	$this->times_db = mp_base::load_model('times_model');
        	$rtime = $this->times_db->get_one(array('username'=>$username, 'isadmin'=>1));
        	$maxloginfailedtimes = getcache('common', 'commons');
        	$maxloginfailedtimes = (int)$maxloginfailedtimes['maxloginfailedtimes'];
        	if($rtime['times'] >= $maxloginfailedtimes){
        	    $minute = 60 - floor((SYS_TIME-$rtime['logintime'])/60);
        	    if ($minute > 0) {
        	    	$err_msg = "密码重试次数太多，请过<strong>{$minute}</strong>分钟后重新登录！";
        	    	goto LOGIN;  //goto 操作符仅在 PHP 5.3及以上版本有效
        	    }
        	}
        	//查询帐号
        	$r = $this->db->get_one(array('username'=>$username));
        	if(!$r){
        	  $err_msg = '用户名不存在！';
        	  goto LOGIN;
        	}
        	$password = md5(md5($_POST['password']));
        	if ($r['password'] != $password) {
        		$ip = ip();
        		if ($rtime && $rtime['times'] < $maxloginfailedtimes) {
        			$times = $maxloginfailedtimes - intval($rtime['times']);
        			$this->times_db->update(array('ip'=>$ip, 'isadmin'=>1, 'times'=>'+=1'), array('username'=>$username));
        		}else {  //等待一段时间后再次进行登录
        		    $this->times_db->delete(array('username'=>$username, 'isadmin'=>1));
        		    $this->times_db->insert(array('username'=>$username, 'ip'=>$ip, 'isadmin'=>1, 'logintime'=>SYS_TIME, 'times'=>1));
        		    $times = $maxloginfailedtimes;
        		}
        		$err_msg = "密码错误！还剩{$times}次登录机会";
        		goto LOGIN;
        	}
        	//登录成功
        	$this->times_db->delete(array('username'=>$username,'isadmin'=>1));
        	
        	$this->db->update(array('lastloginip'=>ip(), 'lastlogintime'=>SYS_TIME), array('userid'=>$r['userid']));
        	$_SESSION['userid'] = $r['userid'];
        	$cookie_time = SYS_TIME+86400*30; //30天时间
        	param::set_cookie('admin_username', $username, $cookie_time);
        	param::set_cookie('userid', $r['userid'], $cookie_time);
        	header('location:?m=admin&c=index');
        }else {
            $err_msg = '验证码错误！';
        }
      }
      LOGIN:
      include $this->admin_tpl('login');
  }
  
  
  /**
   * 验证码
   */
  public function code(){
      mp_base::load_sys_class('checkcode', '', 0);
  }
  
  /**
   * Ajax异步验证验证码
   */
  public function checkCode(){
      if (strtolower($_REQUEST['vcode'])==strtolower($_SESSION['vcode'])) {
          echo 1;
      	  exit();
      }else {
          echo 0;
          exit();
      }
  }
}

 ?>
