@extends('layouts.main')
@section('main.title', env('APP_NAME').' | Перевірка завдання '.$task->name)

@section('main.content')

<div class="container">
    <a href="{{ route('user.lesson.show', [$course, $lesson]) }}">Назад</a>
    <h1>{{ $task->name }}</h1>
    <h2>Made by: {{ $user->name }}</h2>
    {!! $completed->text !!}
<script>
    let button = document.querySelectorAll('#check')
    let answers = document.querySelector('.answers')
    if(answers === null)
    {

    } else
    {
        
    }

    button.forEach(button => {
        button.setAttribute('disabled', '')
    });
</script>
@endsection
