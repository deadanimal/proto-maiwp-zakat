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
            <h3>Pungutan Zakat</h3>

            <div class="col-12">

                <form method="POST" action="/pungutanzakats">
                    @csrf
                    <div class="form-group">
                        <label for="">Pegawai ID :</label>
                        <input class="form-control mb-3" type="text" name="pegawai_id">
                        <label for="">Jumlah :</label>
                        <input class="form-control mb-3" type="text" name="jumlah">
                        <label for="">Tarikh :</label>
                        <input class="form-control mb-3" type="text" name="tarikh">
                        <div class="form-group">
                            <label name="status">Jenis Pungutan :</label>
                            <select class="form-control" id="sel1" name="jenis_pungutan">
                                <option hidden selected> Sila Pilih </option>
                                <option value="duit">Duit</option>
                                <option value="makanan">Makanan</option>
                            </select>
                        </div>

                        </br>

                    </div>
                    <input type="hidden" name="pungutan zakat" value=1>
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </form>

                <div class="row my-4">
                    <div class="col-12">
                        <h3>Pungutan Zakat</h3>
                        <table class="table table-bordered">
                            <tr>
                                <th>Pegawai ID</th>
                                <th>Jumlah</th>
                                <th>Tarikh </th>
                                <th>Jenis Pungutan </th>

                            </tr>
                            @foreach ($pungutanzakats as $pungutanzakat)
                            <tr>
                                <td>{{ $pungutanzakat['pegawai_id'] }}</td>
                                <td>{{ $pungutanzakat['jumlah'] }}</td>
                                <td>{{ $pungutanzakat['tarikh'] }}</td>
                                <td>{{ $pungutanzakat['jenis_pungutan'] }}</td>

                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <form action="/fails" method="post" enctype="multipart/form-data">
                    <h3 class="text-center mb-5">Muat naik Borang Pungutan Pemberi</h3>
                    @csrf
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    @if (count($errors) > 0)
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
        <div class="chart col-6">
            <div id="chartdiv"></div>
        </div>
    </div>
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

    var chart = am4core.create("chartdiv", am4charts.PieChart3D);
    chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

    chart.legend = new am4charts.Legend();

    chart.data = [{
            country: "Selangor",
            litres: 501.9
        },
        {
            country: "K.L",
            litres: 301.9
        },
        {
            country: "Penang",
            litres: 201.1
        },
        {
            country: "Pahang",
            litres: 165.8
        },
        {
            country: "Kedah",
            litres: 139.9
        },
        {
            country: "Johor",
            litres: 128.3
        },
        {
            country: "Perlis",
            litres: 99
        },
        {
            country: "Melaka",
            litres: 60
        },
        {
            country: "S & S",
            litres: 50
        }
    ];

    var series = chart.series.push(new am4charts.PieSeries3D());
    series.dataFields.value = "litres";
    series.dataFields.category = "country";

}); // end am4core.ready()
</script>



@stop