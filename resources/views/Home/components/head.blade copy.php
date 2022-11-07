{{-- Contoh Pertama --}}
{{-- <div class="container-fluid">
    <div class="row pt-3 px-2 ">
        <div class="col-md-8">
            <div class="bg-secondary border border-2 rounded-2 ms-auto" style="min-height: 80vh">
                <div class="container-fluid"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-2 ms-auto" style="min-height: 60vh">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 p-3 border border-1 bg-secondary" style="min-height: 80px">
                            <div class="container">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 my-3">
                            <div class="card">
                                <img src="..." style="min-height: 120px" class="card-img bg-secondary"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 my-3">
                            <div class="card">
                                <img src="..." style="min-height: 120px" class="card-img bg-secondary"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 my-3">
                            <div class="card">
                                <img src="..." style="min-height: 120px" class="card-img bg-secondary"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 my-3">
                            <div class="card">
                                <img src="..." style="min-height: 120px" class="card-img bg-secondary"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- Styles -->
<style>
    #chartdiv {
        width: 100%;
        height: 500px
    }
</style>

{{-- Contoh Kedua --}}
<div class="container-fluid">
    <div class="row pt-3 px-2 ">
        <div class="col-md-8">
            <div class=" ms-auto" style="min-height: 80vh">
                {{-- manajemen Risiko --}}
                <div class="container" style="min-height: 10vh; width: 50%">
                    <h3 class="text-center">Manajemen Risiko</h3>
                    <h5 class="text-center" style="font-size: 14px" id="status_dataMR""></h5>
                </div>
                <div class="container mt-1 mb-3" style="min-height: 58vh; width: 100%">
                    <div id="chartdiv"></div>
                </div>
                {{-- button Controls --}}
                <div class="overflow-hidden">
                    <div class="container overflow-auto mt-4 d-flex px-5" style="width: 100%; ">
                        <a href=""
                            class="container d-flex justify-content-center align-items-center rounded rounded-3 mx-2 text-decoration-none"
                            style="height: 7vh; border: 2px solid black">
                            <div class="text-center text-control-button">Manajemen Risiko</div>
                        </a>
                        <a href=""
                            class="container d-flex justify-content-center align-items-center rounded rounded-3 mx-2 text-decoration-none"
                            style="height: 7vh; border: 2px solid black">
                            <div class="text-center text-control-button">Pengadaan Barang Jasa</div>
                        </a>
                        <a href=""
                            class="container d-flex justify-content-center align-items-center rounded rounded-3 mx-2 text-decoration-none"
                            style="height: 7vh; border: 2px solid black">
                            <div class="text-center text-control-button">Zona Integritas</div>
                        </a>
                        <a href=""
                            class="container d-flex justify-content-center align-items-center rounded rounded-3 mx-2 text-decoration-none"
                            style="height: 7vh; border: 2px solid black">
                            <div class="text-center text-control-button">Pengaduan</div>
                        </a>
                        <a href=""
                            class="container d-flex justify-content-center align-items-center rounded rounded-3 mx-2 text-decoration-none"
                            style="height: 7vh; border: 2px solid black">
                            <div class="text-center text-control-button">SOP</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-2 ms-auto" style="min-height: 40vh">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 p-2">
                            <div class="d-flex container-fluid justify-content-between">
                                <h3 class="d-inline align-self-center">Berita Terbaru</h3>
                                <a href="" class="text-danger" style="text-decoration: none">
                                    <p class="d-inline align-self-center">Lihat Selengkapnya</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 my-3">
                            <div class="card">
                                <img src="..." style="min-height: 120px" class="card-img bg-secondary"
                                    alt="...">
                                <div class="card-body" style="height: 200px;">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 my-3">
                            <div class="card">
                                <img src="..." style="min-height: 120px" class="card-img bg-secondary"
                                    alt="...">
                                <div class="card-body" style="height: 200px;">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" rounded-2 my-2 ms-auto" style="min-height: 36vh">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 p-2">
                            <div class="d-flex container-fluid justify-content-between">
                                <h3 class="d-inline align-self-center">Tutorial</h3>
                                <a href="" class="text-danger" style="text-decoration: none">
                                    <p class="d-inline align-self-center">Lihat Selengkapnya</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="card my-3 text-bg-dark">
                        <img src="..." style="height: 270px" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                to
                                additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small>Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- contoh Ketiga --}}
{{-- <div class="swiper headerSwiper">
    <div class="swiper-wrapper">
        <style>
            .size-background {
                width: 100%;
                height: 90vh;
            }
        </style>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-1.jpg" />
        </div>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-2.jpg" />
        </div>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-3.jpg" />
        </div>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-4.jpg" />
        </div>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-5.jpg" />
        </div>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-6.jpg" />
        </div>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-7.jpg" />
        </div>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-8.jpg" />
        </div>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-9.jpg" />
        </div>
    </div>
</div> --}}

