@extends('layouts.app')
@section('content')
@component('partials.menu')
    @slot('class')
        la la-home
    @endslot
    @slot('title')
        Tableau de bord
    @endslot
@endcomponent
@include('partials.messages')

@endsection
