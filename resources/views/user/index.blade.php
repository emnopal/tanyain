@extends('layout.home')
@section('content')
<div class="card">
<div class="card-header">
    <p style="text-align: left; font-size:30px; margin-top:10px">Forum QnA<br>
        @isset ($tag_name)
            <a class="text-primary mt-2" style="text-align: right; font-size:20px">Kategori : <span class="text-secondary font-weight-bold" style="text-align: right; font-size:20px">{{ $tag_name }}</span></a>
        @endisset
        {{-- <a href="/forum/create" type="submit" class="btn btn-primary text-white btn-md text-dark" style="border-radius:50px; margin-bottom:25px" >Yuk Tanya</a> --}}
    </p>
</div>
    @forelse ($pertanyaan as $tanya)
    <div class="inner-main-body pl-4 pr-4 mt-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="media forum-item">
                            <a href="/forum/show/{{$tanya->id}}" data-toggle="collapse" data-target=".forum-content"><img src="{{$tanya->user->profile->getAvatar()}}" class="mr-3 rounded-circle"  style="text-align: center" width="50" alt="User"/></a>
                            <div class="media-body">
                                <h6><a href="/forum/show/{{$tanya->id}}"  class="text-bold">{{$tanya->user->profile->nama}}</a></h6>
                                <h6><a href="/forum/show/{{$tanya->id}}" class="text-primary">{{$tanya->judul}}</a></h6>
                                {{-- <p class="text-secondary">
                                    {!!$tanya->isi!!}
                                </p> --}}

                            </div>
                            <div class="text-muted small text-center align-self-center">
                                Kategori :
                                @foreach ($tanya->tags as $tag)
                                <button class="btn btn-primary btn-sm"> <a href="/view_kategori/{{$tag->id}}" type="submit" style="color: white">{{$tag->tag_name ? $tag->tag_name:'Tanpa tag' }}</a></button>
                                @endforeach
                                <span><i class="far fa-comment ml-2"></i> {{$tanya->jawaban->count()}}</span>
                                <p class="text-muted mt-2" style="text-align: right; font-size:10px">Dibuat pada <span class="text-secondary font-weight-bold" style="text-align: right; font-size:10px">{{$tanya->created_at->diffForHumans()}}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    @empty 
    <div class="inner-main-body pl-4 pr-4 mt-3">
        <div class="card mb-3">
            <div class="card-body">
                <h4><a class="text-bold">Tidak Ada Data</a></h4>
            </div>
        </div>
</div>     
    @endforelse

</div>
@endsection
