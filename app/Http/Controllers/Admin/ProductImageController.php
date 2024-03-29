<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\UploadAble;
use App\Models\Product;
use App\Models\ProductImage;

class ProductImageController extends Controller
{
    use UploadAble;

    public function upload(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        if ($request->has('image')) {

            $image = $this->uploadOne($request->image, 'products');

            $productImage = new ProductImage([
                'full'      =>  $image,
            ]);

            $product->images()->save($productImage);
        }

        return response()->json(['status' => 'Success']);
    }

    public function delete($id)
    {
        $image = ProductImage::findOrFail($id);

        if ($image->full != '') {
            $this->deleteOne($image->full);
        }
        $image->delete();

        return redirect()->back();
    }
}
