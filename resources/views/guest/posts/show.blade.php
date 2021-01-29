@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h1 class="card-title">
                            {{ $post->title }}
                        </h1>
                        <p>
                            {{ $post->text }}
                        </p>
                    </div>
                    <div class="card-footer text-muted">
                        Categoria:
                        @if ($post->category)
                            <a href="{{ route('categories.show', ['slug' => $post->category->slug]) }}">
                                {{ $post->category->name }}
                            </a>
                        @else
                            -
                        @endif
                    </div>
                    <div class="card-footer text-muted">
                        Tags:
                        @forelse ($post->tags as $tag)
                            {{ $tag->name }}{{ !$loop->last ? ',' : '' }}
                        @empty
                            -
                        @endforelse
                    </div>
                    <div class="card-footer text-muted">
                        Scritto da {{ $post->author }}
                    </div>
                </div>
                <a href="{{ route('posts.index')}}" class="btn btn-primary">
                    Torna Indietro
                </a>
            </div>
        </div>
    </div>
@endsection
