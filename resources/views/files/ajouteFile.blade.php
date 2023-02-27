@extends('layouts.app')
@section('title', 'Ajouter')
@section('content')
{{ session()->get('locale') }}
<div class="container">
    <div class="row">
        <div class="col-12 text-center mt-2">
            <h1 class="display-one ">
                Ajouter un article
            </h1>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                 <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-4">
                    <label for="nomFichier">@lang('lang.labelFName')</label>
                            <input type="text" name="nomFichier" id="nomFichier" class="form-control nomFichier" placeholder="@lang('lang.fileTitle')" require>
                        <input type="file" name="file" class="form-control" accept=".zip,.doc,.pdf">
                    </div>

            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">@lang('lang.btn_save')</button>
        </form>
            </div>
        </div>
    </div>
</div>
@endsection