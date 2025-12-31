// Modal Elements : khôi phục tài khoản
const recoverModal = document.getElementById('recoverModal');

// Buttons for toggling modals
const recoveryBtn = document.getElementById('recoveryBtn');

const closeRecover = document.getElementById('closeRecover');

// Forms
const recoverForm = document.getElementById('recoverForm');


// Event listener for opening the recover modal
recoveryBtn.addEventListener('click',function() {
    recoverModal.style.display = 'block';
});

// Close the recover modal
closeRecover.addEventListener('click', function() {
    recoverModal.style.display = 'none';
});

window.addEventListener('click', function(event) {
    if (event.target === recoverModal) {
        recoverModal.style.display = 'none';
    }
    
});


// Handle login form submission
recoverForm.addEventListener('submit', function(event) {
    event.preventDefault();  // Prevent the page from refreshing

    const email = recoverForm.querySelector('input[type="email"]').value;


    // Simple validation (this can be enhanced with more detailed checks)
    if (email === '' ) {
        alert('Vui lòng nhập email khôi phục!');
        return;
    }
     // Simulate successful registration
     alert('Đã gửi đường link xác nhận qua email, vui lòng kiểm tra và xác nhận để khôi phục tài khoản.');
     recoverModal.style.display = 'none';  // Close the recover modal after successful recovery

});
