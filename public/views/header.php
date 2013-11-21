<?php Session::initiation();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html

<head>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title><?=(isset($this->title))? $this->title : 'InnaMarya';?></title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/reset.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/styles.css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php// echo URL; ?>public/js/123.js"></script>
    <script type="text/javascript" src="<?php //echo URL; ?>public/js/slides.min.jquery.js"></script>

    <?php
    //подключение js для отдельного файла
    if(isset($this->js)){
        foreach($this->js as $js){
            echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
        }
    }
    ?>
</head>
<body>
<div id = 'main'>
    <div id = 'contain'>
        <div id = 'container'>
            <div id = 'header'>
                        <!--<div id = 'hbg2'><img  src='images/h.klaks2.png'/></div>-->
                        <div id = 'logo'></div>
                        <div id = 'search'>
                            <!-- <input type="search">-->
                        </div>
                <div id="reg_holder">
                    <?php if (Session::get('loggedIn') == true):?>
                        <a href="<?php echo URL;?>dashboard/logout"><img src='<?php echo URL;?>public/images/exit.fw.png'></a>
                        <a href="<?php echo URL;?>account"><img src='<?php echo URL;?>public/images/user_cab.fw.png'></a>
                        <?php if (Session::get('role') == 'owner'){?>
                            <a href="<?php echo URL;?>users"></a>
                        <?php }?>
                    <?php else: ?>
                        <a id = 'enter' href="<?php echo URL;?>login"><img src='<?php echo URL;?>public/images/enter.fw.png'></a>
                        <a href="<?php echo URL;?>registration"><img src='<?php echo URL;?>public/images/registration.fw.png'></a>
                    <?php  endif ?>
                </div>
                        <div id = 'menu'>
                            <ul id="nav">
                                <li id = "home">
                                    <a id = "home" href="<?php echo URL; ?>index">Главная</a>
                                </li>
                                <li  id = "work">
                                    <a id = "work" href="<?php echo URL; ?>categories">Работы</a>
                                </li>
                                <li id = "fair">
                                    <a id = "fair" href="<?php echo URL; ?>fair">Ярмарка</a>
                                </li>
                                <li id = "master">
                                    <a id = "master" href="<?php echo URL; ?>master">Мастера</a>
                                </li>
                                <li id = "news">
                                    <a id = "news" href="<?php echo URL; ?>blog">Новости</a>
                                </li>
                                <li id = "article">
                                    <a id = "article" href="<?php echo URL; ?>article">Статьи</a>
                                </li>
                            </ul>
                        </div>
                        <div id = 'social'>
                            <div class = 'social_img'><img  src='<?php echo URL;?>public/images/mail.png'/></div>
                            <div class = 'social_img'><img  src='<?php echo URL;?>public/images/rss.png'/></div>
                            <div class = 'social_img'><img  src='<?php echo URL;?>public/images/facebook.png'/></div>
                            <div class = 'social_img'><img  src='<?php echo URL;?>public/images/twitter.png'/></div>
                        </div>
            </div>
            <div id = 'content'>
