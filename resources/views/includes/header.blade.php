<header class='border-bottom py-3'>
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>
                <a class="text-decoration-none {{ active_link('home.index') }}" href="{{ route('home.index') }}">
                    <h2>{{ env('APP_NAME') }}</h2>
                </a>
            </div>
            <div>
                <ul class="d-flex list-unstyled">

                    @if(Auth::check())

                    @if(is_admin())

                    <li class='me-4'>
                        <a class="text-decoration-none {{ active_link('admin.index') }}" href="{{ route('admin.index') }}">
                            Профіль
                        </a>
                    </li>

                    <li class='me-4'>
                        <a class="text-decoration-none text-danger" href="{{ route('admin.logout') }}">
                            Вийти
                        </a>
                    </li>

                    @else

                    @if(is_active())


                    <li class='me-4'>
                        <a class="text-decoration-none {{ active_link('user.index') }}" href="{{ route('user.index') }}">
                            Профіль
                        </a>
                    </li>

                    <li class='me-4'>
                        <a class="text-decoration-none text-danger" href="{{ route('user.logout') }}">
                            Вийти
                        </a>
                    </li>

                    @else

                    <li class='me-4'>
                        <a class="text-decoration-none {{ active_link('user.index') }}" href="{{ route('user.index') }}">
                            Профіль
                        </a>
                    </li>

                    <li class='me-4'>
                        <a class="text-decoration-none text-danger" href="{{ route('user.logout') }}">
                            Вийти
                        </a>
                    </li>

                    @endif

                    @endif

                    @else

                    <li class='me-4'>
                        <a class="text-decoration-none {{ active_link('login.index') }}" href="{{ route('login.index') }}">
                            Авторизація
                        </a>
                    </li>
                    <li>
                        <a class="text-decoration-none {{ active_link('register.index') }}" href="{{ route('register.index') }}">
                            Реєстрація
                        </a>
                    </li>

                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
