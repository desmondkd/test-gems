<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Lembur App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <!-- Menu untuk Karyawan -->
                @if(auth()->check() && auth()->user()->role === 'employee')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('overtime.index') }}">Daftar Lembur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('overtime.create') }}">Ajukan Lembur</a>
                    </li>
                @endif

                <!-- Menu untuk Manager -->
                @if(auth()->check() && auth()->user()->role === 'manager')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('overtime.index') }}">Laporan Lembur</a>
                    </li>
                @endif
            </ul>

            <!-- Menu User -->
            <ul class="navbar-nav ms-auto">
                @if(auth()->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>