  <li class="dropdown dropdown-list-toggle">
      <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle">
          <i data-feather="bell"></i>
          @if (auth()->user()->unreadNotifications->count() > 0)
              <span class="badge headerBadge1">{{ auth()->user()->unreadNotifications->count() }}</span>
          @endif
      </a>

      <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
          <div class="dropdown-header">
              Notifikasi
              <div class="float-right">
                  <a href="{{ route('mark-read') }}">Mark all as read</a>
              </div>
          </div>

          <div class="dropdown-list-content dropdown-list-message">

              @foreach (auth()->user()->unreadNotifications as $notification)
                  @if ($notification->type == 'App\Notifications\PengaduanNotification')
                      <a href="{{ route('pengaduan.index') }}" class="dropdown-item">
                          <span class="dropdown-item-desc">
                              <span class="message-user">Pengaduan</span>
                              <span class="time messege-text">Nama : {{ $notification->data['nama'] }}</span>
                              <span class="time messege-text">Judul : {{ $notification->data['judul'] }}</span>
                              <span class="time">{{ $notification->created_at->diffForHumans() }}</span>
                          </span>
                      </a>
                  @else
                      <a href="{{ route('surat.index') }}" class="dropdown-item">
                          <span class="dropdown-item-desc">
                              <span class="message-user">Administrasi Surat</span>
                              <span class="time messege-text">Nama : {{ $notification->data['nama'] }}</span>
                              <span class="time messege-text">Jenis Surat :
                                  {{ $notification->data['jenis_surat'] }}</span>
                              <span class="time">{{ $notification->created_at->diffForHumans() }}</span>
                          </span>
                      </a>
                  @endif
              @endforeach
          </div>
      </div>
  </li>
