<nav x-data="{ open: false, dropdownOpen: false }" class="admin-nav">
    <div class="container admin-nav-container">
        <div class="nav-bar">
            <div class="brand">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="app-logo" style="height: 30px; width: auto;" />
                </a>
            </div>

            <div class="nav-links">
                <a href="{{ route('dashboard') }}"
                   style="{{ request()->routeIs('dashboard') ? 'color: #DC2626;' : '' }}">
                   Dashboard
                </a>

                <a href="{{ route('admin.projects.index') }}"
                   style="{{ request()->routeIs('admin.projects.*') ? 'color: #DC2626;' : '' }}">
                   Projects
                </a>

                <a href="{{ route('admin.categories.index') }}"
                   style="{{ request()->routeIs('admin.categories.*') ? 'color: #DC2626;' : '' }}">
                   Kategori
                </a>

                <a href="{{ route('admin.posts.index') }}"
                   style="{{ request()->routeIs('admin.posts.*') ? 'color: #DC2626;' : '' }}">
                   Posts
                </a>

                <a href="{{ route('home') }}" target="_blank" class="nav-button" style="margin-left: 20px; font-size: 0.9rem;">
                    &larr; Lihat Website
                </a>
            </div>
        </div>

        <div class="profile-desktop" @click.away="dropdownOpen = false">
            <button @click="dropdownOpen = !dropdownOpen" class="profile-trigger">
                <div>{{ Auth::user()->name }}</div>
                <div class="ml-1">
                    <svg class="chev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="18" height="18">
                        <path fill="#ffffff" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </div>
            </button>

            <div x-show="dropdownOpen"
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="transform opacity-0 scale-95"
                 x-transition:enter-end="transform opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="transform opacity-100 scale-100"
                 x-transition:leave-end="transform opacity-0 scale-95"
                 class="dropdown-content"
                 style="display: none;">

                <div class="dropdown-inner">
                    <a href="{{ route('profile.edit') }}">Profile Saya</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-logout" style="width: 100%; text-align: left; margin-top: 5px;">
                            Keluar (Logout)
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="mobile-toggle">
            <button @click="open = ! open" class="mobile-button">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24" height="24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24" height="24" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div x-show="open" class="responsive-nav" style="display: none;">
        <div class="responsive-links">
            <a href="{{ route('home') }}" class="nav-button" style="text-align: center; margin-bottom: 10px;">
                &larr; Lihat Website
            </a>

            <a href="{{ route('dashboard') }}" style="{{ request()->routeIs('dashboard') ? 'color: #DC2626;' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.projects.index') }}" style="{{ request()->routeIs('admin.projects.*') ? 'color: #DC2626;' : '' }}">
                Kelola Projects
            </a>
            <a href="{{ route('admin.categories.index') }}" style="{{ request()->routeIs('admin.categories.*') ? 'color: #DC2626;' : '' }}">
                Kelola Kategori
            </a>
            <a href="{{ route('admin.posts.index') }}" style="{{ request()->routeIs('admin.posts.*') ? 'color: #DC2626;' : '' }}">
                Kelola Posts
            </a>
        </div>

        <div class="responsive-profile">
            <div class="profile-name">{{ Auth::user()->name }}</div>
            <div class="profile-email">{{ Auth::user()->email }}</div>

            <div class="responsive-links" style="margin-top: 10px;">
                <a href="{{ route('profile.edit') }}">Profile</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-logout" style="padding-left: 0; text-align: left; color: #fca5a5;">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
