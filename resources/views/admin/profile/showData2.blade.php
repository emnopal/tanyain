@extends('layout.main')

@section('title')
    <h1>DATA jawaban {{$user->profile->nama}}</h1>
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
                        <th>Nama Penanya</th>
                        <th>Judul</th>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($jawaban as $usr)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            {{-- @foreach ($penanya as $tanya)
                                <td>{{$tanya->}}</td>
                            @endforeach --}}
                            <td>{{$usr->pertanyaan->user->username}}</td>
                            {{-- <td>{{$usr->user->username}}</td> --}}
                            <td>{{$usr->pertanyaan->judul}}</td>
                            <td>{!!$usr->pertanyaan->isi!!}</td>
                            <td>{!!$usr->isi!!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="/profile" class="float-right btn btn-default">
                        kembali
                    </a>
                </div>
                </div>
@endsection
