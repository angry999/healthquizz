<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      <i><img style="width:50px" src="{{ asset('material') }}/img/logo.jpg"></i>
      Radiant Shenti
    </a> 
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ ('student' == 'profile' || 'student' == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i class="fa fa-users" aria-hidden="true"></i>
          <p>{{ __('Admin Users') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <i class="fa fa-user"></i>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            @if (session('admin') == 1)
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fa fa-address-book"></i>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-permission' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.permission') }}">
                <i class="fa fa-edit"></i>
                <span class="sidebar-normal"> {{ __('User Permission') }} </span>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </li>
      <hr>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == '') ? ' active' : '' }}">
        
        <div class="collapse show" id="laravelExample">

          <ul class="nav">
            @if (session('admin') == 1 || session('emaillist') == 1)
            <li class="nav-item{{ $activePage == 'emaillist' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('emaillist') }}">
                <i class='fa fa-address-book-o'></i>
                <span class="sidebar-normal">{{ __('Email List') }} </span>
              </a>
            </li>
            @endif
            @if (session('admin') == 1 || session('questions') == 1)
            <li class="nav-item{{ $activePage == 'questions' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('questions') }}">
                <i class='fa fa-commenting-o'></i>
                <span class="sidebar-normal">{{ __('Questions') }} </span>
              </a>
            </li>
            @endif
            @if (session('admin') == 1 || session('answers') == 1)
            <li class="nav-item{{ $activePage == 'answers' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('answers') }}">
                <i class='fa fa-check-square-o'></i>
                <span class="sidebar-normal">{{ __('Answers') }} </span>
              </a>
            </li>
            @endif
            @if (session('admin') == 1 || session('results') == 1)
            <li class="nav-item{{ $activePage == 'results' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('results') }}">
                <i class='fa fa-pencil'></i>
                <span class="sidebar-normal">{{ __('Results') }} </span>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </li>
      <hr>
      @if (session('admin') == 1 || session('firstpage') == 1)
      <li class="nav-item{{ $activePage == 'firstpage' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('firstpage') }}">
          <i class='fa fa-television'></i>
          <span class="sidebar-normal"> {{ __('First Page') }} </span>
        </a>
      </li>
      @endif
      @if (session('admin') == 1 || session('emailpage') == 1)
      <li class="nav-item{{ $activePage == 'emailpage' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('emailpage') }}">
          <i class='fa fa-envelope-open-o'></i>
          <span class="sidebar-normal"> {{ __('Email Content') }} </span>
        </a>
      </li>
      @endif
    </ul>
  </div>
</div>