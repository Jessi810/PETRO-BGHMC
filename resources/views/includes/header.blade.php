<header class="header">
   



<!--This is the toggle button if screen size is changed-->
    <div class="header-block header-block-collapse d-lg-none d-xl-none">
      <button class="btn btn-primary navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars icon"></span>
      </button>
    </div>
<!--End of Toggle Button-->



    <div class="">
        <!-- <form role="search">
            <div class="input-container">
                <i class="fa fa-search"></i>
                <form method="GET" action="{{ route('trainer.index') }}">
                    <input name="q" type="search" placeholder="Search">
                </form>
                <div class="underline"></div>
            </div>
        </form> --> 



        <nav class="navbar navbar-expand-lg">
          
  <a class="navbar-brand" href="{{ url('home') }}"><h2>PETRO-BGHMC</h2></a>
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-users"></i> Trainers
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ url('trainer/create-all') }}"> Create New Trainer</a>
          <a class="dropdown-item" href="{{ route('trainer.index') }}">Trainers </a>
          
          <div class="dropdown-divider"></div>

          <a class="dropdown-item" href="{{ route('trainer.index', ['type' => 'Internal']) }}" onclick=""> Internal </a>
          <a class="dropdown-item" href="{{ route('trainer.index', ['type' => 'External']) }}"> External </a>
        </div>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('division.index') }}">
              <i class="fa fa-pencil-square-o"></i> Divisions </a>
      </li>
      <li class="nav-item" ">
          
      </li>
    </ul>
   
 
</div>

</nav>
    </div>
  
    <div class="header-block header-block-nav">
        <ul class="nav-profile">
            
            <li class="profile dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="img" style="background-image: url('{{ !empty(Auth::user()->profile_picture) ? asset(Auth::user()->profile_picture) : asset('img/profile_pictures/default_user_icon.png') }}')"> </div>
                    <span class="name"> {{ Auth::user()->name }} </span>
                </a>
                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                    <a class="dropdown-item" href="/adduser">
                        <i class="fa fa-user-plus icon"></i> Add User </a>
                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                        <i class="fa fa-user icon"></i> Profile </a>
                    {{--  <a class="dropdown-item" href="#">
                        <i class="fa fa-bell icon"></i> Notifications </a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-gear icon"></i> Settings </a>
                    <div class="dropdown-divider"></div>  --}}
                    {{--  <a class="dropdown-item" href="login.html">
                        <i class="fa fa-power-off icon"></i> Logout </a>  --}}
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off icon"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </div>
</header>