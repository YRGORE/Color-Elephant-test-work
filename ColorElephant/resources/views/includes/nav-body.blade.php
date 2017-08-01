<div id="app">
 @if (Auth::guest()) 
  
    <nav id="navigation" class="navbar navbar-default navbar-static-top navbar-inverse bg-inverse">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{url('images/career.png')}}" height="60px" width="60px" class="figure-img home-logo"></img>
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-right" id="app-navbar-collapse">
                
                <h4><a class="home-log" href="{{ url('/login') }}">Login</a></h4>
                <h4><a class="reg-log" href="{{ url('/register') }}">Register</a></h4>

                <!-- Right Side Of Navbar -->                
            </div>
        </div>
    </nav>
  @else
    <nav id="navigation" class="navbar navbar-default navbar-static-top navbar-inverse bg-inverse">
        <div class="container">
            <div class="navbar-header">          

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{url('images/career.png')}}" height="60px" width="60px" class="figure-img home-logo"></img>
                </a>
            </div>
             <div class="collapse navbar-collapse navbar-right" id="app-navbar-collapse">
                
                <h4><a class="home-log" href="{{ url('/myhome') }}">MyProfile</a></h4>
                <h4><a class="reg-log" href="{{ url('/logout') }}">Logout</a></h4>

                <!-- Right Side Of Navbar -->                
            </div>                                                                
        </div>
    </nav>

      <div class="collapse navbar-collapse" id="navbarCollapse">

        <form class="form-inline mt-2 mt-md-0 pull-right" method="POST" action="{{ url('/showprofile') }}">
         {{--  <input id="search_friends" class="form-control mr-sm-2" type="text" onkeyup="suggest(event,this)" placeholder="Search"> --}}
          {{ csrf_field() }}
         <input id="search_friends" name="search_friends" class="form-control mr-sm-2" type="text" placeholder="Search">
          <button id="btn_user_profile" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

      </div>
    
  </div>
  @endif
  
  
  <script>

// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
$(document).ready(function(){
    $('.area-expand').mouseenter(function(){
      console.log('open');
      $('.area-display').css('display','block');
    }).mouseleave(function() {
      $('.area-display').css('display','none');
  });
});

</script>