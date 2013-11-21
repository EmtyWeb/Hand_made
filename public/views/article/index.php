<div id = 'article_page'>
<div id = 'article_nav_block'>
    <div id="article_block">
        <ul id="article_nav">
            <?php
            //var_dump($result);
            foreach($this->MenuList as $menu){
                echo "<li id = '{$menu['cat_art_name']}'>
        <a href='".URL."article/".$menu['cat_art_name']."'>{$menu['cat_art_desc']}</a>
     </li>";
            }
            ?>
        </ul>
    </div>
</div>
<div id = 'article_main'>
    <div id = 'article_content'>
        <p>Библиотека мастера</p>
        <div class = 'article_item'>
            <p>Шитьё</p>
            <p> Шитьё — вид ручного труда.</p>
            <p>  Представляет собой создание на материале (ткани, коже) стежков и швов при помощи иглы и ниток, лески и т. п. Одно из древнейших технологий производства, возникшее ещё в каменном веке. До изобретения пряжи и тканных материалов одежда шилась из меха и шкур добытых животных с помощью игл из кости или рогов и «нитей» из сухожилий, вен или кишок животных.
                Обычно шитьё ассоциируется с созданием одежды и домашнего текстиля (например, постельного белья, скатертей, салфеток, полотенец, занавесей и т. д.), однако оно применяется также при изготовлении обуви, игрушек, при пошиве парусов, обивочных и драпировочных работах, переплетных работах, а также при производстве некоторых спортивных товаров (например, мячей). Шитьё — это общее название для нескольких видов рукоделия, включая вышивание, квилтинг, аппликацию, пэчворк.
                Тысячелетиями шитьё осуществлялось исключительно вручную. Изобретение швейной машины в XIX веке и компьютеризация во второй половине XX века привели к массовому промышленному производству швейных изделий, но шитьё вручную по-прежнему широко практикуется во всем мире. Искусная ручная работа характерна для профессиональных портных, высокой моды, традиционной национальной одежды, и ценится профессионалами и любителями как выражение творчества.
                Чтобы пошить одежду, необходимо прежде всего раскроить ткань. Раскраивают ткань по выкройкам, составленным по чертежам. После чего отдельные куски ткани, или другого материала, сшиваются вместе. При изготовлении одежды применяют следующие основные виды стежков: прямой, косой, крестообразный, петлеобразный и петельный.</p>
            </p>
        </div>
        <div class = 'article_item'>
            <p>Макраме</p>
            <p>Макраме (фр. Macramé, от арабск. — тесьма, бахрома, кружево или от турецк. — шарф или салфетка с бахромой) — техника узелкового плетения.
            </p>
        </div>
        <div class = 'article_item'>
            <p>Вяза́ние</p>
            <p>Вяза́ние — процесс изготовления полотна или изделий (обычно элементов одежды) из непрерывных нитей путём изгибания их в петли и соединения петель друг с другом с помощью несложных инструментов вручную (вязальный крючок, спицы, игла) или на специальной машине(механическое вязание). Вязание, как техника, относится к видам плетения.
            </p>
        </div>
</div>
</div>
</div>

