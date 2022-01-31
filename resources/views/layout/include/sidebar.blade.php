<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="
                            {{auth()->user()->profile->getAvatar()}}
                " class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{Auth()->user()->profile->nama}}</a>
        </div>
    </div>
    <li class="nav-item">
        <a href="{{url('/profile')}}" class="nav-link">
            <i class="fa fa-user nav-icon"></i>
            <p>Data User</p>
        </a>
    </li>
    @if(Auth::user()->role == 'admin')
        <li class="nav-item">
            <a href="{{url('/pertanyaan')}}" class="nav-link">
                <i class="fa fa-table nav-icon"></i>
                <p>Data Pertanyaan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/jawaban')}}" class="nav-link">
                <i class="fa fa-table nav-icon"></i>
                <p>Data Jawaban</p>
            </a>
        </li>
    @endif
    <li class="nav-item">
        <a href="{{url('/')}}" class="nav-link">
            <i class="fa fa-arrow-left nav-icon"></i>
            <p>kembali ke forum</p>
        </a>
    </li>
    </nav>
