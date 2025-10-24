document.addEventListener('DOMContentLoaded', () => {
  const PRODUCTS_PER_PAGE = 24;
  const allProducts = Array.from(document.querySelectorAll('#product .product-cart'));
  const pager = document.querySelector('.pager');
  const pageList = document.querySelector('.page-list');
  const prec = document.querySelector('.page-nav--precedente');
  const next = document.querySelector('.page-nav--suivante');
  const totalPages = Math.max(1, Math.ceil(allProducts.length / PRODUCTS_PER_PAGE));
  let currentPage = 1;

  buildPageLinks(totalPages);
  function displayPage(page) {
    currentPage = clamp(page, 1, totalPages);

    const start = (currentPage - 1) * PRODUCTS_PER_PAGE;
    const end = start + PRODUCTS_PER_PAGE;
    allProducts.forEach((product, index) => {
      product.style.display = (index >= start && index < end) ? '' : 'none';
    });

    updatePaginationState();
  }

  function updatePaginationState() {
    toggleDisabled(prec, currentPage === 1);
    toggleDisabled(next, currentPage === totalPages);
    pageList.querySelectorAll('.page-lien').forEach(btn => {
      const isActive = Number(btn.dataset.page) === currentPage;
      btn.classList.toggle('is-active', isActive);
      if (isActive) btn.setAttribute('aria-current', 'page');
      else btn.removeAttribute('aria-current');
    });
    pager.hidden = totalPages <= 1;
  }

  function buildPageLinks(nPages) {
    pageList.innerHTML = '';
    for (let i = 1; i <= nPages; i++) {
      const li = document.createElement('li');
      const btn = document.createElement('button');
      btn.className = 'page-lien';
      btn.dataset.page = String(i);
      btn.textContent = String(i).padStart(2, '0');
      li.appendChild(btn);
      pageList.appendChild(li);
    }
  }
  pageList.addEventListener('click', (e) => {
    const btn = e.target.closest('.page-lien');
    if (!btn) return;
    displayPage(Number(btn.dataset.page));
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  prec.addEventListener('click', (e) => {
    e.preventDefault();
    if (currentPage > 1) {
      displayPage(currentPage - 1);
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  });

  next.addEventListener('click', (e) => {
    e.preventDefault();
    if (currentPage < totalPages) {
      displayPage(currentPage + 1);
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  });

  function clamp(n, min, max) { return Math.max(min, Math.min(max, n)); }
  function toggleDisabled(el, state) {
    if (!el) return;
    el.toggleAttribute('disabled', state);
    el.setAttribute('aria-disabled', String(state));
  }

  displayPage(1);
});
