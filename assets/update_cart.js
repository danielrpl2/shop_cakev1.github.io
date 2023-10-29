// update_cart.js

$(document).ready(function() {
    // Ketika input kuantitas berubah
    $('.qty').on('change', function() {
        var rowid = $(this).data('rowid');
        var newQty = $(this).val();

        // Kirim permintaan AJAX untuk memperbarui kuantitas di keranjang belanja
        $.ajax({
            type: 'POST',
            url: '<?= base_url("belanja/update_ajax") ?>', // Sesuaikan dengan URL yang benar
            data: { rowid: rowid, qty: newQty },
            success: function(response) {
                // Perbarui tampilan subtotal dan total secara dinamis
                var subtotal = response.subtotal;
                var total = response.total;
                $('#subtotal_' + rowid).text(subtotal);
                $('#total').text(total);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});
