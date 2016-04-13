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
  public $icon = '--';
  public $nbsp = "&nbsp;&nbsp;";

  public $ret = '';

  /**
	* 构造函数，初始化类
	* @param array 2维数组，例如：
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


  /**
	* 递归方式得到树型结构
	* @param int ID，表示获得这个ID下的所有子级
  * @param int level 等级标识
	* @param string 中文名称的数据库字段名称
	* @param string id标识的数据库字段名称
	* @return string
	*/
	public function get_tree_by_recur($myid=0, $level=0, $cname='cname', $id='id'){
    $result = array();

    foreach ($this->arr as $key => $value) {
      if($value['pid'] == $myid){
        $value['level_id'] = $level;
        $value[$cname] = str_repeat($this->nbsp, $level) . $this->icon . $value[$cname];
        $result[] = $value;

        $result = array_merge($result, $this->get_tree_by_recur($value[$id], $level+1, $cname, $id));
      }
    }

    return $result;
  }



  /**
	* 堆栈方式得到树型结构
	* @param int ID，表示获得这个ID下的所有子级
  * @param int level 等级标识
	* @param string 中文名称的数据库字段名称
	* @param string id标识的数据库字段名称
	* @return string
	*/
	public function get_tree_by_stack($myid=0, $level=0, $cname='cname', $id='id'){
    $stack = array();   //栈存储空间
    $result = array();

    foreach ($this->arr as $key => $value) {
      if($myid == $value['pid']){
        $value['level_id'] = $level;
        array_push($stack, $value);  //进栈
        unset($this->arr[$key]);
      }
    }

    while (0 < count($stack)) {
      $node = array_pop($stack);  //出栈
      foreach($this->arr as $key => $value){
        if ($node[$id] == $value['pid']) {
          $value['level_id'] = $node['level_id']+1;
          $value[$cname] = str_repeat($this->nbsp, $value['level_id']) . $this->icon . $value[$cname];
          array_push($stack, $value);  //进栈
          unset($this->arr[$key]);
        }
      }
      $result[] = $node;
    }

    return $result;
  }


}
 ?>
