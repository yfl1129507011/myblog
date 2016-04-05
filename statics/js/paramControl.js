
var global_param = {};

global_param.data = {};  //存储参数

//清空参数列表
global_param.clearData = function(data){
  if(data instanceof Array){
    var temp = {};
    for (var i = 0; i < data.length; i++) {
      if(this.data[data[i]] != undefined){
        temp[data[i]] = this.data[data[i]];
      }
    }
    this.data = temp;
  }else{
    this.data = {};
  }
}

//获得参数值
global_param.getData = function(key){
  if (this.data[key] != undefined) {
    return this.data[key];
  }else{
    return;
  }
}


//添加单个参数
global_param.addData = function(k, value){
  this.data[k] = value;
}


//删除参数
global_param.delData = function(key){
  if (this.data[key] != undefined) {
    delete this.data[key];
  }
}
