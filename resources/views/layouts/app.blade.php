<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet" />

  <!-- Bootstrap & DataTables CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" />

  <!-- Custom Styles Feminine & Modern -->
  <style>
    body {
      background: #fff0f6;
      color: #4a4a4a;
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    .navbar {
      background-color: #f9e6ef;
      border-bottom: 2px solid #f0c0d7;
      box-shadow: 0 4px 10px rgb(240 192 215 / 0.2);
    }
    .navbar-brand, .nav-link {
      color: #b23a48 !important;
      font-weight: 500;
    }
    .nav-link:hover {
      color: #ee719e !important;
      text-decoration: underline;
    }
    main {
      flex: 1;
      padding: 2.5rem 1.5rem;
      max-width: 1100px;
      margin: 0 auto;
    }
    .dropdown-menu {
      background-color: #fde8f0;
      border: 1px solid #f0c0d7;
      box-shadow: 0 5px 15px rgba(226, 130, 162, 0.3);
    }
    .dropdown-item {
      color: #9b2940;
      font-weight: 500;
    }
    .dropdown-item:hover {
      background-color: #f7bfd0;
      color: #b23a48;
    }
    .table {
      background-color: #fff5f9;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgb(240 192 215 / 0.3);
      color: #7a3b4d;
    }
    .table thead {
      background-color: #f9d6e3;
      color: #b23a48;
      border-bottom: 2px solid #f0c0d7;
    }
    .table tbody tr:hover {
      background-color: #fce7f2;
    }
    .dataTables_wrapper .dataTables_filter input,
    .dataTables_wrapper .dataTables_length select {
      background: #fde8f0;
      border: 1px solid #f0c0d7;
      color: #7a3b4d;
      border-radius: 4px;
      padding: 4px 8px;
      transition: all 0.3s ease;
    }
    .dataTables_wrapper .dataTables_filter input:focus,
    .dataTables_wrapper .dataTables_length select:focus {
      outline: none;
      border-color: #ee719e;
      box-shadow: 0 0 8px #ee719e66;
      background: #fff0f6;
    }
    /* Navbar toggler icon with pink lines */
    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%23b23a48' stroke-width='3' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
    /* Buttons */
    .btn-primary {
      background-color: #e95d87;
      border-color: #e95d87;
      transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
      background-color: #f68cb0;
      border-color: #f68cb0;
    }
  </style>

  <!-- Laravel UI CSS -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

  @stack('styles')
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarContent" aria-controls="navbarContent"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav ms-auto">
            @guest
              @if (Route::has('login'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
              @endif
              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
              </li>
              @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <main>
      @yield('content')
    </main>
  </div>

  <!-- JQuery, Bootstrap & DataTables JS -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <!-- Laravel UI JS -->
  <script src="{{ asset('js/app.js') }}"></script>

  @stack('scripts')
</body>
</html>
