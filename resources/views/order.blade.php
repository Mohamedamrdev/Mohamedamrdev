<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Orders page</title>
    <style>
        /* تخصيص بسيط */
        .order-summary {
            display: none; /* إخفاء ملخص الطلب بشكل افتراضي */
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="container p-6 mx-auto">
        <h1 class="mb-4 text-2xl font-bold">{{Auth::user()->email}}</h1>

        <form id="order-form" class="p-6 bg-white rounded-lg shadow-md">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">user name</label>
                <input type="text" id="name" class="block w-full p-2 mt-1 border border-gray-300 rounded" placeholder="أدخل اسمك" required>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700">phone number</label>
                <input type="tel" id="phone" class="block w-full p-2 mt-1 border border-gray-300 rounded" placeholder="أدخل رقم هاتفك" required>
            </div>

            <div class="mb-4">
                <label for="order" class="block text-gray-700">order</label>
                <textarea id="order" rows="4" class="block w-full p-2 mt-1 border border-gray-300 rounded" placeholder="أدخل تفاصيل الطلب" required></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">pay</label>
                <select id="payment-method" class="block w-full p-2 mt-1 border border-gray-300 rounded" required>
                    <option value="cash">cash</option>
                    <option value="credit-card">visa</option>
                </select>
            </div>

            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">send requist</button>
        </form>

        <div id="order-summary" class="p-4 mt-6 rounded-lg shadow-md order-summary bg-gray-50">
            <h2 class="mb-2 text-xl font-bold">summary order</h2>
            <p id="summary-name"></p>
            <p id="summary-phone"></p>
            <p id="summary-order"></p>
            <p id="summary-payment"></p>
        </div>
    </div>

    <script>
        // JavaScript لتعامل مع نموذج الطلب
        document.getElementById('order-form').addEventListener('submit', function(event) {
            event.preventDefault(); // منع إعادة تحميل الصفحة

            // الحصول على البيانات المدخلة
            const name = document.getElementById('name').value;
            const phone = document.getElementById('phone').value;
            const order = document.getElementById('order').value;
            const paymentMethod = document.getElementById('payment-method').value;

            // عرض ملخص الطلب
            document.getElementById('summary-name').innerText = 'اسم العميل: ' + name;
            document.getElementById('summary-phone').innerText = 'رقم الهاتف: ' + phone;
            document.getElementById('summary-order').innerText = 'تفاصيل الطلب: ' + order;
            document.getElementById('summary-payment').innerText = 'طريقة الدفع: ' + paymentMethod;

            // إظهار ملخص الطلب
            document.getElementById('order-summary').style.display = 'block';
        });
    </script>

</body>
</html>
