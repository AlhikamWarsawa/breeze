@extends('layouts.app')

@section('content')
    <h1>{{ $category->name_cat }}</h1>
    <p>{{ $category->desc_cat }}</p>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
@endsection
