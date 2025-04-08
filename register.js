document.getElementById('terms').addEventListener('change', function() {
    document.getElementById('registerBtn').disabled = !this.checked;
});
