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
var rawData1 = [
    [year(1950), 1281], [year(1955), 1426],
    [year(1960), 1589], [year(1965), 1766], [year(1970), 1944], [year(1975), 2156], [year(1980), 2283],
    [year(1985), 2467], [year(1990), 2668], [year(1995), 2892], [year(2000), 3104], [year(2005), 3299],
    [year(2010), 3510]
];
//North America
var rawData2 = [
    [year(1950), 17162], [year(1955), 18688],
    [year(1960), 20415], [year(1965), 21957], [year(1970), 23194], [year(1975), 24343], [year(1980), 25607],
    [year(1985), 26946], [year(1990), 28355], [year(1995), 29944], [year(2000), 31592], [year(2005), 33216],
    [year(2010), 34412]
];
//Latin America
var rawData3 = [
    [year(1950), 16710], [year(1955), 19080],
    [year(1960), 20930], [year(1965), 25045], [year(1970), 28486], [year(1975), 32191], [year(1980), 36140],
    [year(1985), 40147], [year(1990), 44153], [year(1995), 48110], [year(2000), 52023], [year(2005), 55828],
    [year(2010), 59095]
];

var dataSet = [
    { label: "Latin America", data: rawData3, color: "#00B503"},
    { label: "North America", data: rawData2, color: "#ED7B00" },
    { label: "Oceania", data: rawData1, color: "#E8E800" }
];

var options = {
    series: {
        bars: {
            show: true,
            fill: true,
            barWidth: 1
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
        axisLabel: "Energy (kWh)",
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 3,
        tickFormatter: function (v, axis) {
            return $.formatNumber(v, { format: "#,###", locale: "us" });
        }
    },
    legend: {
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
