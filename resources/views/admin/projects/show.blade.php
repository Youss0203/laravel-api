@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>
                {{ $project->nome }}
            </h2>
        </div>
        <div class="col-12">
            <h2 scope="row">
                {{ $project->id }}
            </h2>

            <p>
                {{$project->descrizione}}
            </p>

            <p>
                {{ $project->giorni }}
            </p>
            <p>
                {{ $project->linguaggi_usati }}
            </p>
            <div class="p-5">
                <p>
                    <em>
                         <a href="{{ $project->repo_url}}">{{ $project->repo_url}}</a>
                    </em>
                </p>
            </div>
                <button class="btn btn-sm btn-success">
                    Edit
                </button>
                <button class="btn btn-sm btn-warning">
                    Delete
                </button>
            </p>
        </tr>
        </div>
    </div>
</div>
@endsection