@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h2>Total Monthly CO2 Savings by My Referrals</h2>
        <p>The environmental good you’ve made possible by introducing others to clean energy made simple.</p>

        <div id="flot-placeholder" style="height:400px;margin:0 auto"></div>

        <h5 class="text-center mt-5 mb-3">Total CO2 and Water Savings</h5>

        <div class="row">
            <div class="col-md-6">
                <div class="row box-co2-water">
                    <div class="col-md-4 text-center">
                        <img src="assets/images/tree.png"/>
                    </div>
                    <div class="col-md-8">
                        <div>
                            <h3><b>345</b>Tree Planted</h3>
                            <p class="feedback"><u>Learn more</u></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row box-co2-water">
                    <div class="col-md-4 text-center">
                        <img src="assets/images/water.png"/>
                    </div>
                    <div class="col-md-8">
                        <div>
                            <h3><b>430</b>Showers Skipped</h3>
                            <p class="feedback"><u>Learn more</u></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if(auth()->user()->user_role == 'Admin')
            You are Administrator!
        @else
            You are logged in!
        @endif
        <br>
        <br>
        <br>
        @if(auth()->user()->verified == '0')
            <div class="alert alert-danger">

                please <strong> verify </strong> your account.Without verification you can not
                submit your post!

            </div>
        @endif -->
    </div>
    <div class="col-md-4">
        <h2>My Referrals</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Referee Name</th>
                    <th>Credit Amount</th>
                    <th>Date Credited</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Jennifer Lindeman</td>
                    <td>$5.98</td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>Jennifer Lindeman</td>
                    <td>$5.98</td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>Jennifer Lindeman</td>
                    <td>$5.98</td>
                    <td>Pending</td>
                </tr>
            </tbody>
        </table>
        
        <h2>Encourage Others</h2>
        <p>Let your friends and family know how easy and important it is to switch to sustainable energy. 
            They get 3 months of free upgrade to clean energy and you get 1 month of free upgrade, for anyone that signs up and completes the first billing cycle.
        </p>

        <button class="btn btn-outline-primary btn-lg">Refer Now</button>
    </div>
</div>
@endsection

@section('js')
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="/js/flot/excanvas.min.js"></script><![endif]-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.time.min.js"></script>
<!-- <script type="text/javascript" src="http://www.jqueryflottutorial.com/js/flot/jshashtable-2.1.js"></script>
<script type="text/javascript" src="http://www.jqueryflottutorial.com/js/flot/jquery.numberformtter-1.2.3.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.symbol.min.js"></script>
<!-- <script type="text/javascript" src="http://www.jqueryflottutorial.com/js/flot/jquery.flot.axislabels.js"></script> -->
<script>
//Asia
var rawData6 = [
    [year(1800), 635], [year(1850), 809], [year(1900), 947], [year(1950), 1399], [year(1955), 1541],
    [year(1960), 1674], [year(1965), 1899], [year(1970), 2142], [year(1975), 2397], [year(1980), 2634],
    [year(1985), 2887], [year(1990), 3181], [year(1995), 3435], [year(2000), 3679], [year(2005), 3917],
    [year(2010), 4119]
];

var dataSet = [
    { label: "Asia", data: rawData6, color: "#84BD00" },
];

var options = {
    series: {
        lines: {
            show: true,
            fill: true
        }
    },
    xaxis: {
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 10,        
        mode: "time",
        tickSize: [20, "year"],
        timeformat: "%Y"
    },
    yaxis: {
        axisLabel: "Tree Planted",
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 3,
        /*tickFormatter: function (v, axis) {
            return $.formatNumber(v, { format: "#,###", locale: "us" });
        }*/
    },
    legend: {
        show: false,
        noColumns: 3,
        labelBoxBorderColor: "#858585",
        position: "nw"
    },
    grid: {
        hoverable: true,
        borderWidth: 2,
        backgroundColor: { colors: ["#ffffff", "#EDF5FF"] }
    }
};

$(document).ready(function () {
    $.plot($("#flot-placeholder"), dataSet, options);    
    $("#flot-placeholder").UseTooltip();
});

function year(year) {    
    return new Date(year, 1, 1).getTime();
}


var previousPoint = null, previousLabel = null;

$.fn.UseTooltip = function () {
    function showTooltip(x, y, color, contents) {
        $('<div id="tooltip">' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y - 10,
            left: x + 10,
            border: '2px solid ' + color,
            padding: '3px',
            'font-size': '9px',
            'border-radius': '5px',
            'background-color': '#fff',
            'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            opacity: 0.9
        }).appendTo("body");
    }

    /*$(this).bind("plothover", function (event, pos, item) {
        if (item) {
            if ((previousLabel != item.series.label) || 
                 (previousPoint != item.dataIndex)) {
                previousPoint = item.dataIndex;
                previousLabel = item.series.label;
                $("#tooltip").remove();

                var x = item.datapoint[0];
                var y = item.datapoint[1];

                var color = item.series.color;
                //alert(color)
                //console.log(item.series.xaxis.ticks[x].label);                
                
                showTooltip(item.pageX,
                        item.pageY,
                        color,
                        "<strong>" + item.series.label + "</strong><br>" + new Date(x).getFullYear() +
                        " : <strong>Population : " + $.formatNumber(y, { format: "#,###", locale: "us" }) + "</strong>  (multiply by 10,000)");                
            }
        } else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });*/
};
</script>
@endsection
