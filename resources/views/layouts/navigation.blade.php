<nav x-data="{ open: false }" class="admin-nav">
    <div class="container admin-nav-container">
        <div class="nav-bar">
            <div class="brand">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="app-logo" />
                </a>
            </div>

            <div class="nav-links">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('admin.projects.index')" :active="request()->routeIs('admin.projects.*')">
                    {{ __('Kelola Projects') }}
                </x-nav-link>
                <x-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')">
                     {{ __('Kelola Kategori') }}
                </x-nav-link>
                <x-nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.*')">
                    {{ __('Kelola Posts') }}
                </x-nav-link>
            </div>
        </div>

        <div class="profile-desktop">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="profile-trigger">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="ml-1">
                            <svg class="chev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="18" height="18">
                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            Keluar
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

        <div class="mobile-toggle">
            <button @click="open = ! open" class="mobile-button">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div x-show="open" class="responsive-nav">
        <div class="responsive-links">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.projects.index')" :active="request()->routeIs('admin.projects.*')">
                {{ __('Kelola Projects') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')">
                {{ __('Kelola Kategori') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.*')">
                {{ __('Kelola Posts') }}
            </x-responsive-nav-link>
        </div>

        <div class="responsive-profile">
            <div class="profile-name">{{ Auth::user()->name }}</div>
            <div class="profile-email">{{ Auth::user()->email }}</div>
            <div class="responsive-links">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        Keluar
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>