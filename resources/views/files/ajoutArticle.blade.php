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
                <form method="post">
                    @csrf
                    <div class="card-header">
                        Veuillez entrer informations dans le formullair si-desous:
                    </div>
                    <div class="card-body">
                        <div class="control-group col-12">
                            <label for="titre">Titre de post'</label>
                            <input type="text" id="titre" name="titre" class="form-control">
                        </div>
                        <br>
                        <div class="control-group col-12">
                            <label for="contenu">Contenu</label>
                            <textarea name="contenu" id="contenu" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="Sauvegarder" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection