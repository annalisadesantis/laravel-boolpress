@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Tutti i tags
                </h1>
                @foreach ($tags as $tag)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title">
                                <a href="{{ route('tags.show', ['slug' => $tag->slug ])}}">
                                    {{ $tag->name }}
                                </a>
                            </h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
