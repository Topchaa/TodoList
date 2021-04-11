$('document').ready(function(){


$('.delBtn').click(function(){
 var postDelId = this.id;
$.ajax({
    
       url: "././delete.php",
       type: "POST",
       data:{
       	id: postDelId
       }, success: function(response){

     var result  = jQuery.parseJSON(response);
    
    if (result.status == "error") {


    	alert(result.response);
    }else if (result.status == "success"){

location.reload();

    }


            }
         


      , error: function(response){



alert(result.response);





       }





});



});

$('.updBtn').click(function(){


var postUpdId = this.id;
$.ajax({
    
       url: "././update.php",
       type: "POST",
       data:{
       	id: postUpdId
       }, success: function(response){

     var result2  = jQuery.parseJSON(response);
    
    if (result2.status == "error") {


    	alert(result2.response);

    }else if (result2.status == "success"){

location.reload();

    }


            }
         


      , error: function(response){



alert(result2.response);





       }





});








});






});