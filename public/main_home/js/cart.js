// public/main_home/js/cart.js
document.addEventListener('DOMContentLoaded', () => {
  console.log('DOM loaded, checking cart elements...');
  const cartItemsContainer = document.getElementById('cartItemsContainer');
  const cartBadge = document.getElementById('cartBadge') || document.getElementById('headerCartCount') || document.getElementById('cartCount');
  const totalPriceContainer = document.getElementById('totalPriceContainer');
  const cartToastEl = document.getElementById('cartToast');
  const cartToast = cartToastEl ? new bootstrap.Toast(cartToastEl, { delay: 1800 }) : null;
  const checkoutBtn = document.getElementById('checkoutBtn');

  console.log('Cart elements found:', {
    cartItemsContainer: !!cartItemsContainer,
    cartBadge: !!cartBadge,
    totalPriceContainer: !!totalPriceContainer,
    cartToastEl: !!cartToastEl,
    checkoutBtn: !!checkoutBtn
  });

  const fmt = n => n ? Number(n).toLocaleString('vi-VN') : '0';

  // Prevent double actions per product: map productId -> timestamp last action
  const lastActionAt = {};

  // Small helper to disable element temporary
  const tempDisable = (el, ms = 700) => {
    if (!el) return;
    el.disabled = true;
    setTimeout(() => el.disabled = false, ms);
  };

  // Fetch wrapper for POST with CSRF
  async function postJSON(url, body = {}) {
    const token = document.querySelector('meta[name="csrf-token"]')?.content;
    const res = await fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        ...(token ? { 'X-CSRF-TOKEN': token } : {})
      },
      body: JSON.stringify(body)
    });

    // Handle different response types
    if (res.status === 401) {
      // Authentication required
      const contentType = res.headers.get('content-type');
      if (contentType && contentType.includes('application/json')) {
        const data = await res.json();
        if (data.redirect) {
          // Show beautiful confirmation modal
          const confirmed = await showCheckoutConfirmModal('Bạn cần đăng nhập để thanh toán sản phẩm trong giỏ hàng.');
          if (confirmed) {
            window.location.href = data.redirect;
          }
          throw new Error('Redirecting to login');
        }
      }
      // Show login modal
      showLoginRequired();
      throw new Error('Unauthorized');
    }

    if (res.status === 400) {
      // Bad request - might be incomplete profile
      const contentType = res.headers.get('content-type');
      if (contentType && contentType.includes('application/json')) {
        const data = await res.json();
        if (data.redirect) {
          // Show beautiful confirmation modal
          const confirmed = await showCheckoutConfirmModal('Bạn cần cập nhật thông tin cá nhân (họ tên và địa chỉ) để thanh toán.');
          if (confirmed) {
            window.location.href = data.redirect;
          }
          throw new Error('Redirecting to profile');
        }
      }
    }

    if (!res.ok) {
      const contentType = res.headers.get('content-type');
      if (contentType && contentType.includes('application/json')) {
        const errorData = await res.json();
        throw new Error(errorData.error || `Server ${res.status}: Unknown error`);
      } else {
        const t = await res.text();
        throw new Error(`Server ${res.status}: ${t}`);
      }
    }
    return res.json();
  }

  // Helper to show cart toast with a specific message
  function showCartToast(message) {
    if (!cartToastEl || !cartToast) return;
    const body = cartToastEl.querySelector('.toast-body');
    if (body) body.textContent = message;
    cartToast.show();
  }

  // GET cart content
  async function getCartContent() {
    try {
      const res = await fetch('/cart/content'); // route must return JSON { cart, count, total }
      if (!res.ok) throw new Error('Không tải được giỏ hàng');
      return await res.json();
    } catch (e) {
      console.error('getCartContent error', e);
      return null;
    }
  }

  // Render cart from server JSON (cart : {id: {name, price,...}}, count, total)
  function renderCart(data) {
    if (!data) {
      cartItemsContainer.innerHTML = `<p class="text-center text-muted py-4">Chưa có sản phẩm nào trong giỏ hàng.</p>`;
      if (totalPriceContainer) totalPriceContainer.textContent = 'Tổng tiền: 0 VNĐ';
      if (cartBadge) cartBadge.textContent = '0';
      return;
    }

    const cart = data.cart || {};
    const count = data.count || 0;
    const total = data.total || 0;

    if (cartBadge) cartBadge.textContent = count;
    // update modal counter if present
    const modalCountEl = document.getElementById('cartModalCount');
    if (modalCountEl) modalCountEl.textContent = count;
    const modalCountRight = document.getElementById('cartModalCountRight');
    if (modalCountRight) modalCountRight.textContent = `(${count})`;

    // Clear
    cartItemsContainer.innerHTML = '';

    if (!cart || Object.keys(cart).length === 0) {
      cartItemsContainer.innerHTML = `<p class="text-center text-muted py-4">Chưa có sản phẩm nào trong giỏ hàng.</p>`;
      if (totalPriceContainer) totalPriceContainer.textContent = 'Tổng tiền: 0 VNĐ';
      return;
    }

    // For each product render the layout you asked: image, name, type, unit price, qty controls center, product total, delete
    for (const pid in cart) {
      const it = cart[pid];
      // Ensure image path is absolute
      const imageUrl = it.image.startsWith('/') ? it.image : '/' + it.image;

      const row = document.createElement('div');
      row.className = 'row align-items-center mb-3 cart-item-row border-bottom pb-2';
      row.innerHTML = `
        <div class="col-12 col-md-2 mb-2 mb-md-0">
          <img src="${imageUrl}" alt="${escapeHtml(it.name)}" class="img-fluid rounded" style="max-height:64px; object-fit:cover;" onerror="this.src='/main_home/img/Trái cây cắt sẵn CS01.jpg'">
        </div>
        <div class="col-12 col-md-2 px-2">
          <p class="mb-1 fw-bold" style="word-break: break-word; line-height: 1.3;" title="${escapeHtml(it.name)}">${escapeHtml(it.name)}</p>
          <small class="text-muted d-block mt-1">${escapeHtml(it.category || '')}</small>
        </div>
        <div class="col-6 col-md-2 mb-2 mb-md-0 px-1 text-center">
          <p class="mb-1 fw-semibold cart-item-price">${fmt(it.price)} VNĐ</p>
        </div>
        <div class="col-6 col-md-2 mb-2 mb-md-0 px-1">
            <div class="d-flex align-items-center justify-content-center gap-2">
                <button class="btn btn-sm btn-outline-danger btn-decrease" data-id="${pid}">-</button>
                <div class="qty-display px-2 py-1 border rounded text-center">${it.qty}</div>
                <button class="btn btn-sm btn-outline-success btn-increase" data-id="${pid}">+</button>
            </div>
        </div>
        <div class="col-8 col-md-3 mb-2 mb-md-0 px-2 text-center">
          <p class="mb-1 fw-bold cart-item-subtotal">${fmt(it.price * it.qty)} VNĐ</p>
        </div>
        <div class="col-6 col-md-1 mb-2 mb-md-0 px-1 text-center">
          <button class="btn btn-sm btn-outline-secondary btn-remove" data-id="${pid}">Xóa</button>
        </div>
      `;
      cartItemsContainer.appendChild(row);
    }

    if (totalPriceContainer) totalPriceContainer.textContent = `Tổng tiền: ${fmt(total)} VNĐ`;
  }


