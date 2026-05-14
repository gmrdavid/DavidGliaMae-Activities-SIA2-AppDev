@extends('layouts.app')

@section('title', 'All Filipino Street Foods')

@section('content')
<h2>Filipino Street Food Menu</h2>
<div class="row">
    @foreach($filstreetfoods as $filstreetfood)
    <div class="col-md-4 mb-3">
        <div class="card">
            <img src="{{ asset('images/'.$filstreetfood['image']) }}" class="card-img-top" alt="{{ $filstreetfood['name'] }}" style="height:200px; object-fit:cover;">
            <div class="card-body">
                <h5 class="card-title">{{ $filstreetfood['name'] }}</h5>
                <p class="card-text">{{ $filstreetfood['price'] }}</p>
                <a href="{{ url('/filstreetfoods/'.$filstreetfood['id']) }}" class="btn btn-primary">View Details</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection