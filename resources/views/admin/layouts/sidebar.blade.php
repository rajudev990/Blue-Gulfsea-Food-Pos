<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ Storage::url(Auth::guard('admin')->user()->image) }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @canany(['create dashboard','edit dashboard','view dashboard','delete dashboard'])
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @endcanany


                @canany(['create shop','edit shop','view shop','delete shop'])
                <li class="nav-item">
                    <a href="{{ route('admin.shops.index') }}" class="nav-link {{ Route::is('admin.shops') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Shops
                        </p>
                    </a>
                </li>
                @endcanany


                @canany(['create unit','edit unit','view unit','delete unit'])
                <li class="nav-item">
                    <a href="{{ route('admin.units.index') }}" class="nav-link {{ Route::is('admin.units') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-ruler-combined"></i>
                        <p>Unit</p>
                    </a>
                </li>
                @endcanany

                @canany(['create product','edit product','view product','delete product'])
                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}" class="nav-link {{ Route::is('admin.products') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Product</p>
                    </a>
                </li>
                @endcanany

                @canany(['create customer','edit customer','view customer','delete customer'])
                <li class="nav-item">
                    <a href="{{ route('admin.customers.index') }}" class="nav-link {{ Route::is('admin.customers') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customer</p>
                    </a>
                </li>
                @endcanany

                @canany(['create purchase','edit purchase','view purchase','delete purchase'])
                <li class="nav-item">
                    <a href="{{ route('admin.purchases.index') }}" class="nav-link {{ Route::is('admin.purchases') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Purchase</p>
                    </a>
                </li>
                @endcanany

                @canany(['create sales','edit sales','view sales','delete sales'])
                <li class="nav-item">
                    <a href="{{ route('admin.sales.index') }}" class="nav-link {{ Route::is('admin.sales') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>Sale</p>
                    </a>
                </li>
                @endcanany

                @canany(['create stock','edit stock','view stock','delete stock'])
                <li class="nav-item">
                    <a href="{{ route('admin.stocks.index') }}" class="nav-link {{ Route::is('admin.stocks') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>Stock</p>
                    </a>
                </li>
                @endcanany

                @canany(['create report','edit report','view report','delete report'])
                <li class="nav-item">
                    <a href="{{ route('admin.reports.index') }}" class="nav-link {{ Route::is('admin.reports') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Report</p>
                    </a>
                </li>
                @endcanany


                <!-- Role Managment  -->
                @canany(['create role','edit role','view role','delete role','create user','edit user','view user','delete user'])
                <li class="nav-item {{ Route::is('admin.roles.*') || Route::is('admin.users.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            User Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @canany(['create role','edit role','view role','delete role'])
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ Route::is('admin.users.*') ? 'active' : '' }}">
                                <i class="fa fa-angle-right nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        @endcanany
                        @canany(['create user','edit user','view user','delete user'])
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}" class="nav-link {{ Route::is('admin.roles.*') ? 'active' : '' }}">
                                <i class="fa fa-angle-right nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        @endcanany

                    </ul>
                </li>
                @endcanany

                @canany(['create setting','edit setting','view setting','delete setting'])
                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link {{ Route::is('admin.settings.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
                @endcanany

            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>