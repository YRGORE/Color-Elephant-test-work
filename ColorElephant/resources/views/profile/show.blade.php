@extends('main')

@section('title| My Profile')

@section('content')
	<div id="main-container"> 
 	<div class="container-fluid">
	    <!-- Left Column -->
	    </br> </br> </br> </br> </br> </br> 
		<div class="col-md-9 no-gutters">
		    <div class="card border-shadow">
				<div class="card-header content-center">					
					<h2 style="text-align:center">{{$userdetail->name}} Profile</h2>
					<div style="text-align:center">
    					<p class="profiletitle">{{$userdetail->cover_letter}}</p>
   						<p>Username - {{$userdetail->name}}</p>
    					<p>Email id - {{$userdetail->email}}</p>
    						@if($userdetail->visibleTo)
    							<p>I like Working</p>
     						@else
     							<p>I don't like Working</p>
    						@endif    
    				<div style="margin: 24px 0;">
      					<a class="myicon" href="#"><i class="fa fa-dribbble"></i></a> 
      					<a class="myicon" href="#"><i class="fa fa-twitter"></i></a>  
      					<a class="myicon" href="#"><i class="fa fa-linkedin"></i></a>  
					    <a class="myicon" href="#"><i class="fa fa-facebook"></i></a> 
   					</div>
   					</div>
				</div>							
			</div> 
			</br>
		@if(!$status)
			<h2>Provide Your Review </h2>
			<div class="stars" id="{{ $mainuser }}">
  				<form action="">
    				<input class="star star-5" id="star-5" type="radio" name="star" value="5" />
    					<label class="star star-5" for="star-5"></label>
    				<input class="star star-4" id="star-4" type="radio" name="star" value="4" />
    					<label class="star star-4" for="star-4"></label>
    				<input class="star star-3" id="star-3" type="radio" name="star" value="3" />
    					<label class="star star-3" for="star-3"></label>
    				<input class="star star-2" id="star-2" type="radio" name="star" value="2" />
    					<label class="star star-2" for="star-2"></label>
    				<input class="star star-1" id="star-1" type="radio" name="star" value="1" />
    					<label class="star star-1" for="star-1"></label>
  				</form>
			</div>
		@else
	<h2>You have given {{$myrating->rating}} Star Rating</h2>		
@endif	
								
					@if(!empty($comment))
					<div class="card border-shadow">
					<ol id ="{{ $userdetail->id }}" class="{{ $userdetail->id }}" name ="olid"> 
						@foreach($comment as $comment)
						
							<li>
							<div class="container" id="{{ $comment->id }}">
								<div class="row">
								  <div class="col-sm-11">
									<div>
							<strong>{{ Auth::user()->where('id',$comment->comment_user_id)->first()->name }}</strong> has replied @ <span class="text-muted">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</span>
									</div>
								  <div class="panel panel-default">
								<div class="panel-body">
								{{ $comment->comment_body }}
								</div><!-- /panel-body -->
								  </div><!-- /panel panel-default -->
								  </div>
								</div>
							</div>
							</li>
						@endforeach
					</ol></div>
					@endif

			 
			<div id= "{{$userdetail->id}}" name ="commentTo" class="card border-shadow">
				<div class="card-header content-center">					
					<div class="container">
					<div class="row">
					<div class="col-sm-12">
					<div class="panel panel-default" id="{{ $mainuser }}" >	
					<input type="text" name="my_comment" class="my_comment" placeholder="Add your comment" style="width:100%;"/>
			<!-- /panel-body -->
					</div><!-- /panel panel-default -->
					</div><!-- /col-sm-5 -->
					</div>
					</div> 	
				</div>							
			</div> 
		</div>
		<!-- End Left Column -->
		<!-- Right Column -->
		    <div class="col-md-3">
		    	<div class="row">
			      	<div class="card border-shadow">
						<div class="card-block">
						    <h4 class="card-title card-title-change">List of Profiles Having 5 star rating</h4>
						    <ol>
						    @foreach($fiveStar as $fiveStar)
						    <div><li>
						   <p class="card-text">Name - {{ Auth::user()->where('id',$fiveStar->user_id)->first()->name}} </p>
						   <p class="card-text">Email Id -{{ Auth::user()->where('id',$fiveStar->user_id)->first()->email}} </p>
						   </li>
						   </div>
						    @endforeach
						    
						</div>
					</div>
		      	</div>
		      	<br>
		    	<!-- End Right Column -->
		    </div>
		 <!-- End Grid -->	
	<!-- End Page Container  -->
	</div>
</div>



@endsection