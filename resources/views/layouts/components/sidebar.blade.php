@php
// DATA UNTUK LINKS SIDEBAR
// Menu "Pegawai" telah ditambahkan di bawah "Kelola Akun"
$links = [
    [
        "href" => route('home'),
        "text" => "Dasboard",
        "icon" => "fas fa-home",
        "is_multi" => false
    ],
    [
        "text" => "Kelola Akun",
        "icon" => "fas fa-users-cog",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => "Data Akun",
                "section_icon" => "far fa-circle",
                "section_href" => route('akun.index')
            ],
            [
                "section_text" => "Tambah Akun",
                "section_icon" => "far fa-circle",
                "section_href" => route('akun.add')
            ]
        ]
    ],
    // MENU BARU: PEGAWAI
    [
        "text" => "Pegawai",
        "icon" => "fas fa-id-card-alt", // Mengganti ikon agar lebih relevan
        "is_multi" => true,
        "href" => [
            [
                "section_text" => "Data Pegawai",
                "section_icon" => "far fa-circle",
                "section_href" => route('pegawai.index') // Menggunakan route baru
            ],
             [
                "section_text" => "Tambah Pegawai",
                "section_icon" => "far fa-circle",
                "section_href" => route('pegawai.create') // Menggunakan route baru
            ]
        ]
    ]
];
$navigation_links = json_decode(json_encode($links));
@endphp

<style>
    /* Gradien Modern untuk Sidebar */
    .main-sidebar {
        background: linear-gradient(135deg, #2c3e50, #1a252f) !important;
    }
    /* Membuat link aktif lebih menonjol */
    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active {
        background-color: rgba(255, 255, 255, 0.1) !important;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <img src="{{ asset('vendor/adminlte3/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">
      <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @foreach ($navigation_links as $link)
            @if (!$link->is_multi)
            <li class="nav-item">
            <a href="{{ (url()->current() == $link->href) ? '#' : $link->href }}" class="nav-link {{ (url()->current() == $link->href) ? 'active' : '' }}">
              <i class="nav-icon {{ $link->icon }}"></i>
              <p>{{ $link->text }}</p>
            </a>
            </li>
            @else
            @php
                $open = '';
                $status = '';
                foreach($link->href as $section){
                    // Logika ini diperbaiki agar lebih akurat dalam mendeteksi URL aktif
                    if (str_starts_with(url()->current(), $section->section_href)) {
                        $open = 'menu-open';
                        $status = 'active';
                        break;
                    }
                }
            @endphp
            <li class="nav-item {{$open}}">
            <a href="#" class="nav-link {{$status}}">
                <i class="nav-icon {{ $link->icon }}"></i>
                <p>
                  {{ $link->text }}
                  <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @foreach ($link->href as $section)
                <li class="nav-item">
                  <a href="{{ $section->section_href }}" class="nav-link {{ (url()->current() == $section->section_href) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ $section->section_text }}</p>
                  </a>
                </li>
                @endforeach
              </ul>
            </li>
            @endif
        @endforeach
        </ul>
    </nav>
      </div>
    </aside>