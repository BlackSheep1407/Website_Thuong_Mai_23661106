// public/main_home/js/cart.js
document.addEventListener('DOMContentLoaded', () => {
  const cartItemsContainer = document.getElementById('cartItemsContainer');
  const cartBadge = document.getElementById('cartBadge') || document.getElementById('headerCartCount') || document.getElementById('cartCount');
  const totalPriceContainer = document.getElementById('totalPriceContainer');
  const cartToastEl = document.getElementById('cartToast');
  const cartToast = cartToastEl ? new bootstrap.Toast(cartToastEl, { delay: 1800 }) : null;
  const checkoutBtn = document.getElementById('checkoutBtn');

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

    // Auth redirect or unauthorized
    if (res.status === 401 || res.redirected) {
      // show login flow
      showLoginRequired();
      throw new Error('Unauthorized');
    }

    if (!res.ok) {
      const t = await res.text();
      throw new Error(`Server ${res.status}: ${t}`);
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
      const row = document.createElement('div');
      row.className = 'row align-items-center mb-3 cart-item-row border-bottom pb-2';
      row.innerHTML = `
        <div class="col-2">
          <img src="${it.image}" alt="${escapeHtml(it.name)}" class="img-fluid rounded" style="max-height:64px; object-fit:cover;">
        </div>
        <div class="col-3">
          <p class="mb-1 fw-bold">${escapeHtml(it.name)}</p>
          <small class="text-muted">${escapeHtml(it.category || '')}</small>
        </div>
        <div class="col-2">
          <p class="mb-1">${fmt(it.price)} VNĐ</p>
        </div>
        <div class="col-2">
            <div class="d-flex align-items-center justify-content-center gap-2">
                <button class="btn btn-sm btn-outline-danger btn-decrease" data-id="${pid}">-</button>
                <div class="qty-display px-2 py-1 border rounded text-center">${it.qty}</div>
                <button class="btn btn-sm btn-outline-success btn-increase" data-id="${pid}">+</button>
            </div>
        </div>
        <div class="col-2 text-center">
          <p class="mb-1 fw-bold">${fmt(it.price * it.qty)} VNĐ</p>
        </div>
        <div class="col-1 text-center">
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

  // remove item
  async function removeItem(productId, sourceBtn = null) {
    // confirm once
    if (!confirm('Bạn chắc chắn muốn xóa sản phẩm này?')) return;

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
    const data = await getCartContent();
    if (data) renderCart(data);
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
        alert('Thanh toán thất bại: ' + (err.message || 'Lỗi server'));
      } finally {
        checkoutBtn.disabled = false;
      }
    });
  }
});
