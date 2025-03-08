<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Deneme E-Ticaret') }} - @yield('title', 'Ana Sayfa')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: #343a40;
            background-color: #f8f9fa;
        }

        .navbar-brand {
            font-weight: 600;
        }

        footer {
            background-color: #343a40;
            color: #f8f9fa;
            padding: 2rem 0;
        }

        .product-card {
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .product-card .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .product-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .product-price {
            font-weight: 700;
            color: #007bff;
        }

        .product-sale-price {
            color: #dc3545;
        }

        .product-original-price {
            text-decoration: line-through;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .discount-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #dc3545;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 3px;
            font-weight: 600;
        }

        @media (max-width: 767.98px) {
            .product-card .card-img-top {
                height: 150px;
            }

            .cart-item-img {
                width: 60px;
                height: 60px;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    <div id="app">
        <!-- Header -->
        @include('layouts.partials.header')

        <!-- Main Content -->
        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('layouts.partials.footer')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(function () {
            $('[data-bs-toggle="tooltip"]').tooltip();
            $('[data-bs-toggle="popover"]').popover();

            // Ürün varyasyonu seçimi
            $('.product-variation-select').on('change', function() {
                const variationId = $(this).val();
                const price = $(this).find('option:selected').data('price');
                const stock = $(this).find('option:selected').data('stock');

                if (price) {
                    $('#product-price').text(price);
                }

                if (stock <= 0) {
                    $('#add-to-cart-btn').prop('disabled', true).text('Stokta Yok');
                } else {
                    $('#add-to-cart-btn').prop('disabled', false).text('Sepete Ekle');
                }
            });

            // Miktar artırma/azaltma butonları
            $('.quantity-btn').on('click', function() {
                const input = $(this).siblings('.quantity-input');
                const currentValue = parseInt(input.val());

                if ($(this).hasClass('quantity-increase')) {
                    input.val(currentValue + 1);
                } else if (currentValue > 1) {
                    input.val(currentValue - 1);
                }

                // Sepet sayfasındaysa miktarı güncelle
                if ($(this).closest('.cart-item').length) {
                    const updateUrl = $(this).data('update-url');
                    const quantity = input.val();

                    $.post(updateUrl, { quantity: quantity }, function(response) {
                        // Sepet toplamını güncelle
                        $('.cart-subtotal').text(response.subtotal);
                        $('.cart-total').text(response.total);
                    });
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
