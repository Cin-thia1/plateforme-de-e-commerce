
document.addEventListener('click', function(e) {
    if (e.target.matches('.quantity-selector .plus') || e.target.matches('.quantity-selector .minus')) {
        const input = e.target.parentElement.querySelector('.qty');
        let qty = parseInt(input.value);
        qty = e.target.classList.contains('plus') ? qty + 1 : (qty > 1 ? qty - 1 : 1);
        input.value = qty;
        input.dispatchEvent(new Event('change'));
    }
});

