@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Categoria: {{ $category->name }}</h1>
                @foreach ($category->posts as $post)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title">
                                {{ $post->title }}
                            </h2>
                            <a href="{{ route('posts.show', ['slug' => $post->slug ]) }}" class="btn btn-primary">
                                Leggi
                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            Scritto da {{ $post->author }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
