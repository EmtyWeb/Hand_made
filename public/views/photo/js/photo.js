/*$(document).ready(function(){
    //alert ('1');
    function loading_show(){
        $('#loading').html("<img src='public/images/loading.gif'/>").fadeIn('fast');
    }
    function loading_hide(){
        $('#loading').fadeOut('fast');
    }
    function loadData(page){
        loading_show();
        $.ajax
        ({
            type: "POST",
            url: "views/photo/index.php",
            data: "page="+page,
            success: function(msg)
            {
                $("#container").ajaxComplete(function(event, request, settings)
                {
                    loading_hide();
                    $("#container").html(msg);
                });
            }
        });
    }
    loadData(1);  // For first time page load default results
    $('#container .pagination li.active').on('click',function(){
        var page = $(this).attr('p');
        loadData(page);

    });
    $('#go_btn').on('click',function(){
        var page = parseInt($('.goto').val());
        var no_of_pages = parseInt($('.total').attr('a'));
        if(page != 0 && page <= no_of_pages){
            loadData(page);
        }else{
            alert('Enter a PAGE between 1 and '+no_of_pages);
            $('.goto').val("").focus();
            return false;
        }

    });
});
    */