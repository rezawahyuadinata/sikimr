@extends('layouts.layout_menu_all')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <center><h3 class="box-title">Pengadaan Barang & Jasa</h3></center>
            </div>
            <div class="box-body">
                <figure class="highcharts-figure">
                    <div id="grafik" height="200" style="height: 380px;"></div>
                </figure>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <center><h3 class="box-title">Pengaduan</h3></center>
            </div>
            <div class="box-body">
                <center><h3 class="box-title">Lokasi Pengaduan</h3></center>
                <figure class="highcharts-figure">
                    <div id="mapid" height="150" style="height: 400px;  overflow: hidden">
                </figure>
            </div>
        </div>
    </div>
</div>
 <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8">
            <div class="box">
              <div class="box-header with-border">
                <div class="d-flex justify-content-between">
                 <center><h3 class="card-title">Grafik KKN</h3></center> 
                </div>
              </div>
              <div class="card-body">
                   <figure class="highcharts-figure">
                  <div id="kkn" height="460" style="height: 340px;">
                </div>
                   </figure>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
            <div class="box">
              <div class="box-header with-border">
                <div class="d-flex justify-content-between">
                  <center><h3 class="card-title">Status BPL</h3></center>
                </div>
              </div>
              <div class="card-body">
                  <figure class="highcharts-figure">
                  <div id="bpl" height="160" style="height: 340px;  overflow: hidden">
                </div>
                  </figure>
              </div>
            </div>
            </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div></div>

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/material.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>      
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_material);
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("bpl", am4charts.PieChart);
chart.startAngle = 160;
chart.endAngle = 380;

// Let's cut a hole in our Pie chart the size of 40% the radius
chart.innerRadius = am4core.percent(40);

// Add data
chart.data = [{
  "label": "Belum Tidak Lanjut",
  "litres": 501.9,
  "bottles": 1500
}, {
  "label": "Proses",
  "litres": 30.9,
  "bottles": 990
},{
  "label": "Selesai",
  "litres": 39,
  "bottles": 990
}];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "label";
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
pieSeries2.dataFields.category = "label";
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
  return "[font-size:18px]JUMLAH[/]\n[bold font-size:30px]" + pieSeries.dataItem.values.value.sum + "[/]";
})

}); // end am4core.ready()
</script>
<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_material);
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("kkn", am4charts.PieChart);

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "label";

// Let's cut a hole in our Pie chart the size of 30% the radius
chart.innerRadius = am4core.percent(30);

// Put a thick white border around each Slice
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;
pieSeries.slices.template
  // change the cursor on hover to make it apparent the object can be interacted with
  .cursorOverStyle = [
    {
      "property": "cursor",
      "value": "pointer"
    }
  ];

pieSeries.alignLabels = false;
pieSeries.labels.template.bent = false;
pieSeries.labels.template.radius = 3;
pieSeries.labels.template.padding(0,0,0,0);

pieSeries.ticks.template.disabled = true;

// Create a base filter effect (as if it's not there) for the hover to return to
var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
shadow.opacity = 0;

// Create hover state
var hoverState = pieSeries.slices.template.states.getKey("hover"); // normally we have to create the hover state, in this case it already exists

// Slightly shift the shadow and make it more prominent on hover
var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
hoverShadow.opacity = 0.7;
hoverShadow.blur = 5;

// Add a legend
chart.legend = new am4charts.Legend();

chart.data = [{
  "label": "Korupsi",
  "litres": 501.9
},{
  "label": "Kolusi",
  "litres": 165.8
}, {
  "label": "Persekongkolan",
  "litres": 165.8
},{
  "label": "Penyalahgunaan Wewenang",
  "litres": 165.8
},{
  "label": "Ketidaktaatan Pekerjaan",
  "litres": 165.8
},{
  "label": "Penipuan Kontrak",
  "litres": 165.8
},{
  "label": "Nepotisme",
  "litres": 139.9
}];

}); // end am4core.ready()
</script>
<script>
    var urlGrafik = '{{ route( "pengadaan-barang.get_grafik") }}';
</script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
<!-- Resources -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
<script>
    var map = L.map('mapid').setView([-5.439840185658451, 106.81662399891715], 4);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            
</script>

<script>
    var blueIcon = new L.Icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-blue.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });
            // var greenIcon = new L.Icon({
            //     iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png',
            //     shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            //     iconSize: [25, 41],
            //     iconAnchor: [12, 41],
            //     popupAnchor: [1, -34],
            //     shadowSize: [41, 41]
            // });
            // var redIcon = new L.Icon({
            //     iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
            //     shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            //     iconSize: [25, 41],
            //     iconAnchor: [12, 41],
            //     popupAnchor: [1, -34],
            //     shadowSize: [41, 41]
            // });
            // var orangeIcon = new L.Icon({
            //     iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-orange.png',
            //     shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            //     iconSize: [25, 41],
            //     iconAnchor: [12, 41],
            //     popupAnchor: [1, -34],
            //     shadowSize: [41, 41]
            // });
</script>

@foreach ($data->map as $item)
@if ($item->lat && $item->long)

<script>
    // var lat = {{ $item->lat }}
    // var long = {{ $item->long }}
    // // var tempat = {{ $item->Tempat }};
    // console.log(lat,long)
    L.marker([{{ $item->lat }}, {{ $item->long }}], {icon : blueIcon}).bindPopup('{{ $item->Tempat }}').addTo(map);
</script>

@endif
@endforeach

@endsection
