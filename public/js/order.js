document.addEventListener('DOMContentLoaded', function() {
    var paymentMethodSelect = document.getElementById('payment-method');
    var visaFields = document.getElementById('visa-fields');

    paymentMethodSelect.addEventListener('change', function() {
        toggleVisaFields();
    });

    toggleVisaFields();
});

// Toggle Visa Fields visibility
function toggleVisaFields() {
    const paymentMethod = document.getElementById('payment-method').value;
    const visaFields = document.getElementById('visa-fields');

    // إذا كان الاختيار فيزا، تظهر الحقول
    if (paymentMethod === 'credit-card') {
        visaFields.style.display = 'block';
    } else {
        visaFields.style.display = 'none';
    }
}
