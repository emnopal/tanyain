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
            <button class="btn  btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data [+]</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="/jawaban/{{$jawab->id}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control  @error('profile') is-invalid @enderror" name="profile"
                           id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama profile"
                           disabled value="{{$jawab->pertanyaan->user->username}}">
                    @error('profile')
                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group @error('Pertanyaan') is-invalid @enderror">
                    <label for="inputGroupSelect01">Pertanyaan</label>
                    <select name="Pertanyaan" id="inputGroupSelect01" class="form-control" disabled>
                        <option value="{{$jawab->pertanyaan->isi}}">{{$jawab->pertanyaan->isi}}</option>
                    </select>
                    @error('Pertanyaan')
                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Jawaban</label>
                    <textarea name="isi" id="isi" class="form-control my-editor summernote">{{$jawab->isi}}</textarea>
                    @error('jawaban')
                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                    @enderror

                </div>

                <div class="modal-footer">
                    <a href="/jawaban" type="button" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
        <div class="card-footer clearfix">
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah jawaban</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                </div>
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
