$(document).ready(function () {
    $("#payment_filter").on("change", function () {
        var paymentMethod = $(this).val();
        $.ajax({
            url: '{{ route("orderlist") }}',
            method: "GET",
            data: { payment: paymentMethod },
            success: function (response) {
                $("#datatable tbody").html(response);
            },
        });
    });
});

$(document).ready(function () {
    var table = $("#datatable").DataTable();

    // Filter table by payment method
    $("#paymentFilter").on("change", function () {
        var selectedMethod = $(this).val();
        table.columns(5).search(selectedMethod).draw();
    });
});
