@extends('layout.homeshow')
@section('header')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="card" style="background: #8898aa;">
        <div class="card-header">
            <h3 class="card-title text-dark">Edit pertanyaan anda</h3>
        </div>
        <form action="/forum/update/{{$pertanyaan->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                 <div class="form-group">
                     <label for="judul">Masukan judul</label>
                    <input type="text" class="form-control  @error('judul') is-invalid @enderror" name="judul" placeholder="masukan judul" id="judul" value="{{$pertanyaan->judul}}">
                </div>
                <div class="form-group" style="background-color: white !important;">
                        <label for="exampleInputPassword1" style="background: #8898aa; width: 100%">Masukan pertanyaan anda</label>
                        <textarea name="isi" id="isi" class="form-control my-editor summernote">{{$pertanyaan->isi}}</textarea>
                        @error('isi')
                        <div class="invalid-feedback mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                <div class="form-group">
                    <label for="tags">Kategori</label>
                    <input type="text" class="form-control" id="tags" name="tags" placeholder="contoh : satu,dua,tiga" value="{!!$tag_nama->tag_name!!}">
                    
                    {{-- <label for="tags">Kategori : </label>
                     @foreach ($pertanyaan->tags as $tag)
                                <button class="btn btn-primary btn-sm">{{$tag->tag_name ? $tag->tag_name:'No tags' }}</button>
                                @endforeach --}}
                </div>
                    <a href="/forum/show/{{$pertanyaan->id}}" type="submit" class="btn btn-light mt-3">kembali</a>
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
