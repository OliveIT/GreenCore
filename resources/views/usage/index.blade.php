@extends('layouts.app')

@section('content')
<h2>Your Electricity Usage </h2>

<div id="flot-placeholder" style="height:400px;margin:0 auto"></div>
@endsection

@section('js')
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="/js/flot/excanvas.min.js"></script><![endif]-->
<script type="text/javascript" src="http://www.jqueryflottutorial.com/js/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="http://www.jqueryflottutorial.com/js/flot/jquery.flot.time.js"></script>    
<script type="text/javascript" src="http://www.jqueryflottutorial.com/js/flot/jshashtable-2.1.js"></script>    
<script type="text/javascript" src="http://www.jqueryflottutorial.com/js/flot/jquery.numberformatter-1.2.3.min.js"></script>
<script type="text/javascript" src="http://www.jqueryflottutorial.com/js/flot/jquery.flot.symbol.js"></script>
<script type="text/javascript" src="http://www.jqueryflottutorial.com/js/flot/jquery.flot.axislabels.js"></script>
<script>
//Oceania

var rawData = [];
var ticks = [];
var data = <?=json_encode($invData)?>;
var count = data.length;
var keys = Object.keys(data);
for (var i = keys.length - 1; i >= 0; i --) {
    const date = keys [i];
    rawData.push([keys.length - i, data [date]]);
    ticks.push([keys.length - i, date]);
}


var dataSet = [
    { label: "", data: rawData, color: "#00B503"},
];

var options = {
    series: {
        bars: {
            show: true
        }
    },
    bars: {
        align: "center",
        barWidth: 0.5
    },
    xaxis: {
        axisLabel: "Date",
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 10,
//        mode: "time",
//        timeformat: "%Y-%m"
        ticks: ticks
    },
    yaxis: {
        axisLabel: "Energy (kWh)",
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 3,
        tickFormatter: function (v, axis) {
            return v + " kWh";
        }
    },
    legend: {
        noColumns: 0,
        labelBoxBorderColor: "#000000",
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

function year(date) {
    return new Date(date).getTime();
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

    $(this).bind("plothover", function (event, pos, item) {
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
    });
};
</script>
@endsection
