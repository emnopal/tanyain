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
            <a class="text-muted">Title: <h6 class="text-primary">{{$pertanyaan->judul}}</h6></a>
            {{-- <p>Kategori:
                <button class="btn btn-primary btn-sm"><a href="/view_kategori/{{$pertanyaan->tag_id}}"
                                                          type="submit"
                                                          style="color: white">{{\App\Models\Tag::where('id', '=',$pertanyaan->tag_id)->first()->tag_name}}</a>
                </button>
            </p> --}}
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
            </div>
        </div>
    @endforeach
    <?php $if_same_id = App\Models\Pertanyaan::where('user_id', '=', $pertanyaan->user->id)->first() ?>
    @if ($if_same_id->user_id != Auth::user()->id)
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
    @else
    <div class="card card-widget">
        <div class="card-header">
            <h5 class="text-danger" style="text-align: center">Tidak bisa menjawab pertanyaan sendiri !</h5>
        </div>
    </div>
    @endif
    @include('sweetalert::alert')
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
