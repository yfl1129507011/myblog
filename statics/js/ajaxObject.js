var objAjax = {};

//请求ajax通用方法，params为参数,type为dataType类型，fn回调
objAjax.commonFn = function(params, type, fn){
  var url = 'index.php?';
  $.ajax({
    type:'post',
    url:url,
    data:params.data,
    dataType:type
  }).done(function(data){
    fn(data);
  });
}
