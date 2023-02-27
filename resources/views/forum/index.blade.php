@extends('layouts.app')
@section('title', 'Liste des posts')
@section('content')
{{ session()->get('locale') }}
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card mth">
                        <div class="card-header">
                            <h1>@lang('lang.listArticle')</h1>
                            <h4>@lang('lang.msgArticle')</h4>
                        </div>
                        <br><br>
                        <div class="col-md-4">
                        <a href="{{ route('forum.create')}}" class="btn btn-info">@lang('lang.addArticle')</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                        <th scope="col">@lang('lang.titleArticle')</th>
                                        <th scope="col">@lang('lang.authrArticle')</th>
                                        <th scope="col">@lang('lang.detaiArticle')</th>
                                        <th>Modification</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($blogs as $blog)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $blog->titre }}</td>
                                            <td>{{ $blog->postHasUser->name }}</td>
                                            <td><a href="{{ route('forum.show', $blog->id)}}" class="">@lang('lang.showArticle')</a></td>
                                            <div hidden>
                                                @if(Auth::user()-> id != $blog->postHasUser-> id)
                                                    {{ $editable = "disabled btn-light" }}
                                                @else
                                                    {{ $editable = "" }}
                                                @endif
                                            </div>
                                            <td><a href="{{ route('forum.show', $blog->id)}}" class="btn btn-primary btn-sm {{$editable}}">Editer</a></td>
                                            @empty
                                                <td>Aucun article trouvé !</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">{{$blogs }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection