@extends('layout.main')

@section('title')
    <h1>DATA KATEGORI: {{$tag_name}}</h1>
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
                    <th style="width: 10px">no</th>
                    <th>Username</th>
                    <th>Judul</th>
                    <th>Isi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tag_id as $tanya)
                    {{-- @foreach (\App\Models\Pertanyaan::where('id','=', $id->pertanyaan_id)->get() as $tanya) --}}
                    {{-- @foreach() --}}
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{!!$tanya->user->username!!}</td>
                            <td>{{$tanya->judul}}</td>
                            <td>{!!$tanya->isi!!}</td>
                        </tr>
                    {{-- @endforeach --}}
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <a href="/kategori/{{$new_id}}" class="float-right btn btn-default">
                Kembali Ke Kategori
            </a>
        </div>
    </div>
@endsection
