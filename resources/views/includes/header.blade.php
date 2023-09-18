<header class='border-bottom'>
    <div class="container">
        <div class="d-flex justify-content-between">
            <div style="margin-top: 10px;">
                <a class="text-decoration-none {{ active_link('home.index') }}" href="{{ route('home.index') }}">
                    <h2>{{ env('APP_NAME') }}</h2>
                </a>
            </div>
            <div class="pt-3">
                <ul class="d-flex list-unstyled">

                    @if(Auth::check())

                    @if(is_admin())

                    <li class='me-3' style="margin-top: 3px;">
                        <a class="text-decoration-none {{ active_link('admin.index') }}" href="{{ route('admin.index') }}">
                            {{ __('main.profile') }}
                        </a>
                    </li>

                    <li class='me-3' style="margin-top: 3px;">
                        <a class="text-decoration-none text-danger" href="{{ route('admin.logout') }}">
                            {{ __('main.logout') }}
                        </a>
                    </li>

                    @else

                    @if(is_active())


                    <li class='me-3' style="margin-top: 3px;">
                        <a class="text-decoration-none {{ active_link('user.index') }}" href="{{ route('user.index') }}">
                            {{ __('main.profile') }}
                        </a>
                    </li>

                    <li class='me-3' style="margin-top: 3px;">
                        <a class="text-decoration-none text-danger" href="{{ route('user.logout') }}">
                            {{ __('main.logout') }}
                        </a>
                    </li>

                    @else

                    <li class='me-3' style="margin-top: 3px;">
                        <a class="text-decoration-none {{ active_link('user.index') }}" href="{{ route('user.index') }}">
                            {{ __('main.profile') }}
                        </a>
                    </li>

                    <li class='me-3' style="margin-top: 3px;">
                        <a class="text-decoration-none text-danger" href="{{ route('user.logout') }}">
                            {{ __('main.logout') }}
                        </a>
                    </li>

                    @endif

                    @endif

                    @else

                    <li class='me-3' style="margin-top: 3px;">
                        <a class="text-decoration-none {{ active_link('login.index') }}" href="{{ route('login.index') }}">
                            {{ __('main.login') }}
                        </a>
                    </li>
                    <li style="margin-top: 3px;">
                        <a class="text-decoration-none {{ active_link('register.index') }}" href="{{ route('register.index') }}">
                            {{ __('main.register') }}
                        </a>
                    </li>

                    @endif
                    <li class="mt-1 me-3">
                        <form id="dark_mode_form" action="{{ route('home.dark_mode') }}" method="GET">
                            <div class="dark_mode mt-0 p-0">
                                <input {{ dark_mode() }} type="checkbox" name="dark_mode" id="dark_mode_input" /><label class="dark_mode_label" for="dark_mode_input">Toggle</label>
                            </div>
                            <button hidden class="dark_mode_submit" type="submit">asd</button>
                        </form>
                    </li>

                    <li style="margin-top: 2px;">
                        <x-form action="{{ route('home.locale') }}" method="GET">
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
    </div>
</header>
