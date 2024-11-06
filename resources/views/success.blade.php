<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Success</title>
</head>
<body class="bg-gray-100">
    <div class="container p-6 mx-auto">
        <h1 class="text-2xl font-bold text-green-500">Payment Successful!</h1>
        <p>Thank you for your order. We will process your order soon.</p>

        <a href="{{ route('index') }}" class="inline-block mt-4 text-blue-500">Return to Homepage</a>
    </div>
</body>
</html>
