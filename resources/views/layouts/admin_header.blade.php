@if(Session::has('user'))
<!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-6">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <!-- <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div> -->
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="user-area dropdown float-right">
                        
                        <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('images/admin.jpg') }}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power -off"></i>Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </div> -->
                        <form action="{{ route('manageSession') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                          <select name="lang_locale" id="lang_locale" class="form-control">
                                            <option {{ Session::get('lang_locale') == "en" ? 'selected':''}} value="en">EN</option>
                                            <option {{ Session::get('lang_locale') == "ja" ? 'selected':''}} value="ja">にほんご</option>
                                          </select>
                                          {{ csrf_field() }}
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                        
                    </div>

                </div>

                <div class="col-sm-3">
                    <div class="user-area dropdown float-right">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power -off"></i>Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    </div>
                </div>

            </div>

        </header><!-- /header -->
        <!-- Header-->

        <script type="text/javascript">
          var select = document.getElementById('lang_locale');
          select.addEventListener('change', function(){
              this.form.submit();
          }, false);
        </script>

@endif