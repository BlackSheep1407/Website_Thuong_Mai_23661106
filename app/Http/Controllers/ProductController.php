<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{

    public function get_all(){
        //session()->forget('cart.products');
        $products=ProductModel::join('category','product_category' , '=', 'category_id')->get();
        return view('admin/product_list',['products'=>$products]);
    }
    public function del($id){
        $products=ProductModel::where('product_id',$id)->delete();
        return redirect()->to('admin/danh-sach-san-pham');
    }
    public function show($id){
        $product = ProductModel::with('category')->findOrFail($id);

        // Get reviews with pagination and filtering
        $sortBy = request('sort', 'newest');
        $reviewsQuery = ProductReview::with('user')
            ->where('product_id', $id)
            ->approved();

        switch ($sortBy) {
            case 'oldest':
                $reviewsQuery->orderBy('created_at', 'asc');
                break;
            case 'highest':
                $reviewsQuery->orderBy('rating', 'desc');
                break;
            case 'lowest':
                $reviewsQuery->orderBy('rating', 'asc');
                break;
            default: // newest
                $reviewsQuery->orderBy('created_at', 'desc');
                break;
        }

        $reviews = $reviewsQuery->paginate(10);

        // Calculate rating statistics
        $totalReviews = ProductReview::where('product_id', $id)->approved()->count();
        $averageRating = ProductReview::where('product_id', $id)->approved()->avg('rating') ?? 0;

        $ratingDistribution = [];
        for ($i = 1; $i <= 5; $i++) {
            $count = ProductReview::where('product_id', $id)
                ->where('rating', $i)
                ->approved()
                ->count();
            $ratingDistribution[$i] = [
                'count' => $count,
                'percentage' => $totalReviews > 0 ? round(($count / $totalReviews) * 100, 1) : 0
            ];
        }

        // Check if user has already reviewed this product
        $user = session('user');
        $userReview = null;
        if ($user) {
            $userId = is_array($user) ? ($user['id'] ?? ($user[0]['id'] ?? null)) : null;
            if ($userId) {
                $userReview = ProductReview::where('user_id', $userId)
                    ->where('product_id', $id)
                    ->first();
            }
        }

        return view('product_detail', compact(
            'product',
            'reviews',
            'totalReviews',
            'averageRating',
            'ratingDistribution',
            'sortBy',
            'userReview'
        ));
    }

    // Review methods
    public function storeReview(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10|max:1000',
        ]);

        $user = session('user');
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Vui lòng đăng nhập để đánh giá']);
        }

        $userId = is_array($user) ? ($user['id'] ?? ($user[0]['id'] ?? null)) : null;
        if (!$userId) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy thông tin người dùng']);
        }

        // Check if user already reviewed this product
        $existingReview = ProductReview::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($existingReview) {
            return response()->json(['success' => false, 'message' => 'Bạn đã đánh giá sản phẩm này rồi']);
        }

        // Create new review
        ProductReview::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_approved' => true, // Auto-approve for now
        ]);

        return response()->json(['success' => true, 'message' => 'Cảm ơn bạn đã đánh giá sản phẩm!']);
    }

    public function getReviews($productId)
    {
        $sortBy = request('sort', 'newest');
        $reviewsQuery = ProductReview::with('user')
            ->where('product_id', $productId)
            ->approved();

        switch ($sortBy) {
            case 'oldest':
                $reviewsQuery->orderBy('created_at', 'asc');
                break;
            case 'highest':
                $reviewsQuery->orderBy('rating', 'desc');
                break;
            case 'lowest':
                $reviewsQuery->orderBy('rating', 'asc');
                break;
            default: // newest
                $reviewsQuery->orderBy('created_at', 'desc');
                break;
        }

        $reviews = $reviewsQuery->paginate(10);

        // Calculate rating statistics
        $totalReviews = ProductReview::where('product_id', $productId)->approved()->count();
        $averageRating = ProductReview::where('product_id', $productId)->approved()->avg('rating') ?? 0;

        return response()->json([
            'reviews' => $reviews,
            'totalReviews' => $totalReviews,
            'averageRating' => round($averageRating, 1),
        ]);
    }

    // Admin methods
    public function admin_show($id){
        $products=ProductModel::join('category','product_category' , '=', 'category_id')->where('product_id',$id)->get();
        $categories=CategoryModel::all();
        return view('admin/product_info_form',['products'=>$products,'categories'=>$categories]);
    }
    
}
