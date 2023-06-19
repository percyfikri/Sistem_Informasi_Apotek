<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <ul class="navbar-nav mr-auto">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li>
            {{-- <h4 class=" text-white">Posyandu Harmoni BTU</h4> --}}
        </li>
    </ul>

    <ul class="navbar-nav navbar-right">

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi,{{ Auth::user()->nama }} </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <a id="logout-btn" href="logout" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
{{-- @push('scripts')
    <script>
        $(document).ready(function() {
            $('#logout-btn').click(function(event) {
                event.preventDefault();


                $.ajax({
                    url: '/api/logout',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json'
                    },
                    method: 'POST',
                    success: function(response) {
                        window.location.href = '/login';
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush --}}
