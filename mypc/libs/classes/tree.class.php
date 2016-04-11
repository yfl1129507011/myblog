<?php
/**
* 通用的树形类，可以生成任何树形结构
*/

class tree {
  /**
  * 生成树形结构所需要的二维数据
  */
  public $arr = array();

  //生成树型结构所需修饰符号，可以换成图片
  public $icon = array('│','├','└');
  public $nbsp = "&nbsp";

  public $ret = '';

  /**
	* 构造函数，初始化类
	* @param array 2维数组，例如：
	* array(
	*      1 => array('id'=>'1','parentid'=>0,'name'=>'一级栏目一'),
	*      2 => array('id'=>'2','parentid'=>0,'name'=>'一级栏目二'),
	*      3 => array('id'=>'3','parentid'=>1,'name'=>'二级栏目一'),
	*      4 => array('id'=>'4','parentid'=>1,'name'=>'二级栏目二'),
	*      5 => array('id'=>'5','parentid'=>2,'name'=>'二级栏目三'),
	*      6 => array('id'=>'6','parentid'=>3,'name'=>'三级栏目一'),
	*      7 => array('id'=>'7','parentid'=>3,'name'=>'三级栏目二')
	*      )
	*/
  public function init($arr = array()){
    $this->arr = $arr;
    $this->ret = '';
    return is_array($arr);
  }


  /**
  * 得到父级数组
  * @param int
  * @return array
  */
  public function get_parent($mydi){
    $newarr = array();
    if(!isset($this->arr[$myid])) return false;
    $pid = $this->arr[$myid]['pid'];
    $pid = $this->arr[$pid]['pid'];
    if (is_array($this->arr)) {
      foreach ($this->arr as $id => $a) {
        if ($a['pid'] == $pid) {
          $newarr[$id] = $a;
        }
      }
    }

    return $newarr;
  }


}
 ?>
