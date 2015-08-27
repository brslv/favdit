<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand navbar-brand" href="{{ url('/') }}">Favdit</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if ($isBack == 'true')
                    <li><a href="{{ url('/favs/create') }}"><span class="glyphicon glyphicon-plus"></span> Add fav</a></li>
                    <li><a href="{{ url('/categories/create') }}"><span class="glyphicon glyphicon-inbox"></span> Create category</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/favs/manage') }}">Favs</a></li>
                            <li><a href="{{ url('/categories/manage') }}">Categories</a></li>
                        </ul>
                    </li>
                @else
<!--                     <li><a href="#">About</a></li> -->
<!--                     <li><a href="#">Contacts</a></li> -->
                @endif
            </ul>

<!--             @if ($isBack == 'true') -->
<!--                 <form class="navbar-form navbar-left" role="search"> -->
<!--                     <div class="form-group"> -->
<!--                         <input type="text" class="form-control" placeholder="Search"> -->
<!--                     </div> -->
<!--                     <button type="submit" class="btn btn-default">Submit</button> -->
<!--                 </form> -->
<!--             @endif -->

            <ul class="nav navbar-nav navbar-right">
                @if ($isBack == 'true')
                    <li class="dropdown">
                        @if (Auth::user())
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="glyphicon glyphicon-user"></span>
                                {{ Auth::user()->username }}<span class="caret"></span>
                            </a>
                        @endif
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('user') }}">Edit profile</a></li>
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="{{ url('/auth/register') }}"><span class="glyphicon glyphicon-heart"></span> Register</a></li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>