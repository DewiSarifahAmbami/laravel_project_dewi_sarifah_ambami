@extends('layouts.user.app')
@section('title', 'Keranjang Pesanan')
@section('content')
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Keranjang Pesanan</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($cart && count($cart) > 0)
            <table class="table table-bordered">
                <thead>
                    0, ',', '.') }}</td>
                    </tr>
                    </tfoot>
            </table>
            <!-- Bagian Total + Tombol Checkout -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <h4 class="fw-bold">Total: Rp {{ number_format($grandTotal, 0, ',', '.') }}</h4>
                <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-lg">
                    Lanjut ke Pembayaran
                </a>
            </div>
        @else
            <div class="alert alert-warning">Keranjang masih kosong.</div>
        @endif
        <a href="/" class="btn btn-secondary mt-3">Lanjut Belanja</a>
    </div>
@endsection
