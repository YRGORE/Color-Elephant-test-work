//var token = '{{ Session::token() }}';

/*
$('#btn_user_profile').on('click', function(e) {
	var name=$(this).prev().val();
	alert(name);
	$.ajax({
		url: '/showprofile/',
		type:'GET',
		data:{name: name , token: token},
	})

	.done(function(mycomment) {  
            console.log(mycomment);              
        });
});*/
$(document).ready(function () {

$('.star').click(function(){
	 var rating= ($('input[name=star]:checked').val());
	 var current = document.getElementsByName('olid');
     var currentuser = current[0].getAttribute( 'id' );
     var reviewer = $(this).closest("div").attr("id");
   //  alert(reviewer);
	 $.ajax({
                method: 'GET',
                url: '/review',
                data: {rating: rating, currentuser: currentuser, reviewer: reviewer},
                
            })
	 .done(function(mycomment) {  
            console.log(mycomment);
           // alert(mycomment['comment_id']);            
            
        });
});


$('.my_comment').on('keypress', function(e) {
            if (e.keyCode == 13) {
                var commentFrom = $(this).closest("div").attr("id");
                var elements = document.getElementsByName('commentTo');                
                var commentTo = elements[0].getAttribute( 'id' );
                var olelements = document.getElementsByName('olid');
                var olid = elements[0].getAttribute( 'id' );
                var my_comment = $(this).val();
               //alert(commentFrom);
               
           $.ajax({
                method: 'GET',
                url: '/comment',
                data: {my_comment: my_comment, commentFrom: commentFrom, commentTo: commentTo},
                
            })

            .done(function(mycomment) {  
            console.log(mycomment);
           // alert(mycomment['comment_id']);
            var commenthtml=''+'<li><div class="container" id="'+mycomment['comment_id']+'"><div class="row"><div class="col-sm-11"><div class="panel panel-default"><div class="panel-body"><strong>'+mycomment['user_name']+'</strong> has replied @ <span class="text-muted">'+mycomment['created_at']+'</span></div><div class="panel-body">'+mycomment['comment_body']+'</div></div></div></div></div></li>';             
            $('.'+olid).append(commenthtml);  
            
        });
                                
        }        
        
    });

$('#search_friends').keyup(function(e) {
  var existingString = $("#search_friends").val();

  if(existingString==''){
    $('#frnd_list').remove();
  }else{
    clearTimeout($.data(this, 'timer'));
    if (e.keyCode == 13)
      search(true,existingString);
    else
      $(this).data('timer', setTimeout(search, 500));
  }
    
});
function search(force,text) {
    var existingString = $("#search_friends").val();
    if($('body').find('#frnd_list').length<1 && text!=''){
      $('body').append('<div id="frnd_list" style="max-height: 300px overflow:auto; border: 1px solid black;width: 375px;left: 84%;top: 147px;margin-left: -200px;  position: fixed;color:black" class="card text-center"><div class="card-header">Review Profile</div><div id="frnd_data" class="card-block">No user found</div></div>');
    }
    if (!force && existingString.length < 3) return; //wasn't enter, not > 2 char
    $.ajax({
      url:'/search_user/'+existingString,
      type: 'GET',
      data:{_token: token},
      success: function(data){
      	 var htmlText = '';
      	 var url ='';
        console.log(data);
        //console.log(data.name);
      	
        if(data!=''){
          $('#frnd_data').empty();
            $.each( data, function(key, value ){          	
            	
            	//url= '{{route("showprofile",":id")}}';
            	//url= url.replace(":id",value.id);
            	//console.log(url);
                htmlText += '<p class="p-name"> Name: ' + value.name + '</p>';
                htmlText += '<p class="p-loc"> Location: ' + value.email + '</p>';  
                $('body').append(htmlText); 
                $('#frnd_list #frnd_data').append('<div id="'+value.userid+'" class="row"><div class="form-group"></div><div class="search_list_detail"><a href="" id="'+value.id+'" class="list_user_detail">'+value.name+'</a></div></div>');    
           // $('#frnd_list #frnd_data').append('<div id='+value.id+' class="row"><div class="form-group"><div class="search_list_detail"><a href="#"" class="list_user_detail">'+value.name);                
          });
          
      	}
      }
    });
}

$('#list_user_detail').on('click', function(e) {
            var id = $(this).attr('id');  
            alert(id);
            $.ajax({
                method: 'GET',
                url: '/showprofile/'+id,
                data: {id: id, _token: token},
                
            })

            .done(function(mycomment) {  
            console.log(mycomment);  
            
        });
                                
    });

$('#resume').on('click', function(e) {
            var file_data = $('#cv').prop('files')[0];  
            var form_data = new FormData();
            form_data.append('file', file_data);

            $.ajax({
                method: 'POST',
                url: '/myresume',
                data: {form_data: form_data, _token: token},
                
            })

            .done(function(mycomment) {  
            console.log(mycomment);  
            
        });
                                
    });
});