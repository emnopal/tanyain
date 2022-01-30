@extends('layout.main')

@section('title')
    <h1>DATA TABLE PERTANYAAN BERDASAR TAG</h1>
@endsection
@section('content')
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">No</th>
                    <th>Tags</th>
                    <th>Jumlah Pertanyaan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>{{$tag_name}}</td>
                    <td>
                        <a href="/kategori_pertanyaan/{{$id}}">{{$tag_id->count()}}</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <a href="/profile" class="float-right btn btn-default">
                Kembali
            </a>
        </div>
    </div>
@endsection
