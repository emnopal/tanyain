@extends('layout.main')

@section('title')
    <h1>DATA TABLE PERTANYAAN</h1>
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
                    <th>User</th>
                    <th>Judul</th>
                    <th>Isi pertanyaan</th>
                    <th>Jawaban</th>
                    <th>Tags</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>{{$tanya->user->profile->nama}}</td>
                    <td>
                        {{$tanya->judul}}
                    </td>
                    <td>
                        {!!$tanya->isi!!}
                    </td>
                    @foreach($tanya->jawaban as $jawaban)
                        <td>{!!$jawaban->isi!!}</td>
                    @endforeach
                    <td>
                        @foreach ($tanya->tags as $tag)
                            <button
                                class="btn btn-primary btn-sm">{{$tag->tag_name ? $tag->tag_name:'No tags' }}</button>
                        @endforeach
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <a href="/Pertanyaan" class="float-right btn btn-default">
                kembali
            </a>
        </div>
    </div>
@endsection
