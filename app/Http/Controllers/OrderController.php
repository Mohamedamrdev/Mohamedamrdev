<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Auth\Events\Validated;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'order_details' => 'required|string',
            'payment_method' => 'required|string',
            'card_number' => 'nullable|string|required_if:payment_method,credit-card',
            'expiry_date' => 'nullable|string|required_if:payment_method,credit-card',
            'cvv' => 'nullable|string|required_if:payment_method,credit-card',
        ]);

        // إنشاء الطلب
        $order = new Order();
        $order->user_id = \Auth::user()->id;
        $order->name = $validated['name'];
        $order->phone = $validated['phone_number'];
        $order->email = $validated['email'];
        $order->order_details = $validated['order_details'];
        $order->payment_method = $validated['payment_method'];

        // الحصول على المجموع
        $order->total = Cart::getTotal();

        // إضافة بيانات البطاقة إذا كانت وسيلة الدفع "credit-card"
        if ($validated['payment_method'] === 'credit-card') {
            $order->card_number = $validated['card_number'];
            $order->cvv = $validated['cvv'];
            $order->expire_date = $validated['expiry_date'];
        }

        // حفظ الطلب
        $order->save();

        return view('success', ['id' => $order->id]);
    }



    private function createOrder(Request $request, $paymentIntent)
    {
        // هنا يمكنك حفظ الطلب في قاعدة البيانات
        Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'order_details' => $request->order_details, // تأكد من استخدام الاسم الصحيح
            'payment_method' => $request->payment_method,
            'card_number' => $request->card_number, // إذا كانت طريقة الدفع بطاقة ائتمان
            'cvv' => $request->cvv, // إذا كانت طريقة الدفع بطاقة ائتمان
            'expire_date' => $request->expire_date, // إذا كانت طريقة الدفع بطاقة ائتمان
            'payment_status' => $paymentIntent->status,
            // أضف المزيد من الحقول حسب الحاجة
        ]);
    }

    public function success($id)
    {
        $order = Order::findOrFail($id);
        return view('success', compact('order'));
    }


    public function index()
    {
        $orders = Order::all();

        return view('orders.orderlist', compact('orders'));
    }


}
