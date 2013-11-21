<script>
    $(document).ready(function () {
//alert ('1');
        function loading_show() {
            $('#loading').html("<img src='public/images/loading.gif'/>").fadeIn('fast');
        }

        function loading_hide() {
            $('#loading').fadeOut('fast');
        }

        function loadData(page) {
            loading_show();
            $.ajax
            ({
                type: "POST",
                url: "photo" ,
                data: "page=" + page,
                success: function (msg) {
                    loading_hide();
                    $('body').html(msg);



                }
            });
        }

       // loadData(1);  // For first time page load default results
        $(document).on( "click", "#photo_container .pagination li.active", function(){
            var page = $(this).attr('p');
            loadData(page);

        });
       $('#go_btn').on('click', function () {
            var page = parseInt($('.goto').val());
            var no_of_pages = parseInt($('.total').attr('a'));
            if (page != 0 && page <= no_of_pages) {
                loadData(page);
            } else {
                alert('Enter a PAGE between 1 and ' + no_of_pages);
                $('.goto').val("").focus();
                return false;
            }

        });
    });
</script>
<div id="loading"></div>
<div id="photo_container">
    <div class="data">
        <?php
        foreach ($this->photoList as $value) {
            echo "<img id='imge'  src = 'public/images/photo/{$value}' alt = 'Изображение'/>";
        }
        //print_r($this->photoPagination);

        ?>
    </div>

    <?php
    echo $msg = $this->photoPagination;
    ?>

</div>