document.getElementById('searchInput').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        var searchBarInput = document.getElementById('searchInput').value.trim();
        if (searchBarInput) {
            window.location.href = 'product-page.php?search=' + encodeURIComponent(searchBarInput);
        }
    }
});