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
        @for($i = 0; $i < 7; $i ++)
        <tr>
            <td>0001</td>
            <td>Manual entry</td>
            <td>ACH</td>
            <td>$159.34</td>
            <td>Mar 12, 2017</td>
            <td><label class="badge badge-success">Completed</label></td>
        </tr>
        @endfor
    </tbody>
</table>
@endsection

@section('js')
@endsection
