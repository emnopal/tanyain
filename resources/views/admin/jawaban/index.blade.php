@extends('layout.main')

@section('title')
    <h1>DATA TABLE JAWABAN</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <button class="btn  btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah data [+]</button>
            <a href="/exportJawaban" class="btn btn-danger btn-sm ml-5">Export PDF</a>
            <a href="/ExcelJawaban" class="btn btn-success mr-2 btn-sm">Export Excel</a>
            <div class="float-right">
                @if (session('sukses'))
                    <div class="alert alert-success" style="margin-top: -8%">
                        {{ session('sukses') }}
                    </div>
                @endif
                @if (session('eror'))
                    <div class="alert alert-danger" style="margin-top: -8%">
                        {{ session('eror') }}
                    </div>
                @endif
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">no</th>
                    <th>Nama User</th>
                    <th>Judul</th>
                    <th>Pertanyaan</th>
                    <th>Jawaban</th>
                    <th style="width: auto">Tags</th>
                    <th style="width: 280px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($jawaban as $jwb)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        {{-- <td>{!!$jwb->pertanyaan->user->profile->nama_lengkap!!}</td> --}}
                        <td>{{$jwb->user->profile->nama}}</td>
                        <td>{!!$jwb->pertanyaan->judul!!}</td>
                        <td>{!!$jwb->pertanyaan->isi!!}</td>
                        <td>{!!$jwb->isi!!}</td>
                        <td>
                            <button class="btn btn-primary btn-sm"><a href="/view_kategori/{{$jwb->pertanyaan->tag_id}}"
                                                                      type="submit"
                                                                      style="color: white">{{\App\Models\Tag::where('id', '=',$jwb->pertanyaan->tag_id)->first()->tag_name}}</a>
                            </button>
                        </td>
                        <td>
                            {{-- <a href="jawaban/{{$jwb->id}}" class="btn  btn-success">SHOW</a> --}}
                            <a href="jawaban/{{$jwb->id}}/edit" class="btn  btn-primary">UPDATE</a>
                            <form action="/jawaban/{{$jwb->id}}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="submit btn badge-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right text-secondary">
                {{$jawaban->links()}}
            </ul>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jawaban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/jawaban" method="POST">
                        @csrf
                        <div class="form-group @error('profile') is-invalid @enderror">
                            <label for="inputGroupSelect01">nama profile</label>
                            <select name="profile" id="inputGroupSelect01" class="form-control">
                                @foreach ($profile as $prof)
                                    <option value="{{$prof->id}}">{{$prof->nama}}</option>
                                @endforeach
                            </select>
                            @error('profile')
                            <div class="invalid-feedback mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('Pertanyaan') is-invalid @enderror">
                            <label for="inputGroupSelect01">Pertanyaan</label>
                            <select name="pertanyaan" id="inputGroupSelect01" class="form-control">
                                @foreach ($pertanyaan as $per)
                                    <option value="{{$per->id}}">{!!$per->isi!!}</option>
                                @endforeach
                            </select>
                            @error('Pertanyaan')
                            <div class="invalid-feedback mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jawaban</label>
                            <textarea name="jawaban" id="jawaban" class="form-control my-editor summernote"></textarea>
                            {{-- <input type="Jawaban" class="form-control  @error('Jawaban') is-invalid @enderror"
                                   name="Jawaban" id="exampleInputPassword1" placeholder="Masukan Jawaban"> --}}
                            @error('Jawaban')
                            <div class="invalid-feedback mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">back</button>
                    <button type="submit" class="btn btn-primary">simpan</button>
                </div>
                </form>
            </div>

        </div>
    </div>
    @include('sweetalert::alert')
@endsection
@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.summernote').summernote({
                height: auto,
                width: auto
            });
        });
    </script>
@endsection
