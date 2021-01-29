@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Tutte le categorie
                </h1>
                @foreach ($categories as $category)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title">
                                <a href="{{ route('categories.show', ['slug' => $category->slug ])}}">
                                    {{ $category->name }}
                                </a>
                            </h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
