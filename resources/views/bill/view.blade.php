@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-9">
        <h2 class="mt-5">Billing</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Billing Period</th>
                    <th>Total</th>
                    <th>Balance Due</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @for($i = 0; $i < 7; $i ++)
                <tr>
                    <td>216</td>
                    <td>Feb 13-Mar 16,2018</td>
                    <td>$72.63</td>
                    <td>$159.34</td>
                    <td>Mar 12, 2017</td>
                    <td>Pay Now</td>
                    <td>View</td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
@endsection
