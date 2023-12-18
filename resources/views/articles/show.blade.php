@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $article->title  }}</div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong> Content: </strong>{{ $article->full_text}}
                    </div>
                    <div class="mb-3">
                        <strong> Date Created: </strong>{{$article->created_at }}
                    </div>
                    @if ($article->published_at)
                        <div class="mb-3">
                            <strong> Date Published: </strong>{{ $article->published_at}}                    
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection