<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin/trangchu">SUPER MARKET</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    
                    <i class="fa fa-user fa-fw"></i> {!! Auth::guard('admin')->user()->name !!} 
                    
                </li>
                <li class="dropdown">
                    <a href="admin/logout">
                        <span class="glyphicon glyphicon-log-out" aria-hidden="true" title="Đăng xuất"></span> 
                    </a>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            @include('admin.layouts.menu')
            <!-- /.navbar-static-side -->
        </nav>