{{-- Contoh Keempat --}}
{{-- <div class="container-fluid">
    <div class="row pt-3 px-2 ">
        <div class="col-md-8">
            <div class="bg-secondary border border-2 rounded-2 ms-auto" style="min-height: 80vh">
                <div class="container-fluid"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="container bg-secondary" style="height: 10vh"></div>
            <div class="mb-2 border ms-auto d-inline-flex " style="max-height: 70vh">
                <ul class="list-group overflow-auto ">
                    <li class="list-group-item border-0 ">
                        <div class="card border-0 mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="..." class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit longer.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0 ">
                        <div class="card border-0 mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="..." class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit longer.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0 ">
                        <div class="card border-0 mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="..." class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit longer.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0 ">
                        <div class="card border-0 mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="..." class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit longer.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0 ">
                        <div class="card border-0 mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="..." class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit longer.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0 ">
                        <div class="card border-0 mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="..." class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit longer.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0 ">
                        <div class="card border-0 mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="..." class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit longer.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0 ">
                        <div class="card border-0 mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="..." class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit longer.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0 ">
                        <div class="card border-0 mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="..." class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit longer.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0 ">
                        <div class="card border-0 mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="..." class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit longer.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0 ">
                        <div class="card border-0 mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="..." class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit longer.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> --}}

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/data/countries2.js"></script>

<!-- Chart code -->
<script>
    am5.ready(function() {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");

        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        // Create the map chart
        // https://www.amcharts.com/docs/v5/charts/map-chart/
        var chart = root.container.children.push(am5map.MapChart.new(root, {
            panX: "rotateX",
            projection: am5map.geoMercator(),
            layout: root.horizontalLayout
        }));

        am5.net.load("https://www.amcharts.com/tools/country/?v=xz6Z", chart).then(function(result) {
            var geo = am5.JSONParser.parse(result.response);
            loadGeodata(geo.country_code);
        });

        // Create polygon series for continents
        // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
        var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
            calculateAggregates: true,
            valueField: "value"
        }));

        polygonSeries.mapPolygons.template.setAll({
            tooltipText: "{name}",
            interactive: true
        });

        polygonSeries.mapPolygons.template.states.create("hover", {
            fill: am5.color(0x677935)
        });

        polygonSeries.set("heatRules", [{
            target: polygonSeries.mapPolygons.template,
            dataField: "value",
            min: am5.color(0x8ab7ff),
            max: am5.color(0x25529a),
            key: "fill"
        }]);

        polygonSeries.mapPolygons.template.events.on("pointerover", function(ev) {
            heatLegend.showValue(ev.target.dataItem.get("value"));
        });

        function loadGeodata(country) {

            // Default map
            var defaultMap = "usaLow";

            if (country == "US") {
                chart.set("projection", am5map.geoAlbersUsa());
            } else {
                chart.set("projection", am5map.geoMercator());
            }

            // calculate which map to be used
            var currentMap = defaultMap;
            var title = "";
            if (am5geodata_data_countries2[country] !== undefined) {
                currentMap = am5geodata_data_countries2[country]["maps"][0];

                // add country title
                if (am5geodata_data_countries2[country]["country"]) {
                    title = am5geodata_data_countries2[country]["country"];
                }
            }

            am5.net.load("https://cdn.amcharts.com/lib/5/geodata/json/" + currentMap + ".json", chart).then(
                function(result) {
                    var geodata = am5.JSONParser.parse(result.response);
                    var data = [];
                    for (var i = 0; i < geodata.features.length; i++) {
                        data.push({
                            id: geodata.features[i].id,
                            value: Math.round(Math.random() * 10000)
                        });
                    }

                    polygonSeries.set("geoJSON", geodata);
                    polygonSeries.data.setAll(data)
                });

            chart.seriesContainer.children.push(am5.Label.new(root, {
                x: 5,
                y: 5,
                text: title,
                background: am5.RoundedRectangle.new(root, {
                    fill: am5.color(0xffffff),
                    fillOpacity: 0.2
                })
            }))

        }

        var heatLegend = chart.children.push(
            am5.HeatLegend.new(root, {
                orientation: "vertical",
                startColor: am5.color(0x8ab7ff),
                endColor: am5.color(0x25529a),
                startText: "Lowest",
                endText: "Highest",
                stepCount: 5
            })
        );

        heatLegend.startLabel.setAll({
            fontSize: 12,
            fill: heatLegend.get("startColor")
        });

        heatLegend.endLabel.setAll({
            fontSize: 12,
            fill: heatLegend.get("endColor")
        });

        // change this to template when possible
        polygonSeries.events.on("datavalidated", function() {
            heatLegend.set("startValue", polygonSeries.getPrivate("valueLow"));
            heatLegend.set("endValue", polygonSeries.getPrivate("valueHigh"));
        });

    }); // end am5.ready()
</script>
