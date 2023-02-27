@extends('layouts.app')
@section('title', 'Modification')
@section('content')
{{ session()->get('locale') }}
<div class="container">
    <div class="row">
        <div class="col-12 text-center mt-2">
            <h1 class="display-one ">
                Modiffication l'article
            </h1>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <form method="post">
                    @csrf
                    @method('put')
                    <div class="card-header">Veuillez modiffier l'article:</div>
                    <div class="card-body">
                        <div class="control-group col-12">
                            <label for="title">Titre du message</label>
                            <input type="text" id="titre" name="titre" class="form-control" value="{{$post->titre}}">
                        </div>
                        <br>
                        <div class="control-group col-12">
                            <label for="body">Message</label>
                            <textarea name="contenu" id="body" class="form-control"> {{ $post->contenu }} </textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="Mettre a jour" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection