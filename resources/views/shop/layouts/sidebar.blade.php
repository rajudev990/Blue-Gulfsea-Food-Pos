<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ Storage::url(Auth::guard('shop')->user()->image) }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Auth::guard('shop')->user()->name ?? 'Admin' }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              
                <li class="nav-item">
                    <a href="{{ route('shop.dashboard') }}" class="nav-link {{ Route::is('shop.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


               
                <li class="nav-item">
                    <a href="{{ route('shop.units.index') }}" class="nav-link {{ Route::is('shop.units') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-ruler-combined"></i>
                        <p>Unit</p>
                    </a>
                </li>
               

                
                <li class="nav-item">
                    <a href="{{ route('shop.products.index') }}" class="nav-link {{ Route::is('shop.products') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Product</p>
                    </a>
                </li>
               

                
                <li class="nav-item">
                    <a href="{{ route('shop.customers.index') }}" class="nav-link {{ Route::is('shop.customers') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customer</p>
                    </a>
                </li>
               

                
                <li class="nav-item">
                    <a href="{{ route('shop.purchases.index') }}" class="nav-link {{ Route::is('shop.purchases') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Purchase</p>
                    </a>
                </li>
               

                
                <li class="nav-item">
                    <a href="{{ route('shop.sales.index') }}" class="nav-link {{ Route::is('shop.sales') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>Sale</p>
                    </a>
                </li>
               

               
                <li class="nav-item">
                    <a href="{{ route('shop.stocks.index') }}" class="nav-link {{ Route::is('shop.stocks') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>Stock</p>
                    </a>
                </li>
               

               
                <li class="nav-item">
                    <a href="{{ route('shop.reports.index') }}" class="nav-link {{ Route::is('shop.reports') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Report</p>
                    </a>
                </li>
               

               

            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>