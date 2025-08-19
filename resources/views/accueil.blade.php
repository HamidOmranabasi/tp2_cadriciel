@extends('layouts.app')
@section('title', 'Accueil')
@section('content')
{{ session()->get('locale') }}
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5 mth">
            <h4 class="display-one mt-5">@lang('lang.proj_name') {{ config('app.name')}}</h4>
            <br>
            <h1>@lang('lang.msg_welcome')</h1>
            
        </div>
    </div>
</div>
@if(!Auth::user())
<br>
    <h2 class="alert text-center">@lang('lang.msg_connection')</h2>
    <div class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 pt-4">
                    <div class="card">
                        <h3 class="card-header text-center">@lang('lang.login')</h3>
                        <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> {{session('success')}}</strong> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            @if(!$errors->isEmpty())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            
                            
                                <form action="" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="email" placeholder="@lang('lang.email')" class="form-control" name="email" value="{{ old('email')}}">
                                    @if($errors->has('email'))
                                        <div class="text-danger mt-2">
                                            {{ $errors->first('email')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="@lang('lang.password')" class="form-control" name="password">
                                    @if($errors->has('password'))
                                        <div class="text-danger mt-2">
                                            {{ $errors->first('password')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <input type="submit" value="@lang('lang.btn_connect')" class="btn btn-dark btn-block">
                                </div>
                            </form>
                            <br>
                            <div id="Marcos">
                                <p>@lang('lang.forMVS') Marcos Sanches:</p>
<<<<<<< HEAD
                                <p>@lang('lang.user'): good4college.com@gmail.com</p>
=======
                                <p>@lang('lang.user'): Marcos@good4college.com</p>
>>>>>>> 20d2e20 (Fix Login issue)
                                <p>@lang('lang.pass'): 123456</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection