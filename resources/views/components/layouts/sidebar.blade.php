<div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
        <ul>
        <li class="active">
        <a href="/"><img src={{asset("assets/img/icons/dashboard.svg")}} alt="img"><span> Dashboard</span> </a>
        </li>
        @can('reports')
        <li class="submenu">
            <a href="javascript:void(0);"><img src={{asset("assets/img/icons/time.svg")}} alt="img"><span> Reports</span> <span class="menu-arrow"></span></a>
            <ul>
            <li><a href="{{route('reports.overdue')}}">Reports Overdue Loans</a></li>
            <li><a href="{{route('reports.complete')}}">Reports Complete Loans</a></li>
            <li><a href="{{route('reports.outstanding')}}">Reports Outstanding Loans</a></li>
            </ul>
        </li>
        @endcan
            @can('loan_application_create')
            <li>
                <a href="{{route('loans.create')}}"><i data-feather="layers"></i><span> New Loans</span> </a>
            </li>
            @endcan
            @can('loan_application_access')
            <li class="submenu">
                <a href="javascript:void(0);"><img src={{asset("assets/img/icons/expense1.svg")}} alt="img"><span> Application Loans</span> <span class="menu-arrow"></span></a>
                <ul>
                <li><a href="{{route('loans.index')}}">Loans Application List</a></li>
                @can('analyst_proccesing')
                <li><a href="{{route('analyst.proses')}}">Analyst Proccesing</a></li>
                @endcan
                @can('ceo_proccesing')
                <li><a href="{{route('ceo.proses')}}">CEO Proccesing</a></li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('user_management_access')

        <li class="submenu">
            <a href="javascript:void(0);"><img src={{asset("assets/img/icons/users1.svg")}} alt="img"><span> Employee</span> <span class="menu-arrow"></span></a>
            <ul>
            <li><a href={{route('users.management')}}>Employee List</a></li>
            @can('add_new_employee')
            <li><a href={{route('users.create')}}>Add New Employee </a></li>
            @endcan
            @can('role_access_employee')
            <li><a href={{route('assign.user.create')}}>Role Access Employee</a></li>
            @endcan
            </ul>
        </li>
        @endcan

        @can('role_access')
        <li class="submenu">
            <a href="javascript:void(0);"><i data-feather="shield"></i> <span>Management Role & Permission </span> <span class="menu-arrow"></span></a>
        <ul>
        <li><a href={{route('roles.index')}}>Roles </a></li>
        <li><a href={{route('permissions.index')}}>Permissions</a></li>
        <li><a href={{route('assign.create')}}>Assign Permissions</a></li>
        </ul>
        </li>
        @endcan
        @can('settings')
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
        @endcan

        </ul>
        </div>
        </div>
        </div>
    </div>
