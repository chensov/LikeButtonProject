$(window).load(function() {
    $(".loader").fadeOut("slow");
});

/*button*/
$(document).on('click', '.heart', function() {

    //var button    = $(this);
    id = $(this).attr('id');
    user_id = $('#id').val();
    container = $(this).closest('.feed').attr('id');

        var B=id.split("like");
        var messageID=B[1];
        var C=parseInt($("#likeCount"+messageID).html());
    	$(this).css("background-position","")
        var D=$(this).attr("rel");

        if(D === 'like') 
        {
            $("#likeCount"+messageID).html(C+1);
            $(this).addClass("heartAnimation").attr("rel","unlike");
            /*alert('like');*/
        }else{
            $("#likeCount"+messageID).html(C-1);
            $(this).removeClass("heartAnimation").attr("rel","like");
            $(this).css("background-position","left");
            /*alert('unlike');*/
        }

     $.ajax({
        type : "POST",
        url : "check_name.php",
        data : {
            id : id,
            user_id : user_id,
            flag1 : 'update'
        },
        async : false,
        success : function(data) {
            $('#' + container).find('.score').html(data); //actualiza contador

            //button.removeClass("heartAnimation").attr("rel","like");
            //button.css("background-position","left");           
        }
    }); 
    
});


