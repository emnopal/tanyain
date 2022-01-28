@extends('layout.homeshow')
@section('header')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="card" style="background: #2ace24;">
        <div class="card-header">
            <h3 class="card-title text-dark">Masukan pertanyaan anda</h3>
        </div>
        <form action="/forum/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="judul">Masukan judul</label>
                    <input type="text" class="form-control  @error('judul') is-invalid @enderror" name="Judul"
                           placeholder="masukan judul" id="judul">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Masukan pertanyaan anda</label>
                    <textarea name="isi" id="isi" class="form-control summernote"></textarea>
                    @error('isi')
                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tags">Kategori</label>
                    <input type="text" class="form-control" id="tags" name="tags" placeholder="contoh : satu,sdua,tiga">
                </div>
                <a href="/" type="submit" class="btn btn-light mt-3">kembali</a>
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
