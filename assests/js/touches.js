jQuery(document).ready(function ($) {

  
    $("body").on("click",".morePosts" ,function(){
     $(this).removeClass('btn-primary').addClass('btn-success')
     $(this).html('جار التحميل');
     $(this).prop('disabled',true);
    $c = $(this).closest('.tab-pane').find('.c').val();
    
    $token = $("body").find('.token').text();
    $.ajax({
         url: '/morePosts/'+$token+'/'+$c,
         type: 'get',
         dataType: 'json',
         success: function(response){
            if(response['data'] != null)
             { 
                $("#news").find('.c').remove();
                $("#news").find('.morePosts').remove();
                $(response['data']).appendTo('#news');               
             }
         }});
    
});
    $("body").on("click",".moreVideos" ,function(){
          $(this).removeClass('btn-primary').addClass('btn-success')
     $(this).html('جار التحميل');
     $(this).prop('disabled',true);
    $c = $(this).closest('.tab-pane').find('.c').val();
    
    $token = $("body").find('.token').text();
    $.ajax({
         url: '/moreVideos/'+$token+'/'+$c,
         type: 'get',
         dataType: 'json',
         success: function(response){
            if(response['data'] != null)
             { 
                $("#videos").find('.c').remove();
                $("#videos").find('.moreVideos').remove();
                $(response['data']).appendTo('#videos');               
             }
         }});
    });
    $("body").on("click",".moreRelatedPosts" ,function(){
     $(this).removeClass('btn-primary').addClass('btn-success')
     $(this).html('جار التحميل');
     $(this).prop('disabled',true);
    $c = $(this).closest('.related-post-area').find('.c').val();
    $id = $(this).closest('.related-post-area').find('.mpid').val();
    $.ajax({
         url: '/moreRelatedPosts/'+$id+'/'+$c,
         type: 'get',
         dataType: 'json',
         success: function(response)
        {
            if(response['data'] != null)
             { 
                $(".related-post-area").find('.bntDiv').remove();
                $(response['data']).appendTo($('.related-post-area').find(".relatedPostsRow"));               
             }
         }
    });
  });
    $("body").on("click",".morexPosts" ,function(){
     $(this).removeClass('btn-primary').addClass('btn-success')
     $(this).html('جار التحميل');
     $(this).prop('disabled',true);
    $c = $(this).closest('.bntDiv').find('.c').val();
    $tagName = $(this).closest('.col-lg-8').find('.about').val();
    $.ajax({
         url: '/morexPosts/'+$tagName+'/'+$c,
         type: 'get',
         dataType: 'json',
         success: function(response)
        {
            if(response['data'] != null)
             { 
                $('.bntDiv').remove();
                $(response['data']).appendTo($('.md-div').find('.posts'));               
             }
         }
    });
  });
    $('.carousel').carousel({
    interval: false
}); 
    $(window).scroll(function() {                  // assign scroll event listener
    var fixmeTop = $('.fixedAd').offset().top;
    var currentScroll = $(window).scrollTop(); // get current position

    if (currentScroll >= 130) {           // apply position: fixed if you
        $('.fixedAd').css({                      // scroll to that element or below it
            position: 'fixed',
            top:"89px"
        });
    } else {                                   // apply position: static
        $('.fixedAd').css({                      // if you scroll above it
            position: 'absolute',
            top:""
        });
    }

});
});

