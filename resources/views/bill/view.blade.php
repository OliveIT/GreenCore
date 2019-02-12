@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Billing</h2>

        <!-- <table class="table">
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
        </table> -->
        <object data="data:application/pdf;base64,<?=base64_encode($pdf)?>" type="application/pdf" style="height:700px;width:100%"></object>
        
        <div class="form-group text-right">
            <a class="btn btn-outline-primary" href="{{ url('/bill') }}">Back</a>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
