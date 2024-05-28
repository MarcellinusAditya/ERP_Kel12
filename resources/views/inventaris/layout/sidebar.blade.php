  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('index') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{url('/tabel')}}">
          <i class="bi bi-box"></i>
          <span>Product</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="{{ route('logs.index') }}">
          <i class="bi bi-file-earmark"></i>
          <span>Logs</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="{{route('user')}}">
          <i class="bx bx-user"></i>
          <span>User</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="{{route('supplier')}}">
          <i class="bx ri-building-4-line"></i>
          <span>Supplier</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->