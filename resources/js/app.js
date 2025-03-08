import './bootstrap';
import * as bootstrap from 'bootstrap';
import jQuery from 'jquery';
import '@popperjs/core';

window.$ = window.jQuery = jQuery;
window.bootstrap = bootstrap;

// Tooltip ve Popover'ları etkinleştir
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
