@extends('layouts.app')
@section('title', 'Accueil')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5 mth">
                <h1 class="display-one mt-5">@lang('lang.dashboard')</h1>
                <br>
                <a href="{{ route('forum.index')}}" class="btn btn-outline-primary">@lang('lang.goToForum')</a>
                <a href="{{ route('depot.index')}}" class="btn btn-outline-primary">@lang('lang.goToDir')</a>
            </div>
        </div>
    </div>
@endsection
