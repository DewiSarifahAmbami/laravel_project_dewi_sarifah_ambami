<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold fs-2 text-primary" href="#">TokoKu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bstarget="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="">Produk</a></li>
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{route('cart.index')}}">Menu Checkout</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('orders.history')}}">Daftar Pesanan</a></li>
                @endauth
            </ul>
            @guest
                <a href="{{ route('login') }}" class="btn btn-primary ms-lg-3">Login</a>
            @endguest
            @auth
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger ms-lg-3">Logout</button>
            </form>
            @endauth
        </div>
    </div>
</nav>
<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Wait for the document to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize dropdowns
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
        var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl)
        });
        
        // Initialize tooltips if any
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>