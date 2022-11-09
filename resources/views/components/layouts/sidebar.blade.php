<div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
        <ul>
        <li class="active">
        <a href="/"><img src={{asset("assets/img/icons/dashboard.svg")}} alt="img"><span> Dashboard</span> </a>
        </li>
        <li class="submenu">
            <a href="javascript:void(0);"><img src={{asset("assets/img/icons/time.svg")}} alt="img"><span> Laporan</span> <span class="menu-arrow"></span></a>
            <ul>
            <li><a href="purchaseorderreport.html">Ringkasan Penjualan</a></li>
            <li><a href="inventoryreport.html">Metode Pembayaran</a></li>
            <li><a href="salesreport.html">Penjualan Per Produk</a></li>
            <li><a href="invoicereport.html">Penjualan Per Kategori</a></li>
            <li><a href="purchasereport.html">Penjualan Per Merek</a></li>
            <li><a href="supplierreport.html">Laporan Pajak</a></li>
            <li><a href="customerreport.html">Laporan Pelanggan</a></li>
            <li><a href="customerreport.html">Laporan Pegawai</a></li>
            <li><a href="customerreport.html">Laporan Absensi</a></li>
            <li><a href="customerreport.html">Laporan Diskon</a></li>
            <li><a href="customerreport.html">Opsi Tambahan</a></li>
            </ul>
            </li>
            <li>
                <a href="components.html"><i data-feather="layers"></i><span> Riwayat Transaksi</span> </a>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><img src={{asset("assets/img/icons/expense1.svg")}} alt="img"><span> Pembayaran</span> <span class="menu-arrow"></span></a>
                <ul>
                <li><a href="expenselist.html">Menunggu Pembayaran</a></li>
                </ul>
            </li>
        <li class="submenu">
        <a href="javascript:void(0);"><img src={{asset("assets/img/icons/product.svg")}} alt="img"><span> Produk</span> <span class="menu-arrow"></span></a>
        <ul>
        <li><a href={{route('index.produk')}}>Katalog Produk</a></li>
        <li><a href="addproduct.html">Pajak</a></li>
        <li><a href="categorylist.html">Resep</a></li>
        <li><a href="addcategory.html">Bahan Baku</a></li>
        <li><a href="barcode.html">Print Barcode</a></li>
        </ul>
        </li>
        <li>
            <a href="components.html"><i data-feather="alert-octagon"></i> <span> Pengingat </span></a>
        </li>
        <li class="submenu">
            <a href="javascript:void(0);"><img src={{asset("assets/img/icons/users1.svg")}} alt="img"><span> Pegawai</span> <span class="menu-arrow"></span></a>
            <ul>
            <li><a href={{route('users.create')}}>Tambah Pegawai Baru </a></li>
            <li><a href={{route('users.management')}}>Daftar Pegawai</a></li>
            <li><a href={{route('assign.user.create')}}>Hak Akses Pegawai</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="javascript:void(0);"><i data-feather="truck"></i><span> Inventaris</span> <span class="menu-arrow"></span></a>
            <ul>
            <li><a href="/users/management">Ringkasan</a></li>
            <li><a href="/suppliers">Supplier</a></li>
            <li><a href="/pembelian">Pembelian Stok Produk</a></li>
            <li><a href="#">Pemindahan Stock</a></li>
            <li><a href="#">Penyesuaian Stock</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="javascript:void(0);"><img src={{asset("assets/img/icons/places.svg")}} alt="img"><span> Outlets</span> <span class="menu-arrow"></span></a>
            <ul>
            <li><a href="/outlet/tambah-outlet">Tambah Cabang Outlet Baru</a></li>
            <li><a href="/outlet">Daftar Cabang Outlet</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="javascript:void(0);"><img src={{asset("assets/img/icons/transfer1.svg")}} alt="img"><span> Kelola Kas</span> <span class="menu-arrow"></span></a>
            <ul>
            <li><a href="{{route('pengeluaran.index')}}">Pengeluaran Outlet</a></li>
            <li><a href="{{route('pemasukan.index')}}">Pemasukan Outlet</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="javascript:void(0);"><img src={{asset("assets/img/icons/users1.svg")}} alt="img"><span> Pelanggan</span> <span class="menu-arrow"></span></a>
            <ul>
            <li><a href="customerlist.html">Customer List</a></li>
            <li><a href="addcustomer.html">Add Customer </a></li>
            <li><a href="supplierlist.html">Supplier List</a></li>
            <li><a href="addsupplier.html">Add Supplier </a></li>
            <li><a href="userlist.html">User List</a></li>
            <li><a href="adduser.html">Add User</a></li>
            <li><a href="storelist.html">Store List</a></li>
            <li><a href="addstore.html">Add Store</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="javascript:void(0);"><i data-feather="shield"></i> <span>Management Role & Permission </span> <span class="menu-arrow"></span></a>
        <ul>
        <li><a href={{route('roles.index')}}>Roles </a></li>
        <li><a href={{route('permissions.index')}}>Permissions</a></li>
        <li><a href={{route('assign.create')}}>Assign Permissions</a></li>

        </ul>
        </li>


        <li class="submenu">
        <a href="javascript:void(0);"><img src={{asset("assets/img/icons/settings.svg")}} alt="img"><span> Settings</span> <span class="menu-arrow"></span></a>
        <ul>
        <li><a href="generalsettings.html">General Settings</a></li>
        <li><a href="emailsettings.html">Email Settings</a></li>
        <li><a href="paymentsettings.html">Payment Settings</a></li>
        <li><a href="currencysettings.html">Currency Settings</a></li>
        <li><a href="grouppermissions.html">Group Permissions</a></li>
        <li><a href="taxrates.html">Tax Rates</a></li>
        </ul>
        </li>
        </ul>
        </div>
        </div>
        </div>
    </div>
