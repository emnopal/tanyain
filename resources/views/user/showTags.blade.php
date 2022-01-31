@extends('layout.main')

@section('title')
    <h1>DATA TABLE PERTANYAAN BERDASAR TAG</h1>
@endsection
@section('content')
    <div class="card">

        <div class="card-header">
            {{-- <h3 class="card-title">Bordered Table</h3> --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">No</th>
                    <th class="col-4">Tags</th>
                    <th>Jumlah Pertanyaan</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>{{$tag_name}}</td>
                    <td>
                        <a>{{$tag_id->count()}}</a>
                    </td>
                    <td>
                        <a href="/kategori_pertanyaan/{{$id}}" class="btn  btn-success">SHOW</a>
                        <a href="/kategori/{{$id}}/edit" class="btn  btn-primary">UPDATE</a>
                        <form action="#" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="submit btn badge-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <a href="/" class="float-right btn btn-default">
                Kembali ke Forum
            </a>
        </div>
    </div>
@endsection
