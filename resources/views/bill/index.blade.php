@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-9">
        <h4>Hi, <b>{{ auth()->user()->name }}</b>. Welcome to your account</h4>

        <h2 class="mt-5">Current Bills</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Billing Period</th>
                    <th>Due Date</th>
                    <th>Bill Total</th>
                    <th>Balance Due</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->custom_text_value1 }}</td>
                    <td>{{ $item->due_date }}</td>
                    <td>{{ $item->amount }}</td>
                    <td>{{ $item->balance }}</td>
                    <td><a href="{{ url('bill/view/'.$item->id) }}">View Bill</a></td>
                    <td><button class="btn btn-outline-primary">Pay</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <h2>Provide a Review</h2>
        
        <div class="d-flex bd-highlight mb-3">
            <div class="mr-auto p-2 bd-highlight">
                <p class="text-muted">Encourage others to reduce their carbon foot print</p>
            </div>
            <div class="p-2 bd-highlight">
                <button class="btn btn-outline-primary btn-lg">Add Review</button>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <h3>Share Your Montly Infographic</h3>
        <p class="text-muted">Take credit for the environmental good you’ve done and let people know renewable energy is a simple option available to them.</p>

        <img src="assets/images/ad.png" class="w-100"/>

        <div class="btn-group mt-3 w-100">
            <a class="btn btn-primary" href="#">
                <i class="fab fa-facebook-f"> </i></a>
            <a class="btn btn-primary" href="#">
                <i class="fab fa-twitter"> </i></a>
            <a class="btn btn-primary" href="#">
                <i class="fab fa-instagram"> </i></a>
            <a class="btn btn-primary" href="#">
                <i class="fab fa-linkedin-in"> </i></a>
            <a class="btn btn-primary" href="#">
                <i class="far fa-envelope"> </i></a>
        </div>
        
        <a href="#">Download</a>
    </div>
</div>
@endsection

@section('js')
@endsection
