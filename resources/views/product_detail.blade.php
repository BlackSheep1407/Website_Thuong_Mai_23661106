<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->product_name }} - 2Tfresh Market</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .product-hero {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 50%, #388E3C 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        .product-detail-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        .product-image-container {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            background: white;
            padding: 2rem;
        }
        .product-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 15px;
            transition: transform 0.3s;
        }
        .product-image:hover {
            transform: scale(1.05);
        }
        .product-info-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 2.5rem;
            height: fit-content;
        }
        .product-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1rem;
        }
        .product-category {
            background: #4CAF50;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            display: inline-block;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .product-price {
            font-size: 2.5rem;
            font-weight: 700;
            color: #4CAF50;
            margin: 1.5rem 0;
        }
        .price-unit {
            font-size: 1rem;
            font-weight: 400;
            color: #666;
        }
        .product-description {
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 15px;
            margin: 2rem 0;
        }
        .description-title {
            color: #4CAF50;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }
        .description-title i {
            margin-right: 0.5rem;
        }
        .add-to-cart-btn {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            border: none;
            border-radius: 50px;
            padding: 1rem 2rem;
            font-size: 1.2rem;
            font-weight: 600;
            color: white;
            width: 100%;
            transition: all 0.3s;
            margin-bottom: 1rem;
        }
        .add-to-cart-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(76, 175, 80, 0.4);
            color: white;
        }
        .back-btn {
            background: #f8f9fa;
            border: 2px solid #dee2e6;
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            color: #495057;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            text-align: center;
            transition: all 0.3s;
        }
        .back-btn:hover {
            background: #e9ecef;
            border-color: #adb5bd;
            color: #212529;
            text-decoration: none;
        }
        .product-features {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 15px;
            padding: 1.5rem;
            margin: 2rem 0;
        }
        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        .feature-item i {
            color: #856404;
            margin-right: 0.5rem;
            width: 20px;
        }
        @media (max-width: 768px) {
            .product-title {
                font-size: 2rem;
            }
            .product-price {
                font-size: 2rem;
            }
        }

        /* Reviews Section Styles */
        .reviews-section {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .rating-summary-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            padding: 2rem;
            border: 1px solid #dee2e6;
        }

        .average-rating .rating-number {
            font-size: 3rem;
            font-weight: bold;
            color: #4CAF50;
        }

        .stars .fa-star {
            color: #ddd;
            font-size: 1.2rem;
        }

        .stars .fa-star.filled {
            color: #ffc107;
        }

        .rating-distribution .rating-bar {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .rating-label {
            min-width: 60px;
            font-weight: 500;
        }

        .rating-progress {
            flex: 1;
            height: 8px;
            background-color: #e9ecef;
        }

        .rating-count {
            min-width: 30px;
            text-align: right;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .review-form-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            border: 1px solid #dee2e6;
        }

        .rating-input-container {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            border: 1px solid #e9ecef;
        }

        .rating-input {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .rating-input input[type="radio"] {
            display: none;
        }

        .rating-input label {
            color: #ddd;
            font-size: 2rem;
            cursor: pointer;
            transition: all 0.3s;
            padding: 5px;
            border-radius: 5px;
        }

        .rating-input label:hover,
        .rating-input input[type="radio"]:checked ~ label,
        .rating-input input[type="radio"]:checked + label {
            color: #ffc107;
            background-color: #fff3cd;
            transform: scale(1.1);
        }

        .rating-text {
            text-align: center;
            font-size: 1.1rem;
            font-weight: 500;
        }

        .review-item {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            border: 1px solid #e9ecef;
            transition: box-shadow 0.3s;
        }

        .review-item:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .review-avatar .avatar-placeholder {
            width: 50px;
            height: 50px;
            background: #6c757d;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .review-rating .fa-star {
            color: #ddd;
            font-size: 0.9rem;
        }

        .review-rating .fa-star.filled {
            color: #ffc107;
        }

        .reviews-filter {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            border: 1px solid #e9ecef;
        }
    </style>
</head>
<body>
    @include('template/header')

    <!-- Product Hero -->
    <section class="product-hero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="mb-0">{{ $product->product_name }}</h1>
                    <p class="lead mb-0">Chi tiết sản phẩm tươi ngon từ 2Tfresh Market</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Detail Section -->
    <div class="product-detail-container">
        <div class="row">
            <!-- Product Image -->
            <div class="col-lg-6 mb-4">
                <div class="product-image-container">
                    <img src="{{ asset($product->product_img) }}"
                         alt="{{ $product->product_name }}"
                         class="product-image">
                </div>
            </div>

            <!-- Product Information -->
            <div class="col-lg-6">
                <div class="product-info-card">
                    <h2 class="product-title">{{ $product->product_name }}</h2>

                    <div class="product-category mb-3">
                        <i class="fas fa-tag me-1"></i>
                        {{ $product->category->category_name }}
                    </div>

                    <div class="product-price">
                        {{ number_format($product->product_price, 0, ',', '.') }}
                        <span class="price-unit">VNĐ</span>
                    </div>

                    <!-- Product Features -->
                    <div class="product-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Sản phẩm tươi ngon, nhập khẩu chính hãng</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Giao hàng tận nơi trong 2 giờ</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Đảm bảo chất lượng và nguồn gốc</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Hỗ trợ đổi trả trong 24 giờ</span>
                        </div>
                    </div>

                    <!-- Add to Cart Button -->
                    <button class="add-to-cart-btn btn-add-to-cart"
                            data-product-id="{{ $product->product_id }}"
                            data-product-quantity="1">
                        <i class="fas fa-cart-plus me-2"></i>
                        Thêm vào giỏ hàng
                    </button>

                    <!-- Back Button -->
                    <a href="{{ route('home') }}" class="back-btn">
                        <i class="fas fa-arrow-left me-2"></i>
                        Quay lại trang chủ
                    </a>
                </div>
            </div>
        </div>

        <!-- Product Description -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="product-description">
                    <h3 class="description-title">
                        <i class="fas fa-info-circle"></i>
                        Mô tả chi tiết sản phẩm
                    </h3>
                    <div class="description-content">
                        {!! nl2br(e($product->product_description)) !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Reviews Section -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="reviews-section">
                    <h3 class="description-title mb-4">
                        <i class="fas fa-star"></i>
                        Đánh giá & Bình luận sản phẩm
                    </h3>

                    <!-- Rating Summary -->
                    <div class="rating-summary-card mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="rating-overview text-center">
                                    <div class="average-rating mb-2">
                                        <span class="rating-number">{{ number_format($averageRating, 1) }}</span>
                                        <div class="stars">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= round($averageRating) ? 'filled' : '' }}"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="rating-text">{{ $totalReviews }} đánh giá</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="rating-distribution">
                                    @for($i = 5; $i >= 1; $i--)
                                        <div class="rating-bar mb-2">
                                            <span class="rating-label">{{ $i }} <i class="fas fa-star"></i></span>
                                            <div class="progress rating-progress">
                                                <div class="progress-bar bg-warning" style="width: {{ $ratingDistribution[$i]['percentage'] }}%"></div>
                                            </div>
                                            <span class="rating-count">{{ $ratingDistribution[$i]['count'] }}</span>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review Form -->
                    @if(session('user'))
                        @if(!$userReview)
                            <div class="review-form-card mb-4">
                                <h5><i class="fas fa-edit me-2"></i>Viết đánh giá của bạn</h5>
                                <form id="reviewForm" class="mt-3">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Đánh giá sản phẩm:</label>
                                        <div class="rating-input-container">
                                            <div class="rating-input">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" required>
                                                    <label for="star{{ $i }}" title="{{ $i }} sao">
                                                        <i class="fas fa-star"></i>
                                                    </label>
                                                @endfor
                                            </div>
                                            <div class="rating-text mt-2">
                                                <span id="ratingText" class="text-muted">Chọn số sao để đánh giá</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="comment" class="form-label fw-bold">Bình luận:</label>
                                        <textarea class="form-control" id="comment" name="comment" rows="4"
                                                  placeholder="Chia sẻ trải nghiệm của bạn về sản phẩm này..."
                                                  required minlength="10"></textarea>
                                        <small class="text-muted">Ít nhất 10 ký tự</small>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-paper-plane me-2"></i>Gửi đánh giá
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="review-form-card mb-4">
                                <h5><i class="fas fa-edit me-2"></i>Sửa đánh giá của bạn</h5>
                                <form id="reviewForm" class="mt-3">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Đánh giá sản phẩm:</label>
                                        <div class="rating-input-container">
                                            <div class="rating-input">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ $userReview->rating == $i ? 'checked' : '' }} required>
                                                    <label for="star{{ $i }}" title="{{ $i }} sao">
                                                        <i class="fas fa-star"></i>
                                                    </label>
                                                @endfor
                                            </div>
                                            <div class="rating-text mt-2">
                                                <span id="ratingText" class="text-primary fw-bold">{{ $userReview->rating }} sao</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="comment" class="form-label fw-bold">Bình luận:</label>
                                        <textarea class="form-control" id="comment" name="comment" rows="4"
                                                  placeholder="Chia sẻ trải nghiệm của bạn về sản phẩm này..."
                                                  required minlength="10">{{ $userReview->comment }}</textarea>
                                        <small class="text-muted">Ít nhất 10 ký tự</small>
                                    </div>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save me-2"></i>Cập nhật đánh giá
                                    </button>
                                    <button type="button" class="btn btn-danger ms-2" onclick="deleteReview({{ $product->product_id }})">
                                        <i class="fas fa-trash me-2"></i>Xóa đánh giá
                                    </button>
                                    <small class="text-muted d-block mt-2">
                                        <i class="fas fa-clock me-1"></i>
                                        Đánh giá lần cuối: {{ $userReview->updated_at->diffForHumans() }}
                                    </small>
                                </form>
                            </div>
                        @endif
                    @else
                        <div class="alert alert-warning">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            <a href="{{ url('/dang-nhap') }}" class="alert-link">Đăng nhập</a> để viết đánh giá về sản phẩm này.
                        </div>
                    @endif

                    <!-- Reviews Filter -->
                    <div class="reviews-filter mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-comments me-2"></i>Danh sách đánh giá</h5>
                            <div class="filter-options">
                                <select id="sortReviews" class="form-select form-select-sm">
                                    <option value="newest" {{ $sortBy == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                                    <option value="oldest" {{ $sortBy == 'oldest' ? 'selected' : '' }}>Cũ nhất</option>
                                    <option value="highest" {{ $sortBy == 'highest' ? 'selected' : '' }}>Đánh giá cao</option>
                                    <option value="lowest" {{ $sortBy == 'lowest' ? 'selected' : '' }}>Đánh giá thấp</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews List -->
                    <div id="reviewsContainer">
                        @if($reviews->count() > 0)
                            @foreach($reviews as $review)
                                <div class="review-item mb-4">
                                    <div class="review-header d-flex align-items-start">
                                        <div class="review-avatar me-3">
                                            @if($review->user && $review->user->avatar && file_exists(public_path($review->user->avatar)))
                                                <img src="{{ asset($review->user->avatar) }}"
                                                     alt="{{ $review->user->user_fullname }}"
                                                     class="rounded-circle" width="50" height="50">
                                            @else
                                                <img src="{{ asset('avatars/default-avatar.png') }}"
                                                     alt="Default Avatar"
                                                     class="rounded-circle" width="50" height="50"
                                                     onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAgMCA1MCA1MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iMjUiIGN5PSIyNSIgcj0iMjUiIGZpbGw9IiM2YzcwN2QiLz4KPHBhdGggZD0iTTMwIDI4QzMwIDI0IDI2IDIyIDI1IDIyQzI0IDIyIDIyIDI0IDIyIDI4VjMwSDR2LTRjMC0xIDEtMiAyLTJDNSAyNCA2IDI1IDYgMjVIMzBWMjhaTTE4IDIwQzE4IDE3IDE1LjMgMTQuNyAxMiAxNC43QzguNyAxNC43IDYgMTcgNiAyMEM2IDIyIDguNyAyNCAxMiAyNEMxNS4zIDI0IDE4IDIyIDE4IDIwWk0zMiAyOEMzMiAyNSAyOSAyMiAyNSAyMkMyMSAyMiAxOCAyNSAxOCAyOEgzMloiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo='">
                                            @endif
                                        </div>
                                        <div class="review-content flex-grow-1">
                                            <div class="review-meta d-flex justify-content-between align-items-center mb-2">
                                                <div>
                                                    <strong class="review-author">{{ $review->user ? $review->user->user_fullname : 'Người dùng ẩn danh' }}</strong>
                                                    <div class="review-rating">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <i class="fas fa-star {{ $i <= $review->rating ? 'filled' : '' }}"></i>
                                                        @endfor
                                                        <span class="rating-text ms-1">{{ $review->rating }}/5</span>
                                                    </div>
                                                </div>
                                                <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                                            </div>
                                            <div class="review-comment">
                                                <p class="mb-0">{{ nl2br(e($review->comment)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Pagination -->
                            <div class="d-flex justify-content-center">
                                {{ $reviews->appends(['sort' => $sortBy])->links() }}
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">Chưa có đánh giá nào</h5>
                                <p class="text-muted">Hãy là người đầu tiên đánh giá sản phẩm này!</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>




<!-- Toast -->
<div class="position-fixed top-0 end-0 p-3" style="z-index:1080; margin-top:80px;">
  <div id="cartToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">Đã thêm sản phẩm vào giỏ hàng!</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>



<!-- Review System JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Review form submission
    const reviewForm = document.getElementById('reviewForm');
    if (reviewForm) {
        reviewForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');

            // Check if this is an edit (PUT request) or new review (POST)
            const method = this.querySelector('input[name="_method"]')?.value || 'POST';

            // For PUT requests, we need to send the data as query parameters instead of FormData
            let url = '{{ url("product/" . $product->product_id . "/review") }}';
            let fetchOptions = {
                method: method,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            };

            if (method === 'PUT') {
                // For PUT requests, convert FormData to URLSearchParams
                const params = new URLSearchParams();
                for (let [key, value] of formData.entries()) {
                    params.append(key, value);
                }
                url += '?' + params.toString();
                fetchOptions.body = null; // No body for PUT with query params
            } else {
                // For POST requests, use FormData as body
                fetchOptions.body = formData;
            }

            fetch(url, fetchOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error('HTTP error! status: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Show success message
                    showAlert('success', data.message);

                    // For updates, don't reset form, just reload to show changes
                    if (method === 'POST') {
                        reviewForm.reset();
                    }

                    // Reload page to show updated review
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    showAlert('error', data.message || 'Có lỗi xảy ra khi gửi đánh giá!');
                }
            })
            .catch(error => {
                console.error('Error submitting review:', error);
                console.error('Error details:', {
                    message: error.message,
                    stack: error.stack,
                    url: '{{ url("product/" . $product->id . "/review") }}',
                    method: 'POST'
                });
                showAlert('error', 'Có lỗi xảy ra khi gửi đánh giá. Vui lòng thử lại! Chi tiết lỗi: ' + error.message);
            });
        });
    }

    // Review sorting with AJAX
    const sortSelect = document.getElementById('sortReviews');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            const sortBy = this.value;
            loadReviews(sortBy, 1); // Load first page with new sort
        });
    }

    // Function to load reviews via AJAX
    function loadReviews(sortBy = 'newest', page = 1) {
        const reviewsContainer = document.getElementById('reviewsContainer');
        if (!reviewsContainer) return;

        // Show loading
        reviewsContainer.innerHTML = '<div class="text-center py-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>';

        fetch(`{{ url("product/" . $product->product_id . "/reviews") }}?sort=${sortBy}&page=${page}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Update reviews container with new data
            let html = generateReviewsHTML(data.reviews.data);

            // Add pagination if available - generate simple pagination
            if (data.reviews.last_page > 1) {
                html += '<div class="d-flex justify-content-center mt-3">';
                html += '<nav><ul class="pagination">';

                // Previous button
                if (data.reviews.current_page > 1) {
                    html += `<li class="page-item"><a class="page-link" href="#" onclick="loadReviews('${sortBy}', ${data.reviews.current_page - 1})">Trước</a></li>`;
                }

                // Page numbers (simple version - show current ± 2)
                const start = Math.max(1, data.reviews.current_page - 2);
                const end = Math.min(data.reviews.last_page, data.reviews.current_page + 2);

                for (let i = start; i <= end; i++) {
                    const activeClass = i === data.reviews.current_page ? ' active' : '';
                    html += `<li class="page-item${activeClass}"><a class="page-link" href="#" onclick="loadReviews('${sortBy}', ${i})">${i}</a></li>`;
                }

                // Next button
                if (data.reviews.current_page < data.reviews.last_page) {
                    html += `<li class="page-item"><a class="page-link" href="#" onclick="loadReviews('${sortBy}', ${data.reviews.current_page + 1})">Sau</a></li>`;
                }

                html += '</ul></nav>';
                html += '</div>';
            }

            reviewsContainer.innerHTML = html;
        })
        .catch(error => {
            console.error('Error loading reviews:', error);
            reviewsContainer.innerHTML = '<div class="alert alert-danger">Có lỗi khi tải đánh giá. Vui lòng thử lại.</div>';
        });
    }

    // Generate HTML for reviews
    function generateReviewsHTML(reviews) {
        if (!reviews || reviews.length === 0) {
            return `
                <div class="text-center py-5">
                    <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Chưa có đánh giá nào</h5>
                    <p class="text-muted">Hãy là người đầu tiên đánh giá sản phẩm này!</p>
                </div>
            `;
        }

        let html = '';
        reviews.forEach(review => {
            html += `
                <div class="review-item mb-4">
                    <div class="review-header d-flex align-items-start">
                        <div class="review-avatar me-3">
                            ${review.user && review.user.avatar ?
                                `<img src="/${review.user.avatar}" alt="${review.user.user_fullname}" class="rounded-circle" width="50" height="50">` :
                                `<div class="avatar-placeholder">${(review.user ? review.user.user_fullname : 'N/A').charAt(0).toUpperCase()}</div>`
                            }
                        </div>
                        <div class="review-content flex-grow-1">
                            <div class="review-meta d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <strong class="review-author">${review.user ? review.user.user_fullname : 'Người dùng ẩn danh'}</strong>
                                    <div class="review-rating">
                                        ${generateStarsHTML(review.rating)}
                                        <span class="rating-text ms-1">${review.rating}/5</span>
                                    </div>
                                </div>
                                <small class="text-muted">${new Date(review.created_at).toLocaleDateString('vi-VN')}</small>
                            </div>
                            <div class="review-comment">
                                <p class="mb-0">${review.comment.replace(/\n/g, '<br>')}</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        return html;
    }

    // Generate stars HTML
    function generateStarsHTML(rating) {
        let stars = '';
        for (let i = 1; i <= 5; i++) {
            stars += `<i class="fas fa-star ${i <= rating ? 'filled' : ''}"></i>`;
        }
        return stars;
    }
});

