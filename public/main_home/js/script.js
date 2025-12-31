// Get elements for the cart modal and related actions
const cartBtn = document.getElementById("cartBtn");
const cartModal = document.getElementById("cartModal");
const closeCart = document.getElementById("closeCart");
const cartItemsContainer = document.querySelector(".cart-items");
const totalPriceContainer = document.querySelector(".total-price");
const checkoutBtn = document.getElementById("checkoutBtn");
const cartCount = document.getElementById("cartCount");  // Thêm phần tử hiển thị số lượng sản phẩm trong giỏ

// Array to hold cart items
let cartItems = [];

// Load cart from localStorage on page load
function loadCartFromStorage() {
    try {
        const stored = localStorage.getItem('cartItems');
        if (stored) {
            cartItems = JSON.parse(stored);
            displayCart();
            updateCartCount();
        }
    } catch (e) {
        console.error('Error loading cart from localStorage:', e);
        cartItems = [];
    }
}

// Save cart to localStorage
function saveCartToStorage() {
    try {
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
    } catch (e) {
        console.error('Error saving cart to localStorage:', e);
    }
}

// Load cart when page loads
document.addEventListener('DOMContentLoaded', loadCartFromStorage);

// Event listener for cart button to show cart modal
cartBtn.addEventListener("click", () => {
    cartModal.style.display = "block";
    displayCart();
});

// Event listener to close cart modal
closeCart.addEventListener("click", () => {
    cartModal.style.display = "none";
});

// Function to add product to cart
function addToCart(product) {
    // Check if the product is already in the cart
    const existingProduct = cartItems.find(item => item.name === product.name);

    if (existingProduct) {
        // If the product is already in the cart, increase the quantity
        existingProduct.quantity += 1;
    } else {
        // If the product is not in the cart, add it with a quantity of 1
        cartItems.push({ ...product, quantity: 1 });
    }

    alert(`${product.name} đã được thêm vào giỏ hàng`);
    displayCart();
    updateCartCount();  // Cập nhật số lượng sản phẩm trong giỏ
    saveCartToStorage();  // Lưu giỏ hàng vào localStorage
}

// Function to remove product from cart
function removeFromCart(index) {
    cartItems.splice(index, 1);
    displayCart();
    updateCartCount();  // Cập nhật số lượng sản phẩm trong giỏ
    saveCartToStorage();  // Lưu giỏ hàng vào localStorage
}

// Function to increase quantity of an item in the cart
function increaseQuantity(index) {
    cartItems[index].quantity += 1;
    displayCart();
    updateCartCount();  // Cập nhật số lượng sản phẩm trong giỏ
    saveCartToStorage();  // Lưu giỏ hàng vào localStorage
}

// Function to decrease quantity of an item in the cart
function decreaseQuantity(index) {
    if (cartItems[index].quantity > 1) {
        cartItems[index].quantity -= 1;
    } else {
        cartItems.splice(index, 1); // Remove item from cart if quantity is 1 and user decreases it
    }
    displayCart();
    updateCartCount();  // Cập nhật số lượng sản phẩm trong giỏ
    saveCartToStorage();  // Lưu giỏ hàng vào localStorage
}

// Function to display the cart items and calculate total price
function displayCart() {
    cartItemsContainer.innerHTML = "";
    let totalPrice = 0;

    cartItems.forEach((item, index) => {
        const itemElement = document.createElement("div");
        itemElement.classList.add("cart-item");
        itemElement.innerHTML = `
            <img src="${item.image}" alt="${item.name}" class="cart-item-image">
            <p>${item.name}</p>
            <p>${item.price} VNĐ</p>
            <div class="quantity-controls">
                <button onclick="decreaseQuantity(${index})">-</button>
                <p>${item.quantity}</p>
                <button onclick="increaseQuantity(${index})">+</button>
            </div>
            <p>Tổng: ${item.price * item.quantity} VNĐ</p>
            <button onclick="removeFromCart(${index})">Xóa</button>
        `;
        cartItemsContainer.appendChild(itemElement);

        totalPrice += item.price * item.quantity;
    });

    totalPriceContainer.innerHTML = `Tổng tiền: ${totalPrice} VNĐ`;
}

// Function to update the cart count (number of items in the cart)
function updateCartCount() {
    const totalQuantity = cartItems.reduce((total, item) => total + item.quantity, 0); // Tính tổng số lượng sản phẩm trong giỏ
    cartCount.textContent = totalQuantity > 0 ? totalQuantity : 0; // Hiển thị số lượng, nếu giỏ trống thì hiển thị 0
}

