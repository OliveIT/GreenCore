@extends('layouts.app')
@section('title')
    Referral
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Referral</h2>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Referee Name</th>
                    <th>Credit Amount</th>
                    <th>Date Credited</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($referrals as $referral)
                <tr>
                    <td>{{ $referral->name }}</td>
                    <td></td>
                    <?php $date = date_parse($referral->created_at); ?>
                    <td>{{ date("M d Y", mktime(0, 0, 0, $date["month"], $date["day"], $date["year"])) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <h2>Encourage Others</h2>
        <p>Let your friends and family know how easy and important it is to switch to sustainable energy. 
            They get 3 months of free upgrade to clean energy and you get 1 month of free upgrade, for anyone that signs up and completes the first billing cycle.
        </p>

        <button class="btn btn-outline-primary btn-lg" onclick="onReferNow()">Refer Now</button>
    </div>
</div>
@endsection

@section('js')
<script>
function onReferNow() {
    const referUrl = "<?=URL::to('/?refer_id='.Auth::user()->id)?>";
    const el = document.createElement('textarea');
    el.value = referUrl;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);

    alert("Referal url is copied to clipboard.");
}
</script>
@endsection
