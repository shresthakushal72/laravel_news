<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}"> <img alt="image" src="/assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Laravel News</span>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown">
            <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
            <a href="{{ route('post.index') }}" class="nav-link"><i data-feather="book"></i><span>Posts</span></a>
        </li>
        <li class="dropdown">
            <a href="index.html" class="nav-link"><i data-feather="image"></i><span>Advertise</span></a>
        </li>

        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="settings"></i><span>Settings</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('company.index') }}">Company</a></li>
                <li><a class="nav-link" href="{{ route('category.index') }}">Category</a></li>
            </ul>
        </li>

    </ul>
</aside>
