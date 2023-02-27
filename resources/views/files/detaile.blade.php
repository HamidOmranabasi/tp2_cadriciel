@extends('layouts.app')
@section('title', 'Détails')
@section('content')
{{ session()->get('locale') }}
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
        
            <a href="{{ route('forum.index') }}" class="btn btn-outline-secondary">← Retouner à la liste des article</a>
            <h4 class="display-one mt-2">{{ $forumPost->titre }}</h4>
            <p>Auteur: <strong>{{ $forumPost->postHasUser->name }}</strong> </p>
            <hr>
                <p> {{ $forumPost->contenu }}</p>
            <hr>
        </div>
    </div>
    @if(Auth::user()-> id != $forumPost->postHasUser-> id)
      {{ $editable = "disabled btn-light" }}
    @else
      {{ $editable = "" }}
    @endif
    <div class="row text-center mb-2" {{$editable}}>
        <div class="col-6">
            <a href="{{ route('forum.edit' , $forumPost->id) }}" class="btn btn-primary {{$editable}}">Modiffier</a>
        </div>
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger {{$editable}}" data-bs-toggle="modal" data-bs-target="#deleteModal">Effacer</button>           
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer un article</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Etes-vous certain de vouloir effacer cette donnée?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="" method="post">
                @csrf
                @method('delete')
            <input type="submit" class="btn btn-danger" value="Effacer">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection