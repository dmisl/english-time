<nav class="navbar navbar-expand-md bg-body-tertiary border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand text-primary-emphasis text-decoration-none {{ active_link('home.index') }}" href="{{ route('home.index') }}">
            {{ env('APP_NAME') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul>
            </ul>
            <ul class="navbar-nav mb-lg-0 ms-auto user-select-none">
                @if(Auth::check())

                    @if(is_admin())

                    <li class="nav-item">
                        <a class="text-primary-emphasis nav-link text-decoration-none {{ active_link('admin.index') }}" href="{{ route('admin.index') }}">
                            {{ __('main.profile') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="text-primary-emphasis nav-link text-decoration-none text-danger" href="{{ route('admin.logout') }}">
                            {{ __('main.logout') }}
                        </a>
                    </li>

                    @else

                    @if(is_active())


                    <li class="nav-item">
                        <a class="text-primary-emphasis nav-link text-decoration-none {{ active_link('user.index') }}" href="{{ route('user.index') }}">
                            {{ __('main.profile') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="text-primary-emphasis nav-link text-decoration-none text-danger" href="{{ route('user.logout') }}">
                            {{ __('main.logout') }}
                        </a>
                    </li>

                    @else

                    <li class="nav-item">
                        <a class="text-primary-emphasis nav-link text-decoration-none {{ active_link('user.index') }}" href="{{ route('user.index') }}">
                            {{ __('main.profile') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="text-primary-emphasis nav-link text-decoration-none text-danger" href="{{ route('user.logout') }}">
                            {{ __('main.logout') }}
                        </a>
                    </li>

                    @endif

                    @endif

                    @else

                    <li class="nav-item">
                        <a class="text-primary-emphasis nav-link text-decoration-none {{ active_link('login.index') }}" href="{{ route('login.index') }}">
                            {{ __('main.login') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="text-primary-emphasis nav-link text-decoration-none {{ active_link('register.index') }}" href="{{ route('register.index') }}">
                            {{ __('main.register') }}
                        </a>
                    </li>

                    @endif
                    <li class="nav-item">
                        <form class="nav-link" id="dark_mode_form" action="{{ route('home.dark_mode') }}" method="GET">
                            <div class="dark_mode mx-auto mt-0 p-0">
                                <input {{ dark_mode() }} type="checkbox" name="dark_mode" id="dark_mode_input" /><label class="dark_mode_label border" for="dark_mode_input">Toggle</label>
                            </div>
                            <button hidden class="dark_mode_submit" type="submit">asd</button>
                        </form>
                    </li>

                    <li class="nav-item">
                        <x-form class="nav-link mx-auto" style="width: 70px;" action="{{ route('home.locale') }}" method="GET">
                            <select name="locale" class="locale form-select ps-1 border-light" style="height: 27px; font-size: 14px; padding-right: 30px; padding-top: 2px;" aria-label="Default select example">
                                <option value="en">EN</option>
                                <option value="ua">UA</option>
                                <option value="pl">PL</option>
                            </select>
                            <input class="current_locale" type="hidden" value="{{ locale() }}">
                            <button hidden type="submit" class="locale_submit"></button>
                        </x-form>
                    </li>
            </ul>
        </div>
    </div>
</nav>
