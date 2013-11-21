<?php
class View {
    function __construct(){
        //echo 'We are in View';
    }
    public function render($name, $noInclude = false){
        if($noInclude == true){
            require 'views/'.$name.'.php';
        }elseif($name == 'account/index' ||
                $name == 'account/profile' ||
                $name == 'account/safety' ||
                $name == 'account/createItem' ||
                $name == 'account/createFair' ||
                $name == 'account/viewItem' ||
                $name == 'account/fairItem' ||
                $name == 'account/addItem' ||
                $name == 'account/editFair' ||
                $name == 'blog/index' ||
            $name == 'master/index' ||
            $name == 'article/index' ||
            $name == 'fair/index' ||
            $name == 'note/index' ||
            $name == 'item/index' ||
            $name == 'works/index' ||
            $name == 'master/info' ||
            $name == 'blog/text' ||
            $name == 'registration/index' ||
        $name == 'item/big_item' ||
        $name == 'note/big_item'

        )
        {
            require 'views/header.php';
            require 'views/'.$name.'.php';
            require 'views/account/user_cabinet.php';
            require 'views/footer.php';
        }
        else{
          //  echo $name;
            require 'views/header.php';
            require 'views/'.$name.'.php';
            require 'views/footer.php';
        }

    }
}