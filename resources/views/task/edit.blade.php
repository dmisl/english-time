@extends('layouts.main')

@section('main.title', env('APP_NAME').' | Редагування завдання')

@section('main.content')

<div class="hidden_body container" style="font-family: 'Inter', sans-serif;">

    <a href="{{ route('lesson.show', [$course, $lesson]) }}">{{ __('main.back') }}</a>

    {{-- EDITING TASK NAME --}}
    <div>

        <h3 class="name" style="margin-top: 20px; display: inline-block; border-radius: 20px; border: 1px solid black; padding: 10px 20px;" contenteditable="true">

            {{ $task->name }}

        </h3>

        <p class="name_hint small text-muted">Нажміть щоб змінити назву завдання</p>

    </div>

    <div class="editing" style="padding-bottom: 100px;"></div>

    <div class="task_update bg-success bg-gradient" style="display: table; margin: 30px auto 20px; border: 1px solid black; border-radius: 10px; color: white;" role="button">
        <p style="padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">
            ЗБЕРЕГТИ ЗМІНИ
        </p>
    </div>

    <div class="ov"></div>

    <div hidden>
        {!! $task->body !!}
    </div>

</div>
{{-- HIDDEN EDITING FORM --}}
<x-form action="{{ route('task.update', [$course, $lesson, $task->id]) }}" method="PUT">

    <div class="hidden" hidden>

        {{-- EDITABLE --}}
        <input type="text" name="name" value="{{ $task->name }}" class="task_name">
        <input type="text" name="body" value="{{ $task->body }}" class="task_body">
        {{-- NOT EDITABLE --}}
        <input type="text" name="id" value="{{ $task->id }}">
        <input type="text" name="task_type" value="{{ $task->task_type }}" class="task_type">
        <input type="text" name="lesson_id" value="{{ $task->lesson_id }}">

    </div>

</x-form>

<script>

if(document.querySelector('.task_type').value == 4)
{

    

}

</script>
@endsection
