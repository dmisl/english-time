@extends('layouts.main')
@section('main.title')

{{ env('APP_NAME') }} | {{ __('main.applications_for_registration') }}

@endsection

@section('main.content')

<div class="container">
    <a class="text-decoration-none" href="{{ route('admin.index') }}">{{ __('main.back') }}</a>
    <h1 class="py-3">{{ __('main.applications_for_registration') }}</h1>

    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">user id</th>
                <th scope="col">user name</th>
                <th scope="col">user email</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <img class="icon" src="{{ asset('storage/icons/accept.png') }}" data-bs-toggle="modal" data-bs-target="#acceptModal{{ $user->id }}">
                        <div class="modal fade" id="acceptModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header {{ dark_mode_text() }}">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('main.verification') }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body {{ dark_mode_text() }}">
                                        <h5>{{ __('main.are_you_sure_you_have_activated_the_user_named') }} {{ $user->name }}</h5>
                                        <x-form action="{{ route('active.store') }}">
                                            <x-input type="hidden" name="action" value="accept"></x-input>
                                            <x-input type="hidden" name="user_id" value="{{ $user->id }}"></x-input>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" data-bs-dismiss="modal">{{ __('main.yes') }}</button>
                                            <button type="button" class="btn btn-primary">{{ __('main.no') }}</button>
                                        </x-form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img class="icon" src="{{ asset('storage/icons/deny.png') }}" data-bs-toggle="modal" data-bs-target="#denyModal{{ $user->id }}">
                        <div class="modal fade" id="denyModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header {{ dark_mode_text() }}">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('main.verification') }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body {{ dark_mode_text() }}">
                                        <h5>{{ __('main.are_you_sure_about_denying_a_user_called') }} {{ $user->name }}</h5>
                                        <x-form action="{{ route('active.store') }}">
                                            <x-input type="hidden" name="action" value="deny"></x-input>
                                            <x-input type="hidden" name="user_id" value="{{ $user->id }}"></x-input>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">{{ __('main.yes') }}</button>
                                            <button type="button" class="btn btn-primary">{{ __('main.no') }}</button>
                                        </x-form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>

@endsection
