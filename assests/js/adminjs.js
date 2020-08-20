jQuery(document).ready(function ($) {
    $("body").on("click", ".AddTag", function () {
            var div = $(this).closest('.form-group');
            var requierdSection = div.find('.original').clone().removeClass('original');
            $(requierdSection).find('input').each(function() {
            $(this).val('');
            });
            div.find('.row').last().after(requierdSection);
});
    $("body").on("click", ".deleteTag", function () {
        if(confirm("Are you sure you want to delete this?")){
           $(this).closest('.dropdown').remove();
        }else{
            false;
        }

});
    $("body").on("click", ".UpdateMatch", function () {
        $Row = $(this).closest('tr');
        $rowid =$($Row).attr('id');
    if(confirm("Are you sure you want to update this match?")){
        $($Row).find('.UpdateMatch').removeClass('btn-success').addClass('btn-secandry').html('updating').prop('disabled',true);
        $tds = $Row.find('input');
        $values = Array();
        $.each($tds,function(){
            $values.push($(this).val());
        });
       $.ajax({
         url: '/UpdateMatch/'+$rowid,
         type: 'get',
         dataType: 'json',
         data:{arr:JSON.stringify($values)},
         success: function(response)
         {
            if(response['data'] == 'true')
             {  
                $($Row).find('.UpdateMatch').removeClass('btn-secandry').addClass('btn-success').html('updated').prop('disabled',false);
                 setTimeout(function(){
                     $($Row).find('.UpdateMatch').html('update');
                 },5000);
               alert('Match updated successflly!');
             }else{
                 alert('something went wrong call Halawany!');
             }
         }
        });
      }else{
        false;
    }
        
    });
    $("body").on("click", ".updateCompClub", function () {
        $Row = $(this).closest('tr');
        $rowid =$($Row).attr('id');
    if(confirm("Are you sure you want to update this Club?")){
        $($Row).find('.updateCompClub').removeClass('btn-success').addClass('btn-secandry').html('updating').prop('disabled',true);
        $tds = $Row.find('input');
        $values = Array();
        $.each($tds,function(){
            $values.push($(this).val());
        });
       $.ajax({
         url: '/UpdateClubDetails/'+$rowid,
         type: 'get',
         dataType: 'json',
         data:{arr:JSON.stringify($values)},
         success: function(response)
         {
            if(response['data'] == 'true')
             {  
                $($Row).find('.updateCompClub').removeClass('btn-secandry').addClass('btn-success').html('updated').prop('disabled',false);
                 setTimeout(function(){
                     $($Row).find('.updateCompClub').html('update');
                 },5000);
               alert('Club updated successflly!');
             }else{
                 alert('something went wrong call Halawany!');
             }
         }
        });
      }else{
        false;
    }
        
    });
    $("body").on("click", ".deleteCompClub", function () {
        $Row = $(this).closest('tr');
        $rowid =$($Row).attr('id');
    if(confirm("Are you sure you want to delete this Club?")){
        $($Row).find('.deleteCompClub').removeClass('btn-danger').addClass('btn-secandry').html('جار التحميل').prop('disabled',true);
        $.ajax({
         url: '/deleteCompClub/'+$rowid,
         type: 'get',
         dataType: 'json',
         success: function(response)
        {
            if(response['data'] == 'true')
             {  
               $Row.remove();
               alert('club deleted from this competition!');
             }else{
                 alert('something went wrong call Halawany!');
             }
         }
        });
      }else{
        false;
    }
        
    });
    $("body").on("click", ".updateTag", function () {
        $tagRow = $(this).closest('tr');
        $tagName = $tagRow.find('input').val();
        $tagid =$($tagRow).attr('id');
    if(confirm("Are you sure you want to update this to "+ $tagName+" ?")){
        $($tagRow).find('.updateTag').removeClass('btn-danger').addClass('btn-secandry').html('جار التحميل').prop('disabled',true);
        $.ajax({
         url: '/updateTag/'+$tagid+'/'+$tagName,
         type: 'get',
         dataType: 'json',
         success: function(response)
        {
            if(response['data'] == 'true')
             {  
               $tagRow.find('.updateTag').removeClass('btn-secandry').addClass('btn-danger').html('update').prop('disabled',false);
               alert('tag Updated!');
             }else{
                 alert('cant be update right now!');
             }
         }
        });
      }else{
        false;
    }
        
    });
    $("body").on("click", ".deleteWholeTag", function () {
        $tagRow = $(this).closest('tr');
        $tagName = $tagRow.find('input').val();
        $tagid =$($tagRow).attr('id');
    if(confirm("Are you sure you want to delete"+ $tagName+" ?")){
        $($tagRow).find('.deleteWholeTag').removeClass('btn-danger').addClass('btn-secandry').html('جار التحميل').prop('disabled',true);
        $.ajax({
         url: '/deleteTag/'+$tagid,
         type: 'get',
         dataType: 'json',
         success: function(response)
        {
            if(response['data'] == 'true')
             {  
               $tagRow.remove();
               alert('tag deleted!');
             }else{
                 alert("can't be delete right now!");
             }
         }
        });
      }else{
        false;
    }
        
    });
    $("body").on("click", ".deletePost", function () {
      if(confirm("Are you sure you want to delete this?")){
        $(this).removeClass('btn-danger').addClass('btn-success')
        $(this).html('جار التحميل');
        $(this).prop('disabled',true);
        $PostRow = $(this).closest('tr');
        $Postid =$($PostRow).attr('id');
          $.ajax({
         url: '/deletePost/'+$Postid,
         type: 'get',
         dataType: 'json',
         success: function(response)
        {
            if(response['data'] == 'true')
             { 
               $PostRow.fadeOut(); 
               alert('Post Deleted!');
             }else{
                 alert('cant be deleted right now!');
             }
         }
        });
      }else{
        false;
    }
        
    });
    $("body").on("click",".deleteMatch" ,function(){

     if(confirm("Are you sure you want to delete this?")){
        $(this).removeClass('btn-danger').addClass('btn-success')
        $(this).html('جار التحميل');
        $(this).prop('disabled',true);
        $MatchRow = $(this).closest('tr');
        $Matchid =$($MatchRow).attr('id');
          $.ajax({
         url: '/deleteMatch/'+$Matchid,
         type: 'get',
         dataType: 'json',
         success: function(response)
        {
            if(response['data'] == 'true')
             { 
               $MatchRow.fadeOut(); 
               alert('Match Deleted!');
             }else{
                 alert('cant be deleted right now!');
             }
         }
        });
     }
    else{
        return false;
    }
  });
    $("body").on("change",".matchComp",function(){
         $compid = $(this).val();
         $form = $(this).closest('form');
         $fcTag = $form.find('.fct');
         $scTag = $form.find('.sct');
         $fcTag.find('.addedClubs').remove();
        $scTag.find('.addedClubs').remove();
         $.ajax({
         url: '/getCompClubs/'+$compid,
         type: 'get',
         dataType: 'json',
         success: function(response)
        {
         $clubs ="";
            if(response)
             { 
                $.each(response,function(i,c){
                    $clubs+="<option class='addedClubs' value='"+c.id+"'>"+c.clubName+"</option>";
                });
                 $fcTag.append($clubs);
                 $scTag.append($clubs);
                    
            }
               
             else{
                 alert('cant be deleted right now!');
             }
         }
        });
    });
    $("body").on("change",".passConf",function(){
        $confirm = $(this);
        $pass = $(this).closest('.form-row').find('.pass');
       if($pass.val() != $confirm.val()){
           $confirm.css("border","1px solid red");
           $pass.css("border","1px solid red");
           $pass.closest('form').find('.btn').prop('disabled',true);
       }
        else{
            $confirm.css("border","0px");
           $pass.css("border","0px");
           $pass.closest('form').find('.btn').prop('disabled',false);
        }
        
    });
});

