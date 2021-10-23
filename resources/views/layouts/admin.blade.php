<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y="
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"
      integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY="
      crossorigin="anonymous"
    />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../../images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
 
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('backend/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/css/venobox.min.css') }}"  media="screen">
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}" />
    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>

  </head>

  <body>
    <nav
      class="navbar navbar-expand-lg navbar-dark bg-mattBlackLight fixed-top"
    >
      <button class="navbar-toggler sideMenuToggler" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand link"  href="#">{{ Auth::user()->name }}</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle p-0"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="material-icons icon">
                person
              </i>
              <span class="text">Account</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
               <a class="dropdown-item" href="">Profile</a>
               <a class="dropdown-item" href="">Profile Change</a>

              <form id="logout-form" action="{{  route('logout')}}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
          </li>
        </ul>
      </div>
    </nav>
  
    <div class="wrapper d-flex">
      <div class="sideMenu bg-mattBlackLight">
        <div class="sidebar" style="background-color:#000">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="" class="nav-link px-2">
                <i class="material-icons icon">
                  dashboard
                </i>
                <span class="text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 "
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">User</span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('user')}}">All User</a>
              </div>
            </li>
             
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 "
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Banner</span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('banners.all')}}">Banner</a>
                <a class="dropdown-item" href="{{route('banners.create')}}">Create</a>
              </div>

            </li>
            

            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 "
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Category</span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('categories.all')}}">Category</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 "
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Tags</span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('tags.all')}}">Tags</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 "
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Post</span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('posts.all')}}">Post</a>
                <a class="dropdown-item" href="{{route('posts.create')}}">Create</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 "
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Leader</span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="">Leader</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 "
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Leader</span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="">About</a>
              </div>
            </li>
             <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 "
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Leader</span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="">About</a>
              </div>
            </li>
          
          </ul>
        </div>
      </div>
      <div class="content">
      @yield('content')
      </div>
    </div>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"
    integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04="
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"
    integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI="
    crossorigin="anonymous"
  ></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="{{ URL::asset('backend/js/dropify.min.js') }}"></script>
  <script src="{{ URL::asset('backend/js/venobox.min.js') }}"></script>
  <script src="{{asset('backend/js/script.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://unpkg.com/vue@2.6.12/dist/vue.js"></script>
  <!-- End custom js for this page-->

  <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
  <script src="{{ asset('https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js')}}"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
<script>
      @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('messege') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
               toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
      @endif
   </script>
  <script>  
    
  $('.delete-confirm').click(function(event) {
  var form =  $(this).closest("form");
  var name = $(this).data("name");
  event.preventDefault();
  swal({
    title: `Are you sure you want to delete ${name}?`,
    text: "If you delete this, it will be gone forever.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
  if (willDelete) {
    form.submit();
  }else {
      swal("Cancel");
    }
  });
  });
  </script>
  @yield('scripts')
</body>
</html>


