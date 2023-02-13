@extends('layouts.mainlayouts')

@section('title','Profile')
    
@section('content')
 
 <div class="my-5">
    <h2>Your Rent Log</h2>
    <x-rent-log-table :rentlog='$rent_logs'/>
</div>
@endsection