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
                            <h1>@lang('lang.listFiles')</h1>
                        </div>
                        <br><br>
                        <div class="col-md-4">
                        <a href="{{ route('file.ajoute')}}" class="btn btn-info">@lang('lang.addFiles')</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                        <th scope="col">@lang('lang.titleFile')</th>
                                        <th scope="col">@lang('lang.typeFile')</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">@lang('lang.btn_download')</th>
                                        <th>Modification</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @forelse($files as $file)

                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $file->titre }}</td>
                                            <td>{{ $file->ext }}</td>
                                            <td>{{ $file->size }} k</td>
                                            <td><a href="{{ route('file.detaile', $file->id)}}" class="btn btn-success btn-sm">@lang('lang.btn_download')</a></td>
                                            @if(Auth::user()-> id == $file->etudientsId)
                                                <td><a href="{{ route('file.detaile', $file->id)}}" class="btn btn-primary btn-sm">@lang('lang.btn_editable')</a></td>
                                                @else
                                                <td><a href="{{ route('file.detaile', $file->id)}}" class="btn btn-light disabled barre">@lang('lang.btn_editable')</a></td>

                                            @endif
                                            @empty
                                                <td>Aucun file trouvé !</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">{{$files }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection