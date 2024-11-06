<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profie</title>
                <!-- bootstrap core css -->
                <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
@include('partials.header')

<body>
<!-- resources/views/profile.blade.php -->

<div class="container mt-5">
    <div class="card">
        <div class="text-center card-header">
            <h2> user profile </h2>
        </div>
        <div class="card-body">
            <h4 class="card-title"> user information </h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Name : </strong> {{ $user->name }}</li>
                <li class="list-group-item"><strong>Email : </strong> {{ $user->email }}</li>
                <li class="list-group-item"><strong>Phone : </strong> {{ $user->phone_number ?? 'غير متوفر' }}</li>
            </ul>
            <hr>

            <h4 class="mt-4 card-title">Orders</h4>
            @if($orders && $orders->count() > 0)
                <ul class="list-group list-group-flush">
                    @foreach($orders as $order)
                        <li class="list-group-item">
                            <strong>order #{{ $order->id }}:</strong> {{ $order->order_details }}  <h2>{{$order->payment_method}}</h2>
                            <br>
                            <span class="text-muted"> Order Date: {{ $order->created_at->format('d-m-Y') }}</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No orders.</p>
            @endif
        </div>
    </div>
</div>


@include('partials.footer')

</body>
</html>
