@extends('layout.main')

@section('title')
    <h1>DATA TABLE JAWABAN</h1>
@endsection

@section('header')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="/kategori/{{$tag->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Kategori</label>
                    <input type="text" class="form-control  @error('isi') is-invalid @enderror" name="isi"
                           id="exampleInputPassword1" placeholder="Masukan Kategori" value="{{$tag->tag_name}}">
                    @error('isi')
                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <a href="/kategori" type="button" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <div class="card-footer clearfix">
        </div>
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
