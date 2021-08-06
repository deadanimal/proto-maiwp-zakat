@extends('base')

@section('content')

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
</head>

<div class="container py-5">
    <div class="row">

        <div class="col-6 bg-light">

            <h3>MERCHANT</h3>
            <div class="row">
                <div class="col-12">

                    <form method="POST" action="/merchants">
                        @csrf
                        <div class="form-group">
                            <label for="">Merchant ID :</label>
                            <input class="form-control mb-3" type="text" name="merchant_id">
                            <label for="">User ID :</label>
                            <input class="form-control mb-3" type="text" name="user_id">
                            <label for="">Merchant Name :</label>
                            <input class="form-control mb-3" type="text" name="merchant_name">
                            <label for="">Lokasi :</label>
                            <input class="form-control mb-3" type="text" name="lokasi">
                            <label for="">Kuantiti :</label>
                            <input class="form-control mb-3" type="text" name="kuantiti">
                            <label for="">Jumlah :</label>
                            <input class="form-control mb-3" type="text" name="jumlah">
                            <div class="form-group">
                                <label name="status">Status :</label>
                                <select class="form-control" id="sel1" name="status">
                                    <option hidden selected> Sila Pilih </option>
                                    <option value="selesai">selesai</option>
                                    <option value="sedang">sedang</option>
                                    <option value="belum">belum</option>
                                </select>
                            </div>


                            </br>

                        </div>
                        <input type="hidden" name="merchant" value=1>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </form>

                    <div class="row my-4">
                        <div class="col-12">
                            <h3>Bukti Merchant</h3>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Merchant ID</th>
                                    <th>User ID</th>
                                    <th>Merchant Name</th>
                                    <th>Lokasi </th>
                                    <th>Kuantiti </th>
                                    <th>Jumlah</th>
                                    <th>Status </th>

                                </tr>
                                @foreach ($merchants as $merchant)
                                <tr>
                                    <td>{{ $merchant['merchant_id'] }}</td>
                                    <td>{{ $merchant['user_id'] }}</td>
                                    <td>{{ $merchant['merchant_name'] }}</td>
                                    <td>{{ $merchant['lokasi'] }}</td>
                                    <td>{{ $merchant['kuantiti'] }}</td>
                                    <td>{{ $merchant['jumlah'] }}</td>
                                    <td>{{ $merchant['status'] }}</td>

                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

                <div class="container mt-5">
                    <form action="/fails" method="post" enctype="multipart/form-data">
                        <h3 class="text-center mb-5">Muat naik gambar merchant</h3>
                        @csrf
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        @if (count($errors) >0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="chooseFile">
                            <label class="custom-file-label" for="chooseFile">Select file</label>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                            Upload Files
                        </button>
                    </form>

                </div>
            </div>
        </div>
        <div class="chart col-6">
            <div class="amchart" id="chartdiv"></div>
        </div>
    </div>



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
        var chart = am4core.create("chartdiv", am4charts.XYChart);
        chart.scrollbarX = new am4core.Scrollbar();

        // chart.data = [
        //     @foreach ($merchants as $merchant)
        //     {
        //         "country": $merchant->merchant_name,
        //         "visits": $merchant->kuantiti
        //     }

        //     @endforeach
        // ];

        chart.data = [{
            "country": "Selangor",
            "visits": 3025
        }, {
            "country": "Kuala Lumpur",
            "visits": 1882
        }, {
            "country": "Perak",
            "visits": 1809
        }, {
            "country": "Kelantan",
            "visits": 1322
        }, {
            "country": "Terengganu",
            "visits": 1122
        }, {
            "country": "Melaka",
            "visits": 1114
        }, {
            "country": "Sarawak",
            "visits": 984
        }, {
            "country": "Sabah",
            "visits": 711
        }, {
            "country": "Negeri Sembilan",
            "visits": 665
        }, {
            "country": "Pahang",
            "visits": 580
        }, {
            "country": "Kedah",
            "visits": 443
        }, {
            "country": "Perlis",
            "visits": 441
        }];


        // Create axes
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "country";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;
        categoryAxis.renderer.labels.template.horizontalCenter = "right";
        categoryAxis.renderer.labels.template.verticalCenter = "middle";
        categoryAxis.renderer.labels.template.rotation = 270;
        categoryAxis.tooltip.disabled = true;
        categoryAxis.renderer.minHeight = 110;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.minWidth = 50;
        valueAxis.title.text = "Jumlah Zakat yang selesai diagihkan (Negeri)";
        valueAxis.title.fontWeight = "bold";

        

        // Create series
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.sequencedInterpolation = true;
        series.dataFields.valueY = "visits";
        series.dataFields.categoryX = "country";
        series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
        series.columns.template.strokeWidth = 0;

        series.tooltip.pointerOrientation = "vertical";

        series.columns.template.column.cornerRadiusTopLeft = 10;
        series.columns.template.column.cornerRadiusTopRight = 10;
        series.columns.template.column.fillOpacity = 0.8;
        

        // on hover, make corner radiuses bigger
        var hoverState = series.columns.template.column.states.create("hover");
        hoverState.properties.cornerRadiusTopLeft = 0;
        hoverState.properties.cornerRadiusTopRight = 0;
        hoverState.properties.fillOpacity = 1;

        series.columns.template.adapter.add("fill", function(fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });
        

        // Cursor
        chart.cursor = new am4charts.XYCursor();
        

    }); // end am4core.ready()
    </script>


    @stop