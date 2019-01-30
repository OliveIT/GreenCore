@extends('layouts.app')

@section('content')
<h2>Payment History</h2>

<table class="table">
    <thead>
        <tr>
            <th>Invoice</th>
            <th>Transaction Reference</th>
            <th>Method</th>
            <th>Payment Amount</th>
            <th>Payment Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->invoice_number }}</td>
            <td>{{ $item->transaction_reference }}</td>
            <td>{{ $item->payment_type_id }}</td>
            <td>$ {{ $item->amount }}</td>
            <td>{{ $item->payment_date }}</td>
            <td><label class="badge badge-success">Completed</label></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('js')
@endsection
