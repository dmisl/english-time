@extends('layouts.main')
@section('main.title', env('APP_NAME').' | Заявки на реєстрацію')

@section('main.content')

<div class="container">
    <a class="text-decoration-none" href="{{ route('admin.index') }}">Назад</a>
    <h1 class="py-3">Заявки на реєстрацію</h1>

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
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Перевірка</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Ви впевнені в активації користувача {{ $user->name }}</h5>
                                        <x-form action="{{ route('active.store') }}">
                                            <x-input type="hidden" name="action" value="accept"></x-input>
                                            <x-input type="hidden" name="user_id" value="{{ $user->id }}"></x-input>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Так</button>
                                            <button type="button" class="btn btn-primary">Ні</button>
                                        </x-form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img class="icon" src="{{ asset('storage/icons/deny.png') }}" data-bs-toggle="modal" data-bs-target="#denyModal{{ $user->id }}">
                        <div class="modal fade" id="denyModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Перевірка</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Ви впевнені в відмові користувачу {{ $user->name }}</h5>
                                        <x-form action="{{ route('active.store') }}">
                                            <x-input type="hidden" name="action" value="deny"></x-input>
                                            <x-input type="hidden" name="user_id" value="{{ $user->id }}"></x-input>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Так</button>
                                            <button type="button" class="btn btn-primary">Ні</button>
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
