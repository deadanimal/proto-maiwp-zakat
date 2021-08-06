@extends('base')

@section('content')


<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
</head>

<div class="container py-5">
    <div class="row">
        <div class="col-12">

            <h3>Penerima Zakat</h3>
            <table class="table table-bordered">
                <tr>
                    <th>User ID</th>
                    <th>Alamat</th>
                    <th>Jenis Bantuan </th>
                    <th>Status </th>
                    <th>Pendapatan</th>
                    <th>Barang Keperluan </th>



                </tr>
                @foreach ($penerimazakats as $penerimazakat)
                <tr>
                    <td>{{ $penerimazakat['user_id'] }}</td>
                    <td>{{ $penerimazakat['alamat'] }}</td>
                    <td>{{ $penerimazakat['jenis_bantuan'] }}</td>
                    <td>{{ $penerimazakat['status'] }}</td>
                    <td>{{ $mpenerimazakat['pendapatan'] }}</td>
                    <td>{{ $penerimazakat['barang_keperluan'] }}</td>

                </tr>
                @endforeach
            </table>

            <div class="container mt-5">
                <form action="/fails" method="post" enctype="multipart/form-data">
                    <h3 class="text-left mb-5 mt-10">Muat naik Dokumen Penerima Zakat</h3>
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



        <div class="col-12 bg-light">
            <h3>PENERIMA ZAKAT</h3>



            <form method="POST" action="/penerimazakats">
                @csrf
                <div class="form-group">
                    <label for="">User ID :</label>
                    <input class="form-control mb-3" type="text" name="user_id">
                    <label for="">Alamat :</label>
                    <input class="form-control mb-3" type="text" name="alamat">
                    <div class="form-group">
                        <label name="jenis_bantuan">Jenis Bantuan :</label>
                        <select class="form-control" name="jenis_bantuan">
                            <option hidden selected> Sila Pilih </option>
                            <option value="sara hidup">sara hidup</option>
                            <option value="pendidikan">pendidikan</option>
                            <option value="perubatan">perubatan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label name="status">Status :</label>
                        <select class="form-control" name="status">
                        <option hidden selected> Sila Pilih </option>
                            <option value="lulus">lulus</option>
                            <option value="gagal">gagal</option>
                        </select>
                    </div>
                    <label for="">Pendapatan :</label>
                    <input class="form-control mb-3" type="text" name="pendapatan">
                    <div class="form-group">
                        <label name="barang_keperluan">Barang Keperluan :</label>
                        <select class="form-control" name="barang_keperluan">
                        <option hidden selected> Sila Pilih </option>
                            <option value="makanan">makanan</option>
                            <option value="minuman">duit</option>
                        </select>
                    </div>

                    </br>

                </div>
                <input type="hidden" name="penerima zakat" value=1>
                <button class="btn btn-primary" type="submit">Tambah</button>
            </form>







        </div>






    </div>
</div>

@stop