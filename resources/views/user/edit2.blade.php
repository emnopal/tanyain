@extends('layout.homeshow')
@section('header')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="card" style="background: #2ace24;">
        <div class="card-header">
            <h3 class="card-title text-dark">Edit jawaban anda</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/forum/update/{{$jawaban->id}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="card-body">
                <input type="text" name="pertanyaan" value="{{$jawaban->pertanyaan->id}}" hidden>
                 <div class="form-group">
                     <label for="judul">Pertanyaan</label>
                    <input type="text" class="form-control  @error('judul') is-invalid @enderror" name="judul" placeholder="masukan judul" id="judul" value="{{$jawaban->pertanyaan->judul}}" readonly>
                </div>
                <div class="form-group" style="background-color: white !important;">
                        <label for="exampleInputPassword1" style="background: #2ace24; width: 100%">Masukan jawaban anda</label>
                        <textarea name="isi" id="isi" class="form-control my-editor summernote" >{!!$jawaban->isi!!}</textarea>
                        @error('isi')
                        <div class="invalid-feedback mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <a href="/forum/show/{{$jawaban->pertanyaan->id}}" type="submit" class="btn btn-light mt-3">kembali</a>
                <button type="submit" class="btn btn-light mt-3">Submit</button>
            </div>
            <!-- /.card-body -->
        </form>
    </section>
@endsection
@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 170
            });
        });
    </script>
@endsection
