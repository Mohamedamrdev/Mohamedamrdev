
        <!DOCTYPE html>
        <html lang="ar">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shortcut icon" href="images/favicon.png" type="">

            <title>Orders page</title>
            <!-- bootstrap core css -->
            <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        </head>
                    @include('partials.header')
                </div>

                <div class="container p-6 mx-auto bg-white rounded-md shadow-lg">
                    <h1 class="mb-4 text-2xl font-bold text-yellow-500">{{ Auth::user()->email }}</h1>

                    <div class="form-container">
                        <form action="{{ route('order.store') }}" method="POST" id="order-form" class="space-y-6">
                            @csrf
                            <!-- User Name Field -->
                            <div>
                                <label for="name" class="block text-lg font-medium text-gray-700">User Name</label>
                                <input type="text" id="name" name="name" class="w-full p-2 mt-1 border border-gray-300 rounded" value="{{Auth::user()->name}}" readonly required>
                            </div>

                            <!-- Phone Number Field -->
                            <div>
                                <label for="phone_number" class="block text-lg font-medium text-gray-700">Phone Number</label>
                                <input type="tel" id="phone_number" name="phone_number" class="w-full p-2 mt-1 border border-gray-300 rounded" value="{{Auth::user()->phone_number}}" required>
                            </div>
                            {{-- email --}}
                            <div>
                                <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                                <input type="tel" id="email" name="email" class="w-full p-2 mt-1 border border-gray-300 rounded" value="{{Auth::user()->email}}" required>
                            </div>

                            <!-- Order Details Field -->
                            <div>
                                <label for="order_details" class="block text-lg font-medium text-gray-700">Order Details</label>
                                <textarea id="order_details" name="order_details" rows="4" class="w-full p-2 mt-1 border border-gray-300 rounded" readonly required>{{ collect(Cart::getContent())->map(function ($item) { return $item->name . ' - Quantity: ' . $item->quantity . ', Price: $' . $item->price; })->implode("\n") }}</textarea>
                                <p class="mt-2 font-semibold text-gray-800">Total: ${{ Cart::getTotal() }}</p>
                            </div>

                            <!-- Payment Method Field -->
                            <div>
                                <label for="payment-method" class="block text-lg font-medium text-gray-700">Payment Method</label>
                                <select id="payment-method" name="payment_method" class="w-full p-2 mt-1 border border-gray-300 rounded" onchange="toggleVisaFields()">
                                    <option value="cash">Cash</option>
                                    <option value="credit-card">Visa</option>
                                </select>
                            </div>

                            <!-- Visa Fields -->
                            <div id="visa-fields" class="hidden mt-4">
                                <label for="card-number" class="block text-lg font-medium text-gray-700">Card Number</label>
                                <input type="text" id="card-number" name="card_number" class="w-full p-2 mt-1 border border-gray-300 rounded" maxlength="16" placeholder="xxxx xxxx xxxx xxxx"  >

                                <label for="expiry-date" class="block mt-3 text-lg font-medium text-gray-700">Expiry Date</label>
                                <input type="string" id="expiry-date" name="expiry_date" class="w-full p-2 mt-1 border border-gray-300 rounded" placeholder="MM/YY"  maxlength="5">

                                <label for="cvv" class="block mt-3 text-lg font-medium text-gray-700">CVV</label>
                                <input type="text" id="cvv" name="cvv" class="w-full p-2 mt-1 border border-gray-300 rounded" maxlength="3" placeholder="***" >
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full p-2 text-lg font-semibold text-white bg-blue-500 rounded hover:bg-blue-600">Send Request</button>
                        </form>
                    </div>
                </div>
            </div>

<script src={{asset('js/order.js')}}></script>
</body>
</html>
