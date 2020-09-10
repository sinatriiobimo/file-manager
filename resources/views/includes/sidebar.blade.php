<div class="sidebar-wrapper" id="sidebar-wrapper">
    <nav class="nav">
        <div>
            <a class="nav__logo">
                <i class='bx bxs-cabinet nav__logo-icon'></i>
                <span class="nav__logo-text">File Manager</span>
            </a>
            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bxs-chevron-right icon' ></i>
            </div>

            <ul class="nav__list">
                <a href="{{route('dashboard')}}" class="nav__link {{Request::path() === '/' ? 'active' : ''}}">
                    <i class='bx bxs-dashboard nav__icon'></i>
                    <span class="nav__text">Dashboard</span>
                </a>
                <a href="{{route('document.create')}}" class="nav__link {{Request::path() === 'document/create' ? 'active' : ''}}">
                    <i class='bx bxs-cloud-upload nav__icon'></i>
                    <span class="nav__text">Document Manager</span>
                </a>
                <a href="{{route('search')}}" class="nav__link {{Request::path() === 'search' ? 'active' : ''}}">
                    <i class='bx bxs-file-find nav__icon'></i>
                    <span class="nav__text">Search File</span>
                </a>
                <a href="{{route('reset')}}" class="nav__link {{Request::path() === 'reset' ? 'active' : ''}}">
                    <i class='bx bx-reset nav__icon'></i>
                    <span class="nav__text">Reset Password</span>
                </a>
                @if (auth()->user()->email == 'superadmin@gmail.com')
                <a href="{{route('admin.index')}}" class="nav__link">
                    <i class='bx bxs-user-detail nav__icon'></i>
                    <span class="nav__text">Admin Role</span>
                </a>
                @endif
            </ul>
        </div>
    </nav>
</div>
