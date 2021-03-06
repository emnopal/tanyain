    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #e9ecef; background: ">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
        <img src="{{ secure_asset('user/images/AdminLTELogo.png') }}"
            class="brand-image mt-1 ml-4 mr-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bold text-dark">Tanya.!n</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-1 pb-1 mb-1 d-flex">

            <div class="info nav nav-pills nav-sidebar flex-column"  data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link media pl-1">
                    <div>
                        <img src="{{ Auth::user()->profile->getAvatar() }}" class="img-size-50 mr-1 img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="media-body pl-1">
                        <h3 class="dropdown-item-title font-weight-bold text-dark">
                        @ {{ Auth::user()->username }}
                        </h3>
                        <p class="text-sm font-weight-bold text-dark">{{ Auth::user()->profile->nama }} </p>
                    </div>
                    <span class="ml-2 font-weight-bold text-dark"><i class="fas fa-angle-down"></i></span>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/profile" class="nav-link font-weight-bold text-dark" onclick="">
                            <i class="far fa-circle nav-icon"></i>
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link font-weight-bold text-dark" onclick="">
                            <i class="far fa-circle nav-icon"></i>
                            Log out
                        </a>
                    </li>
                </ul>
                </li>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->


                <a href="/forum/create" type="submit" class="btn btn-light btn-block btn-lg text-dark mt-4" style="border-radius:50px" >Tanya</a>


            </div>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
