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

        .rating-input {
            display: flex;
            gap: 5px;
            direction: rtl;
        }

        .rating-input input[type="radio"] {
            display: none;
        }

        .rating-input label {
            color: #ddd;
            font-size: 1.5rem;
            cursor: pointer;
            transition: color 0.3s;
        }

        .rating-input input[type="radio"]:checked ~ label,
        .rating-input label:hover,
        .rating-input label:hover ~ label {
            color: #ffc107;
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
                                        <label class="form-label">Đánh giá:</label>
                                        <div class="rating-input">
                                            @for($i = 5; $i >= 1; $i--)
                                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" required>
                                                <label for="star{{ $i }}" title="{{ $i }} sao">
                                                    <i class="fas fa-star"></i>
                                                </label>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="comment" class="form-label">Bình luận:</label>
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
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                Bạn đã đánh giá sản phẩm này rồi.
                                <strong>{{ $userReview->rating }} sao</strong> -
                                "{{ Str::limit($userReview->comment, 50) }}"
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

<!-- Giỏ hàng modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
    <div class="modal-header" style="
            background-color: #FFA451;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.25rem;
        ">
        <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-basket2-fill" style="margin-right:8px;"></i>
            Giỏ hàng
            <span id="cartModalCountRight" class="fw-bold ms-2" style="font-size:1rem;">(0)</span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

      <div class="modal-body" id="cartItemsContainer" style="background-color: #fff8f0; min-height: 200px;">
        <!-- Cart items sẽ được JS render ở đây -->
      </div>
      <div class="modal-footer" style="background-color: #F7F1E5;">
        <h5 id="totalPriceContainer">Tổng tiền: 0 VNĐ</h5>

        <a href="/checkout" id="checkoutBtn" class="btn btn-success" style="background-color: #28a745; border:none;">Thanh toán</a>
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

<script src="{{ asset('main_home/js/cart.js') }}"></script>

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

            fetch('{{ url("product/" . $product->id . "/review") }}', {
                method: 'POST',
                body: formData,
                headers: {
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
                    // Show success message
                    showAlert('success', data.message);

                    // Reset form
                    reviewForm.reset();

                    // Reload page to show new review
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

    // Review sorting
    const sortSelect = document.getElementById('sortReviews');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            const sortBy = this.value;
            const url = new URL(window.location);

            if (sortBy === 'newest') {
                url.searchParams.delete('sort');
            } else {
                url.searchParams.set('sort', sortBy);
            }

            window.location.href = url.toString();
        });
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

// Star rating hover effects
document.addEventListener('DOMContentLoaded', function() {
    const ratingInputs = document.querySelectorAll('.rating-input input[type="radio"]');
    const ratingLabels = document.querySelectorAll('.rating-input label');

    ratingLabels.forEach((label, index) => {
        label.addEventListener('mouseenter', function() {
            // Highlight stars up to this one
            for (let i = 0; i <= index; i++) {
                ratingLabels[i].style.color = '#ffc107';
            }
        });

        label.addEventListener('mouseleave', function() {
            // Reset to current selection
            ratingLabels.forEach(l => l.style.color = '#ddd');

            const checkedInput = document.querySelector('.rating-input input[type="radio"]:checked');
            if (checkedInput) {
                const checkedIndex = Array.from(ratingInputs).indexOf(checkedInput);
                for (let i = 0; i <= checkedIndex; i++) {
                    ratingLabels[i].style.color = '#ffc107';
                }
            }
        });
    });

    // Update stars on radio button change
    ratingInputs.forEach((input, index) => {
        input.addEventListener('change', function() {
            ratingLabels.forEach(l => l.style.color = '#ddd');
            for (let i = 0; i <= index; i++) {
                ratingLabels[i].style.color = '#ffc107';
            }
        });
    });

    // Set initial state
    const checkedInput = document.querySelector('.rating-input input[type="radio"]:checked');
    if (checkedInput) {
        const checkedIndex = Array.from(ratingInputs).indexOf(checkedInput);
        for (let i = 0; i <= checkedIndex; i++) {
            ratingLabels[i].style.color = '#ffc107';
        }
    }
});
</script>

@include('template/footer')
