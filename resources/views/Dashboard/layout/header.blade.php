 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">
    <div class="topbar-divider d-none d-sm-block"></div>
    <li>
      {{-- <button class="btn btn-block"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</button> --}}
      <a href="/logout" class="btn btn-block" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" ></i>Logout</a>
      <form id="logout-form" action="/logout" method="POST" class="d-none">
        @csrf
    </form>
    </li>
</ul>

</nav>
<!-- End of Topbar -->