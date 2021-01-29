@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Categoria: {{ $category->name }}</h1>
                
            </div>
        </div>
    </div>
@endsection
