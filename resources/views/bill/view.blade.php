@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-9">
        <h2 class="mt-5">Billing</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Unit Cost</th>
                    <th>Qty / kWh</th>
                    <th>Line Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data->invoice_items as $index => $item)
                <tr>
                    <td>{{ $index }}</td>
                    <td>{{ $item->tax_name1 }}</td>
                    <td>{{ $item->cost }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->cost * $item->qty }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
@endsection
