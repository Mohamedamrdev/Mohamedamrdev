<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="h-screen py-8 bg-gray-100">
        <div class="container px-4 mx-auto">
            <h1 class="mb-4 text-2xl font-semibold">Shopping Cart</h1>
            <span class="mb-2 text-2xl font-semibold">{{ Auth::user()->email }}</span>
            <div class="flex flex-col gap-4 md:flex-row">
                <div class="md:w-3/4">
                    <div class="p-6 mb-4 bg-white rounded-lg shadow-md">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $item)
                                <tr>
                                    <td class="py-4">
                                        <img src="{{ $item->attributes->image }}" alt="{{ $item->title }}" class="w-16 h-16 rounded">
                                    </td>
                                    <td >{{ $item->name }}</td>
                                    <td >{{ $item->title }}</td>
                                    <td >${{ $item->price }}</td>
                                    <td >
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 text-center border border-gray-300 rounded">
                                    </td>
                                    <td class="py-4">${{ $item->getPriceSum() }}</td>
                                    <td class="py-4">
                                        {{-- <form action="{{ route('cart.remove', $item->item_id) }}" method="POST"> --}}
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-md md:w-1/4">
                    <h2 class="mb-4 text-lg font-semibold">Summary</h2>
                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span>${{ Cart::getSubTotal() }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Tax</span>
                        <span>${{ Cart::getTotal() - Cart::getSubTotal() }}</span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <span class="font-semibold">Total</span>
                        <span class="font-semibold">${{ Cart::getTotal() }}</span>
                    </div>

                    <div class="h-20 p-4 bg-blue-600 rounded-lg">
                        <button class="w-full px-4 py-2 text-zinc-950bg-blbue-600 text- hover:bg-blue-700">
                            Proceed to Checkout
                        </button>
                    </div>
                </div>
                    </div>
                    </div>
                </div>
</body>
</html>