function showAlert(type, message) {
    // Remove existing alerts
    const existingAlerts = document.querySelectorAll('.alert');
    existingAlerts.forEach(alert => alert.remove());

    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show`;
    alertDiv.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;

    // Insert at the top of reviews section
    const reviewsSection = document.querySelector('.reviews-section');
    if (reviewsSection) {
        reviewsSection.insertBefore(alertDiv, reviewsSection.firstChild);
    }

    // Auto remove after 5 seconds
    setTimeout(() => {
        if (alertDiv.parentNode) {
            alertDiv.remove();
        }
    }, 5000);
}

// Star rating system with feedback
document.addEventListener('DOMContentLoaded', function() {
    const ratingInputs = document.querySelectorAll('.rating-input input[type="radio"]');
    const ratingLabels = document.querySelectorAll('.rating-input label');
    const ratingText = document.getElementById('ratingText');

    // Rating descriptions
    const ratingDescriptions = {
        1: 'Rất tệ',
        2: 'Tệ',
        3: 'Bình thường',
        4: 'Tốt',
        5: 'Xuất sắc'
    };

    // Function to update rating text
    function updateRatingText(selectedRating) {
        if (ratingText) {
            if (selectedRating) {
                ratingText.textContent = `${selectedRating} sao - ${ratingDescriptions[selectedRating]}`;
                ratingText.className = 'rating-text mt-2 text-primary fw-bold';
            } else {
                ratingText.textContent = 'Chọn số sao để đánh giá';
                ratingText.className = 'rating-text mt-2 text-muted';
            }
        }
    }

    // Function to highlight stars
    function highlightStars(count) {
        ratingLabels.forEach((label, index) => {
            if (index < count) {
                label.style.color = '#ffc107';
                label.style.backgroundColor = '#fff3cd';
                label.style.transform = 'scale(1.1)';
            } else {
                label.style.color = '#ddd';
                label.style.backgroundColor = 'transparent';
                label.style.transform = 'scale(1)';
            }
        });
    }

    // Hover effects
    ratingLabels.forEach((label, index) => {
        label.addEventListener('mouseenter', function() {
            highlightStars(index + 1);
            updateRatingText(index + 1);
        });

        label.addEventListener('mouseleave', function() {
            const checkedInput = document.querySelector('.rating-input input[type="radio"]:checked');
            if (checkedInput) {
                const checkedIndex = Array.from(ratingInputs).indexOf(checkedInput);
                highlightStars(checkedIndex + 1);
                updateRatingText(checkedIndex + 1);
            } else {
                highlightStars(0);
                updateRatingText(null);
            }
        });
    });

    // Click effects
    ratingInputs.forEach((input, index) => {
        input.addEventListener('change', function() {
            highlightStars(index + 1);
            updateRatingText(index + 1);
        });
    });

    // Set initial state
    const checkedInput = document.querySelector('.rating-input input[type="radio"]:checked');
    if (checkedInput) {
        const checkedIndex = Array.from(ratingInputs).indexOf(checkedInput);
        highlightStars(checkedIndex + 1);
        updateRatingText(checkedIndex + 1);
    }
});

// Delete review function
function deleteReview(productId) {
    if (!confirm('Bạn có chắc chắn muốn xóa đánh giá này không? Hành động này không thể hoàn tác.')) {
        return;
    }

    fetch(`{{ url("product") }}/${productId}/review`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('HTTP error! status: ' + response.status);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            showAlert('success', data.message);
            // Reload page after successful deletion
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else {
            showAlert('error', data.message || 'Có lỗi xảy ra khi xóa đánh giá!');
        }
    })
    .catch(error => {
        console.error('Error deleting review:', error);
        showAlert('error', 'Có lỗi xảy ra khi xóa đánh giá. Vui lòng thử lại!');
    });
}
</script>

@include('template/footer')
