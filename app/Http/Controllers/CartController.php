<?php
namespace App\Http\Controllers;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Item;
use App\Models\Order; // افترض أنك ستسجل الطلبات في نموذج Order
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    /**
     * Display a listing of the cart items.
     */
    public function index()
    {
        // الحصول على محتويات السلة
        $cartItems = Cart::getContent();

        // تحقق إذا كانت السلة فارغة
        if ($cartItems->isEmpty()) {
            return redirect()->route('menu')->with('message', 'Your cart is empty.');
        }

        // الحصول على إجمالي السلة
        $cartTotal = session('cart_total', 0); // استخدم ما تحتاجه لحساب الإجمالي

        return view('cart', [
            'cartItems' => $cartItems,
            'cartTotal' => $cartTotal,
        ]);
    }

    /**
     * Add an item to the cart.
     */
    public function addToCart(Request $request) {
        // استرجاع البيانات من الطلب
        $itemId = $request->input('item_id');
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        // استرجاع اسم العنصر والصورة من قاعدة البيانات
        $item = Item::find($itemId);

        Cart::add([
            'id' => $itemId,
            'name' => $item->title, // استخدم 'name' بدلاً من 'title'
            'quantity' => $quantity,
            'price' => $price,
            'attributes' => [
            'image' => $item->image,
            ],
        ]);
        // تحديث الإجمالي
        $this->updateTotal();

        return redirect()->route('cart')->with('success', 'Item added to cart successfully!');
    }

    /**
     * Update the total price of the cart.
     */
    public function updateTotal()
    {
        $cartItems = Cart::getContent(); // جلب محتويات السلة
        $total = 0;

        // حساب إجمالي السعر بناءً على الكمية والسعر لكل عنصر
        foreach ($cartItems as $item) {
            $total += $item->quantity * $item->price;
        }

        // يمكنك حفظ الإجمالي في الجلسة أو قاعدة البيانات إذا كنت بحاجة لذلك
        session(['cart_total' => $total]);

        return $total;
    }

    /**
     * Update the quantity of an item in the cart.
     */
    public function updateCart(Request $request)
    {
        // الحصول على العنصر في السلة
        $cartItem = Cart::get($request->item_id);

        if ($cartItem) {
            // تحديث كمية العنصر في السلة بناءً على الكمية الحالية
            Cart::update($request->item_id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity,
                ],
            ]);

            // تحديث الإجمالي
            $this->updateTotal();

            return redirect()->route('cart')->with('success', 'Item quantity updated successfully!');
        }

        return redirect()->route('cart')->with('error', 'Item not found in cart.');
    }

    /**
     * Remove an item from the cart.
     */
    public function removeFromCart($itemId)
    {
        // إزالة العنصر من السلة
        Cart::remove($itemId);

        // تحديث الإجمالي بعد الحذف
        $this->updateTotal();

        return redirect()->route('cart')->with('success', 'Item removed successfully!');
    }

   /**
 * Process the order and clear the cart.
 */
public function checkout(Request $request)
{
    // تحقق من صحة البيانات
    $request->validate([
        // حقول التحقق
    ]);

    // تسجيل الطلب
    $order = Order::create([
        'user_id' => Auth::id(),
        'total' => session('cart_total'),
        // أضف أي حقول أخرى تحتاجها
    ]);

    // تأكد من أنه تم تسجيل الطلب بنجاح
    if ($order) {
        // مسح السلة
        Cart::clear();
        session()->forget('cart_total');

        return redirect()->route('menu')->with('success', 'Order placed successfully, and the cart has been cleared!');
    }

    return redirect()->route('cart')->with('error', 'Failed to place the order.');
}

}
