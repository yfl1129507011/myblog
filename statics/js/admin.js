
function clickMenu(id){
	//alert(id);
	var menuArr = new Array('start','goods','account','user','member','attestation');
	/*var menuObj = document.getElementById('menu');
	var count = menuObj.getElementsByTagName('li').length;
	alert(menuObj.childNodes.length);*/
	for(var i=0; i<menuArr.length; i++){
		document.getElementById(menuArr[i]).style.backgroundColor = "";
		document.getElementById(menuArr[i]).style.color = "";
		document.getElementById(menuArr[i]+"_list").style.display = "none";
		//alert(document.getElementById(menuArr[i]+"_list").id);
	}

	document.getElementById(id).style.backgroundColor = "#09C"
	document.getElementById(id).style.color = "white";
	document.getElementById(id+"_list").style.display = "block";
}

function checkall(){
    //获取id属性为box的table元素对象
    var tableObj = document.getElementById('box');
    //table元素下所有的tr行元素对象
    var trObjArr = tableObj.rows;
    //alert(trObjArr[1].cells[0].firstChild.checked);
    for(var i=1; i<trObjArr.length; i++){
        //获取每行的第一列元素对象
        var boxObj = trObjArr[i].cells[0].firstChild;
        if(boxObj.checked == ''){
            boxObj.checked = 'checked';
        }else{
            boxObj.checked = '';
        }
    }
}


$(function(){
    //商品添加中的标签切换效果
    $('#goods_li li').click(function(){
        $('#goods_li li').removeClass('active');  //清除所有li的'active'class属性值
        $(this).addClass('active'); //为当前的li添加class属性值为'active'
        
        var attr = $(this).attr('attr');
        $('div[id$=_field]').hide('slow');
        $('#'+attr+'_field').show('slow');
    });
});
    
//增加图片元素
var num=2;
function addImg(obj){
    var src = obj.parentNode.parentNode;
    
	var des = src.cloneNode(true);  //复制src元素节点,并通过传入true来深度复制
	$(des).find('span').attr('onclick', '$(this).parent().parent().remove()').text('-');
	$(des).find('.field input').attr('id',num);
	$(des).find('.field div').attr('id', 'div_'+num);
	$(des).find('.field img').attr('id', 'pics_'+num)
	$(des).find('img').removeAttr('src');
	
	$(src.parentNode).append($(des));
	
	//为增加的相册设置"选中图片显示效果"功能
    new uploadPreview({ UpBtn: num, DivShow: "div_"+num, ImgShow: "pics_"+num });
    num++;
}

//ajax删除图片元素和物理图片
function delImg(obj, picsId){
    if(confirm('确认要删除该图片吗？')){
        //console.log(CONTROL);
        $.ajax({
            url:CONTROL+"/delPic",
            data:{'id':picsId},
            type:'get',
            //dataType:,
            success:function(msg){
                //清除页面img标签
                if(msg){
                    $(obj).parent().remove();
                }
            }
        });
    }
}
    
//删除提示
function del(url){
    if(confirm('确认删除')){
        location.href = url;
    }
}

//ajax异步获取'类型属性'信息
function show_attrs(url){
    //console.log(url);
    var type_id = $('select[name=type_id] option:selected').val()  //获取选中的ID值
    $.ajax({
        url:url+'getAttrInfo',
        data:{'type_id':type_id},
        dataType:'json',
        success:function(msg){
            //console.log(msg);
            var html = '';
            $.each(msg, function(k,v){
                html += '<div class="form-list">';
                html += '<div class="label" style="width:25%"><label for="">'+v.name+'</label></div>';
                html += '<div class="field">';
                if(v.attr_input_type != 1){
                    html += '<input class="input" type="text" name="attr_value_list[]" />';
                }else{
                    html += '<select name="attr_value_list[]">';
                    html += '<option value="">请选择...</option>'
                    $.each(v.attr_value, function(kk, vv){
                        html += '<option value="'+vv+'">'+vv+'</option>';
                    })
                    html += '</select>'
                }
                html += '</div></div>';
            })
            $('select[name=type_id]').parents('#properties_field').find('.form-list:gt(0)').remove();
            $('select[name=type_id]').parents('#properties_field').append(html);
        }
    });
}