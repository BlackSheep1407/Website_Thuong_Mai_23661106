<?php 
namespace App\Http\Controllers\admin;	
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
	//đẩy form thêm category lên (từ view)
	public function insert_form(){
        $categories=CategoryModel::all();
        return view('admin/category_insert_form',['categories'=>$categories]);
    }
    //xử lý hành động logic insert category mới
    public function action_insert(Request $request){
        $name = $request->input('name'); 
        
        $result=['category_name'=>$name];
        CategoryModel::insert($result);
        return redirect()->to('admin/danh-sach-danh-muc');
    }
    //Nút sửa danh mục
    public function action_update(Request $request){
        $name = $request->input('name'); 
       
        $result=['categories_name'=>$name];
        CategoryModel::where('category_id',$id)->update($result);
        return redirect()->to('admin/danh-sach-danh-muc');
    }
    //Tải lên (hiển thị) danh sách danh mục
    public function get_all(){
        $categories=CategoryModel::all();
        return view('admin/category_list',['categories'=>$categories]);
    }
    //Nút xóa danh mục
    public function del($id){
        $categories=CategoryModel::where('category_id',$id)->delete();
        return redirect()->to('admin/danh-sach-danh-muc');
    }
    //Hiển thị id danh mục
    public function show($id){
        $categories=CategoryModel::all();
        return view('admin/category_info_form',['categories'=>$categories]);
    }
}
 ?>