<?php

namespace App\Http\Controllers;

use App\Http\Models\CategoryModel;
use App\Http\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopController extends Controller
{
    /*
     * Trang index
     */
    public function index()
    {
        $categories = CategoryModel::all();
        $features = ProductModel::where('is_featured', '1')->paginate(6);
        $news = ProductModel::where('is_new', '1')->paginate(6);
        $count_cart = Cart::count();
        return view('index', compact(['categories', 'features', 'news', 'count_cart']));
    }

    /*
     * Lấy toàn bộ sản phẩm theo loại
     */
    public function getProductByType($id)
    {
        $categories = CategoryModel::all();
        $curr_cate = CategoryModel::where('id', $id)->get();
        $products = ProductModel::where('category', $id)->paginate(6);
        if (count($products) > 0) {
            return view('search', compact(['categories', 'products', 'curr_cate']));
        } else {
            $features = ProductModel::where('is_featured', '1')->paginate(6);
            return view('search', compact(['categories', 'products', 'curr_cate', 'features']));
        }

    }

    /*
     * Tìm sản phẩm theo tên
     */
    public function getProductByName($name)
    {
        $products = DB::table('product')->select('name')
            ->where('name', 'like', '%' . $name . '%')->get()->toJson();
        return $products;
    }

    //Lấy sản phẩm qua Id
    public function getProductById($id)
    {
        $product = ProductModel::find($id);
        $categories = CategoryModel::all();
        $arr = explode(" ", trim($product->image));
        return view('detail', compact(['product', 'arr', 'categories']));

    }

    /*
     * Thêm sản phẩm vào giỏ hàng
     */
    public function addProductToCart(Request $request)
    {
        $id = $request->input('productId');
        $quantity = $request->input('countProduct');
        $product = ProductModel::select('name', 'price', 'image0')->find($id);
        $result = Cart::add(['id' => $id, 'name' => $product->name, 'qty' => $quantity, 'price' => $product->price,
            'options' => ['image0' => $product->image0]]);
        return view('cart');
    }

    //request trang 'cart'
    public function getCart()
    {
        return view('cart');
    }

    //Xóa 1 item trong cart bằng ajax, trả về tổng giá trị đơn hàng để hiển thị trong cart
    public function deleteItemCart()
    {
        Cart::remove($_POST['rowId']);
        return Cart::subtotal();
    }

    //Lưu sản phẩm trong giỏ hàng khi khách hàng thay đổi số lượng ajax
    public function saveCart()
    {
        $datas = json_decode($_POST['par']);
        foreach ($datas as $data => $data_value) {
            Cart::update($data, $data_value);
        }
    }
    //Xóa toàn bộ giỏ hàng ajax
    public function deleteCart()
    {
        Cart::destroy();
    }

    public function saveBill(Request $request){
        $name = $request->input('name');
        $phone = $request->input('phone');
        $address = $request->input('address');

    }
}