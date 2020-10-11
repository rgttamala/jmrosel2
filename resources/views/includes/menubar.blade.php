<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/images/menu-login.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> {{ Auth::user()->name }} </p>
                <a><i class="fa fa-circle text-success"></i> Active</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
           
            

            <li class=""><a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            
            <li class="header">MANAGE</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Employees</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/employees"><i class="fa fa-circle-o"></i> Employees List</a></li>
                    <li><a href="/rates"><i class="fa fa-circle-o"></i> Employees Rates</a></li>
                    <li><a href="/schedule"><i class="fa fa-clock-o"></i> <span>Schedule</span></a></li>
                </ul>
                
            </li>
            
            @if(auth()->user()->rates_id == 1)
           
            <li class="header">LOGS</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar-check-o"></i>
                    <span>Attendance</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    
                     {{-- <li><a href="/latetime"><i class="fa fa-circle-o"></i> <span>Latetime</span></a></li>
                    <li><a href="/overtime"><i class="fa fa-circle-o"></i> <span>Overtime</span></a></li> --}}
                    <li><a href="/attendance"><i class="fa fa-calendar"></i> <span>Attendance</span></a></li>
                    <li><a href="/leave"><i class="fa fa-calendar"></i> <span>Leave</span></a></li>
                    {{-- <li><a href="/check"><i class="fa fa-calendar"></i> <span>Check</span></a></li> --}}
                   
                </ul>
                
            </li>
            @endif

            <li class="header">CARGOS</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-truck"></i>
                    <span>Transactions</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(auth()->user()->rates_id == 1)
                    <li><a href="/transactions"><i class="fa fa-train"></i> Cargo Transactions</a></li>
                    @endif
                    <li><a href="/cargos"><i class="fa fa-bus"></i> Cargo List</a></li>
                    <li><a href="/helpers"><i class="fa fa-user-plus"></i> Helper List</a></li>
                    <li><a href="/drivers"><i class="fa fa-universal-access"></i> Driver List</a></li>
                </ul>
                
            </li>
            
           
        </ul>

        
    </section>
    <!-- /.sidebar -->
</aside>
