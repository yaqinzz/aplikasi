@extends('layouts.mainlayouts')

@section('title','Delete Category')
@section('content')
    <h2>Are you sure to delete category{{ $category->name }}</h2>
    <div class="mt-5">
        <a href="/category-destroy/{{ $category->slug }}" class="btn btn-danger me-5">Sure</a>
        <a href="/categories" class="btn btn-info">Cancel</a>
    </div>
@endsection