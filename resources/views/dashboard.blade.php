@extends('base')

@section('content')

</br></br>
    <div class="row">
        

        <div class="chart col-6">  
            <div id="chartdiv"></div>
        </div>
        <div class="chart col-6">  
            <div id="chartdiv1"></div>
        </div>
        
    </div>
    <div class="chart col-12">  
            <div id="chartdiv2"></div>
        </div>
    

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart3D);

// Add data
chart.data = [{
  "country": "Selangor",
  "visits": 4025
}, {
  "country": "W.P Kuala Lumpur",
  "visits": 1882
}, {
  "country": "Penang",
  "visits": 1809
}, {
  "country": "Terengganu",
  "visits": 1322
}, {
  "country": "Kelantan",
  "visits": 1122
}, {
  "country": "Pahang",
  "visits": 1114
}, {
  "country": "W.P Putrajaya",
  "visits": 984
}, {
  "country": "Perak",
  "visits": 711
}, {
  "country": "Perlis",
  "visits": 665
}, {
  "country": "Johor",
  "visits": 580
}, {
  "country": "N.Sembilan",
  "visits": 443
}, {
  "country": "P.Langkawi",
  "visits": 441
}, {
  "country": "Melaka",
  "visits": 395
}, {
  "country": "Sabah",
  "visits": 386
}, {
  "country": "Sarawak",
  "visits": 384
}, {
  "country": "W.P Labuan",
  "visits": 338
}, {
  "country": "Selat",
  "visits": 328
}];

// Create axes
let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.labels.template.rotation = 270;
categoryAxis.renderer.labels.template.hideOversized = false;
categoryAxis.renderer.minGridDistance = 20;
categoryAxis.renderer.labels.template.horizontalCenter = "right";
categoryAxis.renderer.labels.template.verticalCenter = "middle";
categoryAxis.tooltip.label.rotation = 270;
categoryAxis.tooltip.label.horizontalCenter = "right";
categoryAxis.tooltip.label.verticalCenter = "middle";

let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.title.text = "Jumlah Zakat Terkumpul (K)";
valueAxis.title.fontWeight = "bold";

// Create series
var series = chart.series.push(new am4charts.ColumnSeries3D());
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "country";
series.name = "Visits";
series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;
columnTemplate.stroke = am4core.color("#FFFFFF");

columnTemplate.adapter.add("fill", function(fill, target) {
  return chart.colors.getIndex(target.dataItem.index);
})

columnTemplate.adapter.add("stroke", function(stroke, target) {
  return chart.colors.getIndex(target.dataItem.index);
})

chart.cursor = new am4charts.XYCursor();
chart.cursor.lineX.strokeOpacity = 0;
chart.cursor.lineY.strokeOpacity = 0;

}); // end am4core.ready()
</script>


</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv1", am4charts.PieChart);
chart.startAngle = 160;
chart.endAngle = 380;

// Let's cut a hole in our Pie chart the size of 40% the radius
chart.innerRadius = am4core.percent(40);

// Add data
chart.data = [{
  "country": "Wang Tunai ",
  "litres": 501.9,
  "bottles": 1500
}, {
  "country": "Keperluan Asas",
  "litres": 301.9,
  "bottles": 990
}, {
  "country": "",
  "litres": 201.1,
  "bottles": 785
}, {
  "country": "Barang Perniagaan",
  "litres": 165.8,
  "bottles": 255
}, {
  "country": "Emas",
  "litres": 139.9,
  "bottles": 452
}, {
  "country": "Tempat Tinggal",
  "litres": 128.3,
  "bottles": 332
}, {
  "country": "Perubatan",
  "litres": 99,
  "bottles": 150
}, {
  "country": "Mobiliti",
  "litres": 60,
  "bottles": 178
}, {
  "country": "Perubatan",
  "litres": 50,
  "bottles": 50
}];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = new am4core.InterfaceColorSet().getFor("background");
pieSeries.slices.template.strokeWidth = 1;
pieSeries.slices.template.strokeOpacity = 1;

// Disabling labels and ticks on inner circle
pieSeries.labels.template.disabled = true;
pieSeries.ticks.template.disabled = true;

// Disable sliding out of slices
pieSeries.slices.template.states.getKey("hover").properties.shiftRadius = 0;
pieSeries.slices.template.states.getKey("hover").properties.scale = 1;
pieSeries.radius = am4core.percent(40);
pieSeries.innerRadius = am4core.percent(30);

var cs = pieSeries.colors;
cs.list = [am4core.color(new am4core.ColorSet().getIndex(0))];

cs.stepOptions = {
  lightness: -0.05,
  hue: 0
};
cs.wrap = false;


// Add second series
var pieSeries2 = chart.series.push(new am4charts.PieSeries());
pieSeries2.dataFields.value = "bottles";
pieSeries2.dataFields.category = "country";
pieSeries2.slices.template.stroke = new am4core.InterfaceColorSet().getFor("background");
pieSeries2.slices.template.strokeWidth = 1;
pieSeries2.slices.template.strokeOpacity = 1;
pieSeries2.slices.template.states.getKey("hover").properties.shiftRadius = 0.05;
pieSeries2.slices.template.states.getKey("hover").properties.scale = 1;

pieSeries2.labels.template.disabled = true;
pieSeries2.ticks.template.disabled = true;


var label = chart.seriesContainer.createChild(am4core.Label);
label.textAlign = "middle";
label.horizontalCenter = "middle";
label.verticalCenter = "middle";
label.adapter.add("text", function(text, target){
  return "[font-size:18px]Jumlah Bantuan Mengikut Merchant[/]:\n[bold font-size:30px]" ;
})

}); // end am4core.ready()
</script>

</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv2", am4charts.PieChart);

// Add data
chart.data = [ {
  "country": "Sara Diri Rumah",
  "litres": 501.9
}, {
  "country": "Pengajian",
  "litres": 301.9
}, {
  "country": "Asnaf",
  "litres": 201.1
}, {
  "country": "Fakir",
  "litres": 165.8
}, {
  "country": "Muallaf",
  "litres": 139.9
}, {
  "country": "Fisabillah",
  "litres": 128.3
}, {
  "country": "Musaffir",
  "litres": 99
}, {
  "country": "Amil",
  "litres": 60
}, {
  "country": "Ibnu Sabil",
  "litres": 50
} ];

// Set inner radius
chart.innerRadius = am4core.percent(50);

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

var label = chart.seriesContainer.createChild(am4core.Label);
label.textAlign = "middle";
label.horizontalCenter = "middle";
label.verticalCenter = "middle";
label.adapter.add("text", function(text, target){
  return "[font-size:18px]Jumlah agihan Mengikut Merchant (K) [/]:\n[bold font-size:30px]" + pieSeries.dataItem.values.value.sum + "[/]";
})

}); // end am4core.ready()
</script>

</br></br></br></br></br>




@stop