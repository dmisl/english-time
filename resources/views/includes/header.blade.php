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
                    <form action="{{ route('home.dark_mode') }}" method="GET">
                        <li class="mt-1">
                            <div class="dark_mode mt-0 p-0">
                                <input {{ dark_mode() }} type="checkbox" name="dark_mode" id="dark_mode_input" /><label class="dark_mode_label" for="dark_mode_input">Toggle</label>
                            </div>
                            <button hidden class="dark_mode_submit" type="submit">asd</button>
                        </li>
                    </form>
                </ul>
            </div>
        </div>
    </div>
</header>
