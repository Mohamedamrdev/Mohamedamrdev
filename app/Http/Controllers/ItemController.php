<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Tag;

class ItemController extends Controller

{
    public function store(StoreItemRequest $request)
    {
        // dd($request->all());
        $validatedData = $request->validated();

        $item=Item::create($validatedData);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $item->image = $imagePath; // استخدم مسار الصورة المخزنة
        } else {
            $item->image = null; // إذا لم تكن هناك صورة، تعيين القيمة إلى null
        }

        // حفظ العنصر في قاعدة البيانات
        $item->save();

        return redirect()->route('items')->with('success', 'تم تسجيل البيانات بنجاح!');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id); // استرجاع العنصر بناءً على المعرف
        $tags = Tag::all(); // استرجاع جميع العلامات
        return view('items.editItem', compact('item', 'tags')); // تمرير المتغيرات إلى العرض
    }

    public function update(StoreItemRequest $request, $id)
    {
        // dd($request->all());
        $item = Item::findOrFail($id);

        // تحقق من صحة البيانات
        $validatedData = $request->validated();
        $item->update($validatedData);
        if ($request->hasFile('image')) {
            // تخزين الصورة
            $imagePath = $request->file('image')->store('images', 'public');
            $item->image = $imagePath;
        }

        $item->save();

        return redirect()->route('items')->with('success', 'Item updated successfully.');
    }


    public function destroy($id)
{
    $item = Item::find($id);
    if ($item) {
        $item->delete(); // هذا سيتحقق من وجود العنصر ويحذفه بشكل ناعم
        return redirect()->route('items')->with('success', 'Item deleted successfully.');
    }
    return redirect()->route('items')->with('error', 'Item not found.');
}

public function restore($id)
{
    $item = Item::withTrashed()->find($id);
    if ($item) {
        $item->restore(); // استعادة العنصر
        return redirect()->route('item.index')->with('success', 'Item restored successfully.');
    }
    return redirect()->route('item.index')->with('error', 'Item not found.');
}

public function trashedItems()
{
    $deletedItems = Item::onlyTrashed()->get(); // الحصول على العناصر المحذوفة
    return view('items.trashed', compact('deletedItems')); // عرض العناصر المحذوفة
}


}


