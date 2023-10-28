  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/home" class="brand-link">
          <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Dashboard Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="info mt-3">
                  <a href="#" class="d-block">Admin</a>
              </div>
              {{-- @endforeach --}}
          </div>
          <div class="mt-3">
              <a href="{{ route('dataRumahSakit') }}"
                  class="list-group-item list-group-item-action py-2 ripple bg-dark text-white">
                  <i class="fa fa-home me-3"></i><span class="ml-3">Data Rumah Sakit</span>
              </a>
          </div>
          <div class="mt-3">
              <a href="{{ route('dataPasien') }}"
                  class="list-group-item list-group-item-action py-2 ripple bg-dark text-white">
                  <i class="fa fa-user me-3"></i><span class="ml-3">Data Pasien</span>
              </a>
          </div>

          <div class="mt-3 center">
              <a class="btn btn-info" href="{{ route('logout') }}">Logout</a>
          </div>
          <div></div>
      </div>
  </aside>
  </div>
