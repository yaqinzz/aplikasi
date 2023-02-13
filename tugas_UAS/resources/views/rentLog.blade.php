@extends('layouts.mainlayouts')

@section('title','Dashboard')
    
@section('content')
    <h1>Rent Log List</h1>

    <div class="my-5">
        <x-rent-log-table :rentlog='$rent_logs'/>
    </div>
@endsection