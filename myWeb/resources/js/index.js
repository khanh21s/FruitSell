// Hiệu ứng khi nhấn nút Thêm vào giỏ hàng (highlight card)
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('form[action*="cart.add"]').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            // Tìm div cha là card
            const card = form.closest('.bg-white');
            if(card) {
                card.classList.add('product-card-add');
                setTimeout(() => card.classList.remove('product-card-add'), 700);
            }
            // Không alert, để trải nghiệm mượt
        });
    });
});
