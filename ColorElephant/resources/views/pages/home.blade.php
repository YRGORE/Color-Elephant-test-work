@extends('main')

@section('title| Home')

@section('content')
 <!-- Page Container -->
<div id="main-container"> 
 	<div class="container-fluid">
	    <!-- Left Column -->
	    </br> </br> </br> </br> </br> </br> 
		<div class="col-md-9 no-gutters">
		    <div class="card border-shadow">
				<div class="card-header content-center">					
					<h2 style="text-align:center">{{$profile->name}} Profile</h2>
					<div style="text-align:center">
    					<p class="profiletitle">{{$profile->cover_letter}}</p>
   						<p>Username - {{$profile->name}}</p>
    					<p>Email id - {{$profile->email}}</p>
    						@if($profile->visibleTo)
    							<p>I like Working</p>
     						@else
     							<p>I don't like Working</p>
    						@endif   
    						
    						{{ csrf_field() }}
    						<div class="col-md-6" col-md-offset-4">
                                <input type="file" id="cv" name="cv" accept=".pdf,.doc"  />
                            </div> 
                             <div class="col-md-6 col-md-offset-4">
                                <button id="resume" type="submit" class="btn btn-primary">
                                    Upload Resume
                                </button>
                            </div>
                            
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
			<div class="card border-shadow">
				<div class="card-header content-center">					
					@if(!empty($comment))
					<hr class="style7">
					<ol class="{{ $profile->id }}" > 
						@foreach($comment as $mycomment)	
							<li>
							<div class="container" id="{{ $mycomment->id }}">
							<div class="row">
							<div class="col-sm-11">
							<div class="comment_bubble ">
							<strong>{{ Auth::user()->where('id',$mycomment->comment_user_id)->first()->name }}</strong> has replied @ <span class="text-muted">{{ $mycomment->created_at->diffForHumans() }}</span>
							</div>
							<div class="panel panel-default">
							<div class="panel-body">
								{{ $mycomment->comment_body }}
							</div><!-- /panel-body -->
							</div><!-- /panel panel-default -->
							</div>
							</div>
							</div>
							</li>
						@endforeach
					</ol>
					@endif
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
