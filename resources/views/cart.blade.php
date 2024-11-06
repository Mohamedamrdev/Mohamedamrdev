<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <title>Orders page</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap core css -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <!-- Owl Carousel stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- Nice Select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">

</head>

<body class="sub_page">

    <div class="hero_area">
        <div class="bg-box">
            <img src="images/hero-bg.jpg" alt="">
        </div>

        <!-- Header section -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <span>Feane</span>
                    </a>
                    <a class="navbar-brand" id="usernameDropdown" class="px-3 py-2 rounded-md" style="color: rgb(216, 174, 19);">
                        {{ Auth::user()->name }}
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="mx-auto navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('menu') }}">Menu</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('booktable') }}">Book Table</a></li>
                        </ul>
                        <div class="user_option">
                            <a href={{route('profile')}} class="user_link"><i class="fa fa-user" aria-hidden="true"></i></a>
                            <a class="cart_link" href="{{ route('cart') }}">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <form class="form-inline">
                                <button class="my-2 btn my-sm-0 nav_search-btn" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                            <a href="{{ route('order') }}" class="order_online">Order Online</a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- End header section -->
    </div>
    <div class="h-screen py-8">
        <div class="container px-4 mx-auto">
            <h1 class="header">Orders</h1>
            <div class="flex flex-col gap-4 md:flex-row">
                <!-- Orders Table -->
                <div class="md:w-3/4">
                    <div class="p-6 mb-4 bg-white rounded-lg shadow-md">
                        <h2 class="mb-4 text-xl font-semibold">Your Orders</h2>
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-4 py-2 border-b">Image</th>
                                    <th class="px-4 py-2 border-b">Title</th>
                                    <th class="px-4 py-2 border-b">Price</th>
                                    <th class="px-4 py-2 border-b">Quantity</th>
                                    <th class="px-4 py-2 border-b">Total</th>
                                    <th class="px-4 py-2 border-b">Remove</th> <!-- عمود زر الإزالة -->

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-4 py-2 border-b">
                                        <img src="{{ asset('storage/' . $item->attributes->image) }}" alt="{{ $item->name }}" class="object-cover h-5 rounded" style="width: 100px; height: auto;">
                                    </td>
                                    <td class="px-4 py-2 border-b">{{ $item->name }}</td>
                                    <td class="px-4 py-2 border-b price" data-price="{{ $item->price }}">${{ number_format($item->price, 2) }}</td>
                                    <td class="px-4 py-2 border-b">
                                        <input      type="number" onchange="updateQuantity({{$item->id}})" class="quantity{{$item->id}}" data-id="{{ $item->id }}" value="{{ $item->quantity }}" min="1">
                                    </td>
                                    <td class="px-4 py-2 border-b total-price">${{ number_format($item->price * $item->quantity, 2) }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="remove">🗑️</button>
                                    </form></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="font-bold text-right">Total:</td>
                                    <td id="cart-total" class="font-bold">${{ number_format(session('cart_total', 0), 2) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- Summary Card -->
                <div class="summary-card md:w-1/4">
                    <h2>Summary</h2>

                    <div class="flex justify-between mb-2">
                        <span>Tax</span>
                        <span>${{ Cart::getTotal() - Cart::getSubTotal() }}</span>
                    </div>
                    <a href="{{ route('menu') }}" class="checkout-btn">Add Order</a>
                    <a href="{{ route('order') }}" class="checkout-btn">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-col">
                    <div class="footer_contact">
                        <h4>Contact Us</h4>
                        <div class="contact_link_box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>Location</span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>Call +01 142955698</span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>mohamedamr.dev@gmail.com</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <div class="footer_detail">
                        <a href="" class="footer-logo">Feane</a>
                        <p>Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with</p>

                        <div class="footer_social">
                            <a href="https://www.facebook.com" target="_blank">
                                <i class="fab fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.twitter.com" target="_blank">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.linkedin.com" target="_blank">
                                <i class="fab fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.instagram.com" target="_blank">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <h4>Opening Hours</h4>
                    <p>Monday - Friday:</p>
                    <p>09:00 AM - 09:00 PM</p>
                    <p>Saturday - Sunday:</p>
                    <p>09:00 AM - 11:00 PM</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer section -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.js"></script>
    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="js/custom.js"></script>


    <script>
        function updateQuantity(itemId) {
            var quantity = $('.quantity' + itemId).val();
            var pricePerItem = $('.quantity' + itemId).closest('tr').find('.price').data('price');
            var newTotalPrice = (pricePerItem * quantity).toFixed(2);
            $('.quantity' + itemId).closest('tr').find('.total-price').text('$' + newTotalPrice);
            // Update total cart amount
            updateCartTotal();
            $.ajax({
                url: '{{ route("cart.update", ":id") }}'.replace(':id', itemId), // تأكد من وجود ID صحيح
                type: 'POST',
                data: {
                    'item_id' : itemId,
                    'quantity': quantity,
                    _token: '{{ csrf_token() }}' // تضمين توكن CSRF
                },
                success: function(response) {
                    if (response.success) {
                        // تحديث السعر الكلي في الواجهة
                        $('#cart-total').text('$' + response.cart_total.toFixed(2)); // تحديث الإجمالي في الواجهة
                    } else {
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // تسجيل الخطأ للمعاينة
                    alert('An error occurred. Please try again.'); // عرض رسالة خطأ
                }
            });
        }
    // دالة تحديث الإجمالي
    function updateCartTotal() {
        var total = 0;
        $('.total-price').each(function() {
            var itemTotal = parseFloat($(this).text().replace('$', ''));
            total += itemTotal;
        });
        $('#cart-total').text('$' + total.toFixed(2));
    }
</script>


</body>
</html>
