@extends('layout.homeshow')
@section('title')
    <title>Forum QnA</title>
@endsection
@section('header')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')

    <h5 class="mb-2 ml-2" style="font-weight: bold">Pertanyaan</h5>
    <div class="card card-widget">
        <div class="card-header">
            <div class="user-block">
                <img class="img-circle" src="{{$pertanyaan->user->profile->getAvatar()}}" alt="User Image">
                <span class="username"><a href="#">{{$pertanyaan->user->username}}</a></span>
                <span class="description"><a href="#">{{$pertanyaan->user->profile->nama}}</a></span>
                <span class="description">{{$pertanyaan->created_at->diffForHumans()}}</span>
            </div>
            <!-- /.user-block -->
            <?php $if_null = App\Models\Pertanyaan::where('user_id', '=', $pertanyaan->user->id)->first() ?>
            @if ($if_null->user_id==Auth::user()->id || Auth::user()->role === 'admin')
                <div class="card-tools">
                    <div class="btn-group">
                        <button type="button" class="btn btn-tool dropdown-toggle text-dark" data-toggle="dropdown">
                            <i class="fas fa-wrench"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <a href="/forum/edit/{{$pertanyaan->id}}" class="dropdown-item">Edit</a>
                            <form action="/forum/hapus/{{$pertanyaan->id}}" method="POST">
                                @csrf
                                <input type="submit" value="Delete" class="dropdown-item btn btn-light btn-sm">
                            </form>
                        </div>
                    </div>
                </div>
            @else
            @endif
        </div>
        <div class="card-header">
            <h3>{{$pertanyaan->judul}}</h3>
            <p>Kategori:
                <button class="btn btn-primary btn-sm"><a href="/view_kategori/{{$pertanyaan->tag_id}}"
                                                          type="submit"
                                                          style="color: white">{{\App\Models\Tag::where('id', '=',$pertanyaan->tag_id)->first()->tag_name}}</a>
                </button>
            </p>
        </div>
        <div class="card-body">
            <p>{!!$pertanyaan->isi!!}</p>
        </div>
        <div class="card-footer">
        </div>
    </div>

    <h5 class="mb-2 ml-2" style="font-weight: bold">Jawaban</h5>
    @foreach ($pertanyaan->jawaban as $jwb)
        <div class="card card-widget">
            <div class="card-header">
                <div class="user-block">
                    <img class="img-circle" src="{{$jwb->user->profile->getAvatar()}}" alt="User Image">
                    <span class="username"><a href="#">{{$jwb->user->username}}</a></span>
                    <span class="description"><a href="#">{{$jwb->user->profile->nama}}</a></span>
                    <span class="description">{{$jwb->created_at->diffForHumans()}}</span>
                </div>
                <!-- /.user-block -->
                <?php $if_null = App\Models\jawaban::where('user_id', '=', $jwb->user->id)->first() ?>
                @if ($if_null->user_id==Auth::user()->id || Auth::user()->role == 'admin')
                    <div class="card-tools">
                        <div class="btn-group">
                            <button type="button" class="btn btn-tool dropdown-toggle text-dark" data-toggle="dropdown">
                                <i class="fas fa-wrench"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <a href="/forum/edit2/{{$jwb->id}}" class="dropdown-item">Edit</a>
                                </form>
                                <form action="/forum/hapus/{{$jwb->id}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" value="Delete" class="dropdown-item btn btn-light btn-sm">
                                </form>
                            </div>
                        </div>
                    </div>
            @else

            @endif
            <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- post text -->
                <p>{!!$jwb->isi!!}</p>
                <!-- Social sharing buttons -->
                {{-- <span class="float-right text-muted">{{$jwb->komentar_jawaban->count()}} comments</span> --}}
            </div>
            <!-- /.card-body -->
        {{-- awal komentar --}}
        {{-- @foreach ($jwb->komentar_jawaban as $komentar)
            <div class="card-footer card-comments">
                <div class="card-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="{{$komentar->user->profile->getAvatar()}}" alt="User Image">
                <div class="comment-text">
                    <span class="username">
                    {{$komentar->user->profile->nama_lengkap}}
                    <span class="text-muted float-right">{{$komentar->created_at->diffForHumans()}}</span>
                    </span><!-- /.username -->
                    {{$komentar->isi}}
                </div>
                <!-- /.comment-text -->
                </div>
            </div>
        @endforeach --}}
        {{-- akhir komentar --}}
        <!-- /.card-footer -->
        {{-- <div class="card-footer">
            <form action="/forum/komentar_jawaban/{{$jwb->id}}" method="POST"> --}}
        {{-- <input type="text" name="id" value="{{$pertanyaan->id}}" hidden> --}}
        {{-- @csrf
        <img class="img-fluid img-circle img-sm" src="{{auth()->user()->profile->getAvatar()}}" alt="Alt Text">
        <!-- .img-push is used to add margin to elements next to floating images -->
        <div class="img-push">
            <input type="text" name="komentar" class="form-control form-control-sm" placeholder="Press enter to post comment">
        </div>
        </form>
    </div> --}}
        <!-- /.card-footer -->
        </div>
    @endforeach

    <div class="card card-widget">
        <div class="card-header">
            <form action="/forum/jawaban/{{$pertanyaan->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jawaban">Masukan jawaban anda</label>
                    <textarea name="jawaban" id="jawaban" class="form-control my-editor summernote"></textarea>
                    @error('jawaban')
                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Jawab</button>
            </form>
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
