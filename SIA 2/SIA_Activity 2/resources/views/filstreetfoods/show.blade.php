@extends('layouts.app')

@section('title', 'Food Details')

@section('content')
<div class="card">
    <img src="{{ asset('images/'.$filstreetfood['image']) }}" class="card-img-top" style="height:300px; object-fit:cover;">

    <div class="card-body">
        <h2>{{ $filstreetfood['name'] }}</h2>

        <p><strong>Description:</strong> {{ $filstreetfood['description'] }}</p>
        <p><strong>Category:</strong> {{ $filstreetfood['category'] }}</p>
        <p><strong>Origin:</strong> {{ $filstreetfood['origin'] }}</p>
        <p><strong>Ingredients:</strong> {{ $filstreetfood['ingredients'] }}</p>
        <p><strong>Calories:</strong> {{ $filstreetfood['calories'] }}</p>
        <p><strong>Price:</strong> {{ $filstreetfood['price'] }}</p>

        <a href="{{ url('/filstreetfoods') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
</div>
@endsection