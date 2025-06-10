document.addEventListener('DOMContentLoaded', function() {
    // Hiệu ứng rung nhẹ nút Tìm kiếm khi click
    const searchBtn = document.querySelector('form button[type="submit"]');
    if (searchBtn) {
        searchBtn.addEventListener('click', function(e) {
            searchBtn.style.transform = 'scale(0.96)';
            setTimeout(() => searchBtn.style.transform = '', 100);
        });
    }

    // Highlight menu khi click
    document.querySelectorAll('nav .space-x-8 a').forEach(function(link) {
        link.addEventListener('click', function() {
            document.querySelectorAll('nav .space-x-8 a').forEach(l => l.classList.remove('menu-active'));
            link.classList.add('menu-active');
        });
    });
});