// Nút cũ
{/* <div class="col-2 d-flex justify-content-center">
          <div class="d-flex flex-column align-items-center">
            <button class="btn btn-sm btn-outline-success btn-increase mb-1" data-id="${pid}">+</button>
            <div class="qty-display px-2 py-1 border rounded">${it.qty}</div>
            <button class="btn btn-sm btn-outline-danger btn-decrease mt-1" data-id="${pid}">-</button>
          </div>
 </div> */}



  // Escape helper to avoid injecting HTML
  function escapeHtml(s = '') {
    return String(s)
      .replaceAll('&', '&amp;')
      .replaceAll('<', '&lt;')
      .replaceAll('>', '&gt;')
      .replaceAll('"', '&quot;')
      .replaceAll("'", '&#39;');
  }

  // Optimistic badge update helper
  function optimisticBadgeUpdate(delta) {
    if (!cartBadge) return;
    const cur = parseInt(cartBadge.textContent || '0', 10) || 0;
    cartBadge.textContent = Math.max(0, cur + delta);
  }

  // Add to cart (called from click)
  async function addToCart(productId, qty = 1, sourceBtn = null) {
    // prevent rapid duplicate clicks per product
    const now = Date.now();
    if (lastActionAt[productId] && now - lastActionAt[productId] < 600) return;
    lastActionAt[productId] = now;

    const url = `/cart/add/${productId}`;
    if (sourceBtn) tempDisable(sourceBtn, 700);

    // optimistic: increase badge by qty and show toast immediately
    optimisticBadgeUpdate(qty);
    showCartToast('Đã thêm sản phẩm vào giỏ hàng!');

    try {
      const data = await postJSON(url, { qty });
      // render authoritative state returned by server
      renderCart(data);
    } catch (e) {
      console.error('addToCart error', e);
      // rollback optimistic badge on error
      optimisticBadgeUpdate(-qty);
      if (e.message === 'Unauthorized') {
        // showLoginRequired already called in postJSON
      } else {
        alert('Không thể thêm vào giỏ hàng: ' + (e.message || 'Lỗi server'));
      }
    }
  }

  // change quantity (increase/decrease)
  async function changeQty(productId, action, sourceBtn = null) {
    const now = Date.now();
    if (lastActionAt[`upd-${productId}`] && now - lastActionAt[`upd-${productId}`] < 400) return;
    lastActionAt[`upd-${productId}`] = now;

    const url = `/cart/update/${productId}`;
    if (sourceBtn) tempDisable(sourceBtn, 500);

    // optimistic badge adjust when increasing/decreasing
    if (action === 'increase') optimisticBadgeUpdate(1);
    if (action === 'decrease') optimisticBadgeUpdate(-1);

    try {
      const data = await postJSON(url, { action });
      renderCart(data);
    } catch (e) {
      console.error('changeQty error', e);
      // rollback optimistic change if error
      if (action === 'increase') optimisticBadgeUpdate(-1);
      if (action === 'decrease') optimisticBadgeUpdate(1);
      alert('Lỗi cập nhật số lượng');
    }
  }

  // Show confirmation modal for removing items
  function showRemoveConfirmModal(message) {
    return new Promise((resolve) => {
      // If modal already exists, remove it first
      const existingModal = document.getElementById('removeConfirmModal');
      if (existingModal) {
        existingModal.remove();
      }

      // Create a simple overlay
      const overlay = document.createElement('div');
      overlay.id = 'removeConfirmModal';
      overlay.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1060;
      `;

      overlay.innerHTML = `
        <div style="background: white; border-radius: 16px; padding: 0; max-width: 420px; width: 90%; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04); border: 1px solid rgba(0,0,0,0.06); overflow: hidden; transform: scale(0.95); transition: transform 0.2s ease-out;">
          <div style="display: flex; align-items: center; padding: 20px 24px; background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); color: #fff; position: relative;">
            <div style="width: 48px; height: 48px; border-radius: 12px; background-color: rgba(255, 255, 255, 0.2); display: flex; align-items: center; justify-content: center; margin-right: 16px;">
              <i class="fas fa-trash-alt text-white fs-5"></i>
            </div>
            <div>
              <h5 style="margin: 0; color: #fff; font-size: 18px; font-weight: 600;">Xác nhận xóa</h5>
              <p style="margin: 4px 0 0 0; color: rgba(255, 255, 255, 0.9); font-size: 14px;">Hành động này không thể hoàn tác</p>
            </div>
            <button type="button" class="btn-close btn-close-white ms-auto" id="removeCloseBtn" aria-label="Close" style="background-color: rgba(255, 255, 255, 0.2); border-radius: 50%; padding: 10px; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;"></button>
          </div>
          <div style="padding: 24px;">
            <div style="text-align: center; margin-bottom: 24px;">
              <div style="width: 64px; height: 64px; border-radius: 50%; background-color: #fff3cd; border: 3px solid #ffeaa7; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px auto;">
                <i class="fas fa-exclamation-triangle text-warning fs-2"></i>
              </div>
              <p style="margin: 0; font-size: 16px; color: #495057; line-height: 1.5;">${message}</p>
            </div>
            <div style="display: flex; gap: 12px; justify-content: center;">
              <button type="button" class="btn px-4 py-2" id="removeCancelBtn" style="border: 2px solid #6c757d; color: #6c757d; background-color: transparent; border-radius: 8px; font-weight: 500; transition: all 0.2s ease;">
                <i class="fas fa-times me-2"></i>Hủy bỏ
              </button>
              <button type="button" class="btn px-4 py-2" id="removeConfirmBtn" style="background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); color: white; border: none; border-radius: 8px; font-weight: 500; box-shadow: 0 4px 6px rgba(220, 53, 69, 0.2); transition: all 0.2s ease;">
                <i class="fas fa-trash me-2"></i>Xóa
              </button>
            </div>
          </div>
        </div>
      `;

      document.body.appendChild(overlay);

      let resolved = false;

      // Get button references
      const confirmBtn = overlay.querySelector('#removeConfirmBtn');
      const cancelBtn = overlay.querySelector('#removeCancelBtn');
      const closeBtn = overlay.querySelector('#removeCloseBtn');

      // Helper to clean up and resolve
      const cleanup = (result) => {
        if (resolved) return;
        resolved = true;
        overlay.remove();
        resolve(result);
      };

      // Add event listeners
      confirmBtn.addEventListener('click', () => cleanup(true));
      cancelBtn.addEventListener('click', () => cleanup(false));
      closeBtn.addEventListener('click', () => cleanup(false));

      // Close on Escape key
      const escHandler = (e) => {
        if (e.key === 'Escape') {
          document.removeEventListener('keydown', escHandler);
          cleanup(false);
        }
      };
      document.addEventListener('keydown', escHandler);

      // Close on backdrop click
      overlay.addEventListener('click', (e) => {
        if (e.target === overlay) {
          cleanup(false);
        }
      });
    });
  }

  // remove item
  async function removeItem(productId, sourceBtn = null) {
    // Show beautiful confirmation modal
    const confirmed = await showRemoveConfirmModal('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?');
    if (!confirmed) return;

    const url = `/cart/delete/${productId}`;
    if (sourceBtn) tempDisable(sourceBtn, 600);

    try {
      const data = await postJSON(url, {});
      renderCart(data);
      if (cartToast) {
        showCartToast('Đã xóa sản phẩm khỏi giỏ hàng');
      }
    } catch (e) {
      console.error('removeItem error', e);
      alert('Lỗi xóa sản phẩm');
    }
  }

  // Show login required popup (simple)
  function showLoginRequired() {
    // If modal already exists do nothing
    if (document.getElementById('loginRequiredBox')) return;

    const overlay = document.createElement('div');
    overlay.id = 'loginRequiredBox';
    overlay.style.position = 'fixed';
    overlay.style.left = '0';
    overlay.style.top = '0';
    overlay.style.right = '0';
    overlay.style.bottom = '0';
    overlay.style.display = 'flex';
    overlay.style.alignItems = 'center';
    overlay.style.justifyContent = 'center';
    overlay.style.background = 'rgba(0,0,0,0.4)';
    overlay.style.zIndex = '2000';

    overlay.innerHTML = `
      <div style="background:#fff;padding:20px;border-radius:8px;max-width:320px;text-align:center;">
        <p style="margin-bottom:12px;">Bạn cần đăng nhập để tiếp tục</p>
        <div style="display:flex;gap:8px;justify-content:center;">
          <a href="/login" class="btn btn-primary">Đăng nhập</a>
          <button id="closeLoginRequired" class="btn btn-secondary">Đóng</button>
        </div>
      </div>
    `;
    document.body.appendChild(overlay);
    document.getElementById('closeLoginRequired').addEventListener('click', () => overlay.remove());
  }

  // Show beautiful confirmation modal for checkout requirements
  function showCheckoutConfirmModal(message) {
    return new Promise((resolve) => {
      // If modal already exists, remove it first
      const existingModal = document.getElementById('checkoutConfirmModal');
      if (existingModal) {
        existingModal.remove();
      }

      // Create a simple overlay instead of Bootstrap modal to avoid backdrop conflicts
      const overlay = document.createElement('div');
      overlay.id = 'checkoutConfirmModal';
      overlay.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1060;
      `;

      overlay.innerHTML = `
        <div style="background: white; border-radius: 16px; padding: 0; max-width: 420px; width: 90%; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04); border: 1px solid rgba(0,0,0,0.06); overflow: hidden; transform: scale(0.95); transition: transform 0.2s ease-out;">
          <div style="display: flex; align-items: center; padding: 20px 24px; background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: #fff; position: relative;">
            <div style="width: 48px; height: 48px; border-radius: 12px; background-color: rgba(255, 255, 255, 0.2); display: flex; align-items: center; justify-content: center; margin-right: 16px;">
              <i class="fas fa-shopping-cart text-white fs-5"></i>
            </div>
            <div>
              <h5 style="margin: 0; color: #fff; font-size: 18px; font-weight: 600;">Yêu cầu thanh toán</h5>
              <p style="margin: 4px 0 0 0; color: rgba(255, 255, 255, 0.9); font-size: 14px;">Vui lòng đăng nhập để tiếp tục</p>
            </div>
            <button type="button" class="btn-close btn-close-white ms-auto" id="checkoutCloseBtn" aria-label="Close" style="background-color: rgba(255, 255, 255, 0.2); border-radius: 50%; padding: 10px; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;"></button>
          </div>
          <div style="padding: 24px;">
            <div style="text-align: center; margin-bottom: 24px;">
              <div style="width: 64px; height: 64px; border-radius: 50%; background-color: #d1ecf1; border: 3px solid #bee5eb; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px auto;">
                <i class="fas fa-info-circle text-info fs-2"></i>
              </div>
              <p style="margin: 0; font-size: 16px; color: #495057; line-height: 1.5;">${message}</p>
            </div>
            <div style="display: flex; gap: 12px; justify-content: center;">
              <button type="button" class="btn px-4 py-2" id="checkoutCancelBtn" style="border: 2px solid #6c757d; color: #6c757d; background-color: transparent; border-radius: 8px; font-weight: 500; transition: all 0.2s ease;">
                <i class="fas fa-times me-2"></i>Hủy bỏ
              </button>
              <button type="button" class="btn px-4 py-2" id="checkoutConfirmBtn" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white; border: none; border-radius: 8px; font-weight: 500; box-shadow: 0 4px 6px rgba(40, 167, 69, 0.2); transition: all 0.2s ease;">
                <i class="fas fa-check me-2"></i>Đồng ý
              </button>
            </div>
          </div>
        </div>
      `;

      document.body.appendChild(overlay);

      let resolved = false;

      // Get button references
      const confirmBtn = overlay.querySelector('#checkoutConfirmBtn');
      const cancelBtn = overlay.querySelector('#checkoutCancelBtn');
      const closeBtn = overlay.querySelector('#checkoutCloseBtn');

      // Helper to clean up and resolve
      const cleanup = (result) => {
        if (resolved) return;
        resolved = true;
        overlay.remove();
        resolve(result);
      };

      // Add event listeners
      confirmBtn.addEventListener('click', () => cleanup(true));
      cancelBtn.addEventListener('click', () => cleanup(false));
      closeBtn.addEventListener('click', () => cleanup(false));

      // Close on Escape key
      const escHandler = (e) => {
        if (e.key === 'Escape') {
          document.removeEventListener('keydown', escHandler);
          cleanup(false);
        }
      };
      document.addEventListener('keydown', escHandler);

      // Close on backdrop click
      overlay.addEventListener('click', (e) => {
        if (e.target === overlay) {
          cleanup(false);
        }
      });
    });
  }

  // Event delegation for Add/Increase/Decrease/Remove
  document.addEventListener('click', (e) => {
    const addBtn = e.target.closest('.btn-add-to-cart');
    if (addBtn) {
      e.preventDefault();
      const pid = addBtn.dataset.productId;
      const qty = parseInt(addBtn.dataset.productQuantity || '1', 10) || 1;
      addToCart(pid, qty, addBtn);
      return;
    }

    const inc = e.target.closest('.btn-increase');
    if (inc) {
      e.preventDefault();
      const pid = inc.dataset.id;
      changeQty(pid, 'increase', inc);
      return;
    }

    const dec = e.target.closest('.btn-decrease');
    if (dec) {
      e.preventDefault();
      const pid = dec.dataset.id;
      changeQty(pid, 'decrease', dec);
      return;
    }

    const rem = e.target.closest('.btn-remove');
    if (rem) {
      e.preventDefault();
      const pid = rem.dataset.id;
      removeItem(pid, rem);
      return;
    }
  });

  // initial load and render
  (async function init() {
    console.log('Cart init starting...');
    // Small delay to ensure modal elements are ready
    setTimeout(async () => {
      console.log('Cart init delayed execution...');
      const data = await getCartContent();
      console.log('Cart init data received:', data);
      if (data) {
        renderCart(data);
        console.log('Cart rendered successfully');
      } else {
        console.log('Cart init: no data received');
      }
    }, 100);
  })();

  // checkout: call server to persist order and refresh cart UI
  if (checkoutBtn) {
    checkoutBtn.addEventListener('click', async (e) => {
      e.preventDefault();
      checkoutBtn.disabled = true;
      try {
        const data = await postJSON('/checkout', {});
        // if server returned order_id, redirect to thank-you page
        if (data && data.order_id) {
          // small delay to allow toast to show
          showCartToast('Đặt hàng thành công! Chuyển hướng...');
          setTimeout(() => {
            window.location.href = `/thank-you?order_id=${encodeURIComponent(data.order_id)}`;
          }, 800);
          return;
        }
        // otherwise update cart UI
        renderCart(data);
        showCartToast('Đặt hàng thành công!');
      } catch (err) {
        console.error('checkout error', err);

        // Handle different types of errors gracefully
        if (err.message.includes('Redirecting to login') || err.message.includes('Redirecting to profile')) {
          // These are expected redirects, don't show ugly error messages
          return;
        }

        // Show user-friendly error messages for other errors
        if (err.message.includes('Server 422') || err.message.includes('Dữ liệu không hợp lệ')) {
          alert('Vui lòng điền đầy đủ thông tin thanh toán!');
        } else if (err.message.includes('Server 400')) {
          alert('Có lỗi xảy ra. Vui lòng thử lại sau!');
        } else {
          alert('Thanh toán thất bại: ' + (err.message || 'Lỗi server'));
        }
      } finally {
        checkoutBtn.disabled = false;
      }
    });
  }
});