// Event listeners for product buttons to add products to cart
const buyBtns = document.querySelectorAll(".buy-btn");

buyBtns.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        const productName = btn.closest(".product-item").querySelector("h3").textContent;
        const productPrice = parseInt(btn.closest(".product-item").querySelector(".price").textContent.replace(' VNĐ', '').replace(/\./g, ''));
        const productImage = btn.closest(".product-item").querySelector("img").src;

        addToCart({
            name: productName,
            price: productPrice,
            image: productImage
        });
    });
});

// Event listener for checkout button to handle checkout
checkoutBtn.addEventListener("click", () => {
    if (cartItems.length === 0) {
        alert("Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm vào giỏ.");
    } else {
        alert("Thanh toán thành công!");
        cartItems = [];
        displayCart();
        updateCartCount();  // Cập nhật lại số lượng sản phẩm trong giỏ sau khi thanh toán
        saveCartToStorage();  // Lưu giỏ hàng vào localStorage sau khi thanh toán
        cartModal.style.display = "none";
    }
});



// Modal Elements : đăng nhập, đăng ký, khôi phục tài khoản
const loginModal = document.getElementById('loginModal');
const registerModal = document.getElementById('registerModal'); 


// Buttons for toggling modals
const loginBtn = document.getElementById('loginBtn');  
const registerBtn = document.getElementById('registerBtn');


const closeLogin = document.getElementById('closeLogin');
const closeRegister = document.getElementById('closeRegister');


// Forms
const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');


// Event listener for opening the login modal///Button for active Signing Modal
loginBtn.addEventListener('click', function() {
    loginModal.style.display = 'block';
});
// Event listener for opening the register modal
registerBtn.addEventListener('click', function() {
    registerModal.style.display = 'block';
});





// Close the login modal
closeLogin.addEventListener('click', function() {
    loginModal.style.display = 'none';
});

// Close the register modal
closeRegister.addEventListener('click', function() {
    registerModal.style.display = 'none';
});

// Close the cart modal
closeCart.addEventListener('click', function() {
    cartModal.style.display = 'none';
});

// Close modals when clicking outside of them
window.addEventListener('click', function(event) {
    if (event.target === loginModal) {
        loginModal.style.display = 'none';
    }
    if (event.target === registerModal) {
        registerModal.style.display = 'none';
    }
    if (event.target === cartModal) {
        cartModal.style.display = 'none';
    }
});

// Handle login form submission
loginForm.addEventListener('submit', function(event) {
    event.preventDefault();  // Prevent the page from refreshing

    const username = loginForm.querySelector('input[type="text"]').value;
    const password = loginForm.querySelector('input[type="password"]').value;

    // Simple validation (this can be enhanced with more detailed checks)
    if (username === '' || password === '') {
        //=== là toán tử so sánh nghiêm ngặt (strict equality). Nó dùng để so sánh cả giá trị và kiểu dữ liệu.
        alert('Vui lòng nhập tên đăng nhập và mật khẩu!');
        return;
    }

    // Simulate a successful login (you'd usually make an API call here)
    if (username === 'admin' && password === '123') {
        alert('Đăng nhập thành công!');
        loginModal.style.display = 'none';  // Close login modal after successful login
    } else {
        alert('Tên đăng nhập hoặc mật khẩu không đúng!');
    }
});

// Handle registration form submission
registerForm.addEventListener('submit', function(event) {
    event.preventDefault();  // Prevent the page from refreshing

    const username = registerForm.querySelector('input[type="text"]').value;
    const email = registerForm.querySelector('input[type="email"]').value;
    const password = registerForm.querySelector('input[type="password"]').value;
    const confirmPassword = registerForm.querySelectorAll('input[type="password"]')[1].value;

    // Simple validation for registration
    if (username === '' || email === '' || password === '' || confirmPassword === '') {
        alert('Vui lòng điền đầy đủ thông tin!');
        return;
    }

    if (password !== confirmPassword) {
        alert('Mật khẩu và mật khẩu nhập lại không khớp!');
        return;
    }

    // Simulate successful registration
    alert('Đăng ký thành công! Bạn có thể đăng nhập ngay.');
    registerModal.style.display = 'none';  // Close the register modal after successful registration
    loginModal.style.display = 'block';  // Automatically show the login modal after registration
});
