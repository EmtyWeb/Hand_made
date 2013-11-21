

$(function(){
    /*всплывающий блок логин*/
    $('#enter').click(function(e){
        e.preventDefault();
        $('#main').after('<div id="modal"><div id = "my_logo"><div id = "modal_content"><div id="close"><a href="#"></a></div><p>Вход</p>' +
            '<form  id = "log_form" action="login/loginRun" method="POST">' +
            '<table>'+
            '<tr><td><label for="login">Login</label></td>' +
            '<td><input type="text" id="login" name="login"placeholder="Login" value="" required/></td><tr>' +
            '<tr><td><label for="password">Password</label></td>' +
            '<td><input type="text" id="passwordlogin" name="password"placeholder="Password" value="" required/></td></tr>' +
            '</table>' +
            '<div><input type="submit" id="modal_but" name="send_form"  value="Ввойти"/></div>'+
            '</form>'+
            '<a id ="forgot_pass" href="login/forgot">Напомнить пароль?</a>'+
            ' </div></div></div>');
            $(" #close").click(function(){
                $('#modal').remove();
            });
    /*всплывающий блок забыли пароль*/
            $('#forgot_pass').click(function(e){
                 e.preventDefault();
                $('#my_logo').remove();
                $('#modal').html('<div id = "my_forgot"><div id = "modal_content"><div id="close"><a href="#"></a></div><p>Восстановить пароль</p>'+
                    '<form action="login/forgotRun"    method="post"><table><th>Введите Ваш</th>'+
                    '<tr><td>Login</td><td><input type="text"    name="login" ></td></tr>' +
                    '<tr><td></td><td>или</td></tr>'+
                    '<tr><td>E-mail</td><td><input type="text"    name="email" ></td></tr>' +
                    '</table>'+
                    '    <input type="submit"    name="submit" value="Отправить">'+
                    '</form>'+
                    '<span>Мы вышлем вам пароль на электронную почту, после этого вы сможете войти на наш сайт.</span>'+
                    '</div></div>');
                $(" #close").click(function(){
                    $('#modal').remove();
                });
            });
    });
    /*Меню
    var $oe_menu		= $('#oe_menu');
    var $oe_menu_items	= $oe_menu.children('li');
    var $oe_overlay		= $('#oe_overlay');

    $oe_menu_items.bind('mouseenter',function(){
        var $this = $(this);
        $this.addClass('selected');
        $this.children('div').css('z-index','9999').stop(true,true).slideDown(200,function(){
           // $oe_menu_items.not('.slided').children('div').hide();
           // $this.removeClass('slided');
        });
    }).bind('mouseleave',function(){
            var $this = $(this);
            $this.removeClass('selected').children('div').css('z-index','1');
        });

    $oe_menu.bind('mouseenter',function(){
        var $this = $(this);
     //   $oe_overlay.stop(true,true).fadeTo(200, 0.6);
        $this.addClass('hovered');
    }).bind('mouseleave',function(){
            var $this = $(this);
            $this.removeClass('hovered');
            //$oe_overlay.stop(true,true).fadeTo(200, 0);
            $oe_menu_items.children('div').hide();
        })*/



});

