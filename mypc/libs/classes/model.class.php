<?php
/**
* model.class.php  数据模型基类
*/
defined('IN_MYPC') or exit('Access Denied');

mp_base::load_sys_class('db_factory', '', 0);

class model{
  //数据库配置
  protected $db_config = '';

  //数据库连接
  protected $db = '';

  //调用数据库的配置项
  protected $db_setting = 'default';

  //数据表名
  protected $table_name = '';

  //表前缀
  public $db_tablepre = '';


  //构造函数
  public function __construct(){
    if (!isset($this->db_config[$this->db_setting])) {
      $this->db_setting = 'default';
    }
    //表名
    $this->table_name = $this->db_config[$this->db_setting]['tablepre'] . $this->table_name;
    //表前缀
    $this->db_tablepre = $this->db_config[$this->db_setting]['tablepre'];
    //数据库连接实例
    $this->db = db_factory::get_instance($this->db_config)->get_database($this->db_setting);
  }


	/**
	 * 执行sql查询
	 * @param $where 		查询条件[例`name`='$name']
	 * @param $data 		需要查询的字段值[例`name`,`gender`,`birthday`]
	 * @param $limit 		返回结果范围[例：10或10,10 默认为空]
	 * @param $order 		排序方式	[默认按数据库默认方式排序]
	 * @param $group 		分组方式	[默认为空]
	 * @param $key          返回数组按键名排序
	 * @return array		查询结果集数组
	 */
   final public function select($where='', $data='*', $limit='', $order = '', $group = '', $key=''){
     if (is_array($where)) $where = $this->sqls($where);
		 return $this->db->select($data, $this->table_name, $where, $limit, $order, $group, $key);
   }


	/**
	 * 获取单条记录查询
	 * @param $where 		查询条件
	 * @param $data 		需要查询的字段值[例`name`,`gender`,`birthday`]
	 * @param $order 		排序方式	[默认按数据库默认方式排序]
	 * @param $group 		分组方式	[默认为空]
	 * @return array/null	数据查询结果集,如果不存在，则返回空
	 */
	final public function get_one($where = '', $data = '*', $order = '', $group = '') {
		if (is_array($where)) $where = $this->sqls($where);
		return $this->db->get_one($data, $this->table_name, $where, $order, $group);
	}


	/**
	 * 直接执行sql查询
	 * @param $sql							查询sql语句
	 * @return	boolean/query resource		如果为查询语句，返回资源句柄，否则返回true/false
	 */
	final public function query($sql) {
		//$sql = str_replace('phpcms_', $this->db_tablepre, $sql);
		return $this->db->query($sql);
	}


	/**
	 * 执行添加记录操作
	 * @param $data 		要增加的数据，参数为数组。数组key为字段值，数组值为数据取值
	 * @param $return_insert_id 是否返回新建ID号
	 * @param $replace 是否采用 replace into的方式添加数据
	 * @return boolean
	 */
	final public function insert($data, $return_insert_id = false, $replace = false) {
		return $this->db->insert($data, $this->table_name, $return_insert_id, $replace);
	}


	/**
	 * 获取最后一次添加记录的主键号
	 * @return int
	 */
	final public function insert_id() {
		return $this->db->insert_id();
	}


	/**
	 * 执行更新记录操作
	 * @param $data 		要更新的数据内容，参数可以为数组也可以为字符串，建议数组。
	 * 						为数组时数组key为字段值，数组值为数据取值
	 * 						为字符串时[例：`name`='phpcms',`hits`=`hits`+1]。
	 *						为数组时[例: array('name'=>'phpcms','password'=>'123456')]
	 *						数组的另一种使用array('name'=>'+=1', 'base'=>'-=1');程序会自动解析为`name` = `name` + 1, `base` = `base` - 1
	 * @param $where 		更新数据时的条件,可为数组或字符串
	 * @return boolean
	 */
	final public function update($data, $where = '') {
		if (is_array($where)) $where = $this->sqls($where);
		return $this->db->update($data, $this->table_name, $where);
	}


	/**
	 * 执行删除记录操作
	 * @param $where 		删除数据条件,不充许为空。
	 * @return boolean
	 */
	final public function delete($where) {
		if (is_array($where)) $where = $this->sqls($where);
		return $this->db->delete($this->table_name, $where);
	}


	/**
	 * 计算记录数
	 * @param string/array $where 查询条件
	 */
	final public function count($where = '') {
		$r = $this->get_one($where, "COUNT(*) AS num");
		return $r['num'];
	}


	/**
	 * 将数组转换为SQL语句
	 * @param array $where 要生成的数组
	 * @param string $font 连接串。
	 */
	final public function sqls($where, $font = ' AND ') {
		if (is_array($where)) {
			$sql = '';
			foreach ($where as $key=>$val) {
				$sql .= $sql ? " $font `$key` = '$val' " : " `$key` = '$val'";
			}
			return $sql;
		} else {
			return $where;
		}
	}
}
 ?>
