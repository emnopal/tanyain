<div class="col-md-4  mt-5 pt-4 pr-2">
    <div class="card" style="background: #8898aa;  position: -webkit-sticky; position: sticky; top: 60px;">
        <div class="card-header">
            <h3 class="card-title">Pilih / Edit Kategori (Admin Only)</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <ul class="products-list product-list-in-card pl-3 pr-3">
                @forelse ($tags as $tag)
                    @if (Auth::user()->role==='admin')
                        <li class="item mr-2" style="background: #8898aa; width: 100%; text-align:center">
                            <div class="product-info ml-0">
                                <form method="get" action="/kategori/{{$tag->id}}">
                                    <button
                                        class="btn btn-primary">{{ $tag->tag_name ? $tag->tag_name: 'Tanpa Tag' }}</button>
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="item mr-2" style="background: #8898aa; width: 100%; text-align:center">
                            <div class="product-info ml-0">
                                <form method="get" action="/view_kategori/{{$tag->id}}">
                                    <button
                                        class="btn btn-primary">{{ $tag->tag_name ? $tag->tag_name: 'Tanpa Tag' }}</button>
                                </form>
                            </div>
                        </li>
                    @endif
                @empty
                    <li>
                        <div class="product-info ml-0"> Tidak ada Kategori</div>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
