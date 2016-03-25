//登录验证 1为空 2为错误
var validate = {username:1,password:1,verify:1};
var msg = "";  //验证信息
$(function(){
    $('#login').submit(function(){
        if(validate.admin_name==0 && validate.password==0 && validate.verify==0){
            return true;
        }
        //验证用户名
        $("input[name='username']").trigger('blur');
        //验证密码
        $("input[name='password']").trigger('blur');
        //验证验证码
        $("input[name='vcode']").trigger('blur');
        
        return false;
    });
    
    $('input[type!=submit]').focus(function(){
        $(this).parent().attr('class','focus');
    })
    
    //验证用户名
    $('input[name=username]').blur(function(){
        var admin_name = $(this).val().trim();  //输入账户信息
        var div = $('#user');
        
        if(admin_name == ''){
            msg = '用户名不能为空';
            $(this).parent().attr('class','error');
            div.html(msg).css({
                color:'red',
                fontSize:'14px',
                'padding-left':'66px'
            });
            validate.admin_name = 1;
            return;
        }
        
        msg = '';
        $(this).parent().attr('class','success');
        div.html(msg);
        validate.admin_name = 0;
    });
    
    //验证密码
    $('input[name=password]').blur(function(){
        var pwd = $(this).val();
        var div = $('#pwd');
        
        if(pwd == ''){
            msg = '密码不能为空';
            $(this).parent().attr('class','error');
            div.html(msg).css({
                color:'red',
                fontSize:'14px',
                'padding-left':'66px'
            });
            validate.password = 1;
            return;
        }
        
        msg = '';
        $(this).parent().attr('class','success');
        div.html(msg);
        validate.password = 0;
    });
    
    
    //验证验证码
    $('input[name=vcode]').blur(function(){
        var vcode = $(this).val().trim();
        var div = $('#verify');
        
        if(vcode == ''){
            msg = '验证码不能为空';
            $(this).parent().attr('class','error');
            div.html(msg).css({
                color:'red',
                fontSize:'14px',
                'padding-left':'66px'
            });
            validate.verify = 1;
            return;
        }
        
    }).keyup(function(){
        var vcode = $(this).val().trim();
        var div = $('#verify');
        if(vcode.length == 4){
             //异步验证验证码
            $.ajax({
                url:'index.php?m=admin&c=index&a=checkCode', 
                data:{'vcode':vcode},
                //dateType:'html',
                type:'post',
                success:function(status){
                    //console.log(status);return false;
                    if(status == 1){
                        msg = '';
                        $('input[name=vcode]').parent().attr('class','success');
                        div.html(msg);
                        validate.verify = 0;
                        return;
                    }else{
                        msg = '验证码错误';
                        $('input[name=vcode]').parent().attr('class','error');
                        div.html(msg).css({
                            color:'red',
                            fontSize:'14px',
                            'padding-left':'66px'
                        });
                        validate.verify = 1;
                        return;
                    }
                }
            });
        }
    });
});