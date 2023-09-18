@extends('layouts.main')

@section('main.title', )

{{ env('APP_NAME') }}
 |
{{ __('main.home_page')}}

@endsection

@section('main.content')

<h1>{{ __('main.home_page') }}</h1>

@endsection
