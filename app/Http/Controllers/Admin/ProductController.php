<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\ProductModel;
use App\Http\Models\CategoryModel;
use App\Http\Requests\AddProductRequest;
use Illuminate\Http\Request;
use Validator;

    /*
     *Controller làm việc với sản phẩm trong trang quản trị
     */

class ProductController extends Controller
{
    /*
     * Lấy sản phẩm cho trang Admin
     */
    public function getList()
    {
        $products = ProductModel::paginate(10);
        return view('Admin/product/all-product', compact('products'));
    }

    //Lấy loại sản phẩm
    public function getAdd()
    {
        $categories = CategoryModel::all();
        return view('Admin.product.add-product', compact('categories'));
    }

    //Phương thức get của trang sửa sản phẩm
    public function getEdit($id)
    {
        $product = ProductModel::find($id);
        if ($product->username == session('username')) {
            $categories = CategoryModel::all();
            //Lấy ra ảnh của sản phẩm
            $arr = explode(" ", rtrim($product->image));
            return view('Admin.product.edit-product', compact(['product', 'categories', 'arr']));
        } else {
            return redirect('Admin/forbiden');
        }
    }

    public function postEdit(AddProductRequest $request)
    {
        //get from db
        $product = ProductModel::find($request->input('product_id'));
        $image = trim($product->image) . " ";
        //get request
        $product->name = $request->input('name');
        $product->category = $request->input('category');
        $product->brand = $request->input('brand');
        $product->color = $request->input('color');
        $product->size = $request->input('size');
        $product->quantity = $request->input('quantity');
        $product->description = $request->input('description');
        if ($request->input('is_new') == 'on')
            $product->is_new = 1;
        else
            $product->is_new = 0;
        if ($request->input('is_featured') == 'on')
            $product->is_featured = 1;
        else
            $product->is_featured = 0;
        //get image quantity
        $image_num = $request->input('count_image');
        //add to db
        for ($i = 1; $i <= $image_num; $i++) {
            if ($request->hasFile('image' . $i) && $request->file('image' . $i)->isValid()) {
                $file = $request->file('image' . $i);
                $extension = array('png', 'jpg', 'jpeg', 'gif');
                if (in_array($file->extension(), $extension)) {
                    $name = $file->getClientOriginalName();
                    $name .= date("y_m_d_h_i_sa");
                    $name .= random_int(1, 99999) . '.' . $file->extension();
                    $file->storeAs(public_path() . 'images', $name);
                    $file->move('..\public\images', $name);
                    $image .= $name . ' ';
                }
            }
        }
        $product->image = $image;
        $product->save();
        return redirect('Admin/product/all-product');
    }

    // Get Delete product by Id
    public function getDelete($id)
    {
        $product = ProductModel::find($id);
        if ($product->username == session('username')) {
            $categories = CategoryModel::all();
            $product->delete();
            return redirect('Admin/product/all-product');
        }
        return redirect('Admin/forbiden');
    }
    //Post method to Add a new Product
    public function postAdd(AddProductRequest $request)
    {
        $product = new ProductModel;
        $product->name = $request->input('name');
        $product->category = $request->input('category');
        $product->brand = $request->input('brand');
        $product->color = $request->input('color');
        $product->size = $request->input('size');
        $product->quantity = $request->input('quantity');
        $product->description = $request->input('description');
        $product->username = session('username');
        //Tạo ảnh
        $image = "";
        //lấy số lượng ảnh
        $image_num = $request->input('count_image');
        //Lấy ảnh
        for ($i = 1; $i <= $image_num; $i++) {
            if ($request->hasFile('image' . $i) && $request->file('image' . $i)->isValid()) {
                $file = $request->file('image' . $i);
                //check extension
                $extension = array('png', 'jpg', 'jpeg', 'gif');
                if (in_array($file->extension(), $extension)) {
                    //Tạo tên thêm thời gian và 1 só ngẫu nhiên
                    $name = $file->getClientOriginalName();
                    $name .= date("y_m_d_h_i_sa");
                    $name .= random_int(1, 99999) . '.' . $file->extension();
                    $image .= $name . ' ';
                    $file->storeAs('/images', $name);
                }
            }
        }
        $product->image = $image;
        $product->save();
        return redirect('Admin/product/all-product');
    }

    //Xóa ảnh qua ajax
    public function postDelImage()
    {
        $product = ProductModel::find($_POST['product_id']);
        $image_fix = $product->image;
        //Sửa lại image để lưu trong db
        $image_fix = str_replace($_POST['image_name'], "", $image_fix);
        $image_fix = str_replace("  ", " ", $image_fix);
        $product->image = $image_fix;
        $product->save();
    }

}