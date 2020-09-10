<header class="navbar-panel">
    <div class="d-flex flex-row-reverse">
        <div class="navbar-login">
            <img class="user-avatar rounded-circle" src="{{url('images/admin.jpg')}}" alt="user-photo">
            <a class="dropdown-custom" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="user-avatar__text">{{Auth::user()->name}}</span>
                <i class='bx bxs-chevron-down-circle' style='color:#045EFE; margin-top: 5px;'></i>
            </a>
            <div class="dropdown-menu menu-custom" aria-labelledby="dropdownMenuButton">
                {{-- <a class="dropdown-item item-custom" href="#">
                    <i class='bx bx-user-circle icon-custom'></i>
                    <span>Account</span>
                </a> --}}
                <a class="dropdown-item item-custom" href="{{route('logout')}}" 
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class='bx bx-power-off icon-custom'></i>
                    <span>Logout</span> 
                </a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</header>