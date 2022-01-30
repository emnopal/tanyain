@extends('layout.main')

@section('title')
    <h1>EDIT TABLE PROFILE</h1>
@endsection
@section('content')
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <form action="/profile/{{$user->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username"
                           id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan username profile"
                           value="{{$user->username}}">
                    @error('username')
                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control  @error('nama') is-invalid @enderror" name="nama"
                           id="nama" placeholder="Masukan nama profile"
                           value="{{$user->profile->nama}}">
                    @error('nama')
                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bio">Bio</label>
                    <input type="text" class="form-control  @error('bio') is-invalid @enderror" name="bio"
                           id="bio" placeholder="Masukan bio profile"
                           value="{{$user->profile->bio}}">
                    @error('bio')
                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control  @error('alamat') is-invalid @enderror" name="alamat"
                           id="alamat" placeholder="Masukan alamat profile"
                           value="{{$user->profile->alamat}}">
                    @error('alamat')
                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email"
                           id="exampleInputEmail1" placeholder="Masukan pertanyaan"
                           value="{{$user->email}}">
                    @error('email')
                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password Baru</label>
                    <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password"
                           id="exampleInputPassword1" placeholder="pasword baru" value="">
                    @error('password')
                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Foto</label>
                    <input type="file" class="form-control  @error('avatar') is-invalid @enderror" name="avatar"
                           id="exampleInputPassword1" placeholder="masukan gambar" value="">
                    @error('foto')
                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <a href="/profile" type="button" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            </ul>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
@endsection
