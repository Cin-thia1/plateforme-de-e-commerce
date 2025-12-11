// filtre-sous-categorie.js (Version corrigée)
document.addEventListener('DOMContentLoaded', () => {
    const filtersRoot = document.querySelector('.sidebar');
    const chipsContainer = document.getElementById('active-filters');
    const filterToggle = document.querySelector('.filter-toggle');
    const productsContainer = document.getElementById('product');
    const resultsCount = document.getElementById('results-count');

    const slug = (s) => s
        .toLowerCase()
        .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/(^-|-$)/g, '');

    function getInputLabel(input) {
        const forLabel = input.id ? filtersRoot.querySelector(`label[for="${input.id}"]`) : null;
        const labelEl = input.closest('label') || forLabel;
        const label = (input.value && input.value.trim()) || (labelEl ? labelEl.textContent.trim() : 'Filtre');
        return label.replace(/\s+/g, ' ').trim();
    }

    function addChip(id, label, group = null) {
        if (group) {
            const toRemove = chipsContainer.querySelector(`.chip[data-group="${group}"]`);
            if (toRemove) toRemove.remove();
        }
        if (!group && chipsContainer.querySelector(`[data-filter-id="${id}"]`)) return;

        const chip = document.createElement('span');
        chip.className = 'chip chip--removable';
        chip.dataset.filterId = id;
        if (group) chip.dataset.group = group;

        chip.innerHTML = `
            ${label}
            <button class="chip__close" type="button" aria-label="Retirer ${label}">
                <i class="fa-solid fa-xmark" aria-hidden="true"></i>
            </button>
        `;
        chipsContainer.appendChild(chip);
    }

    function removeChipById(id) {
        const chip = chipsContainer.querySelector(`[data-filter-id="${id}"]`);
        if (chip) chip.remove();
    }

    chipsContainer.addEventListener('click', (e) => {
        const btn = e.target.closest('.chip__close');
        const chip = e.target.closest('.chip');
        if (!btn || !chip) return;

        const id = chip.dataset.filterId;
        const inputs = filtersRoot.querySelectorAll('input[type="checkbox"], input[type="radio"]');
        for (const input of inputs) {
            const label = getInputLabel(input);
            if (slug(label) === id) {
                if (input.type === 'checkbox') {
                    input.checked = false;
                } else if (input.type === 'radio') {
                    input.checked = false;
                }
                break;
            }
        }

        chip.remove();
        document.getElementById('filters-form').submit(); // ⬅ IMPORTANT : recharger la page quand on retire un chip
    });

    filtersRoot.addEventListener('change', (e) => {
        const input = e.target;
        if (!(input.matches('input[type="checkbox"], input[type="radio"]'))) return;

        const label = getInputLabel(input);
        const id = slug(label);

        if (input.type === 'checkbox') {
            if (input.checked) addChip(id, label);
            else removeChipById(id);
        } else {
            const group = input.name || 'radio';
            if (input.checked) addChip(id, label, group);
        }

        document.getElementById('filters-form').submit(); // ⬅ Submit au lieu de applyFilters()
    });

    // Initialiser les chips avec les filtres déjà cochés
    filtersRoot.querySelectorAll('input[type="checkbox"]:checked').forEach((cb) => {
        const label = getInputLabel(cb);
        addChip(slug(label), label);
    });
    filtersRoot.querySelectorAll('input[type="radio"]:checked').forEach((rb) => {
        const label = getInputLabel(rb);
        const group = rb.name || 'radio';
        addChip(slug(label), label, group);
    });

    // Toggle filtre en mobile
    if (filterToggle) {
        filterToggle.addEventListener('click', () => {
            filtersRoot.classList.toggle('sidebar--open');
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 680) {
                filtersRoot.classList.remove('sidebar--open');
            }
        });
    }

    document.addEventListener('click', (e) => {
        const isMobile = window.innerWidth <= 680;
        const isSidebarOpen = filtersRoot.classList.contains('sidebar--open');
        const clickedOutsideSidebar = !filtersRoot.contains(e.target);
        const clickedToggle = filterToggle && filterToggle.contains(e.target);
        if (isMobile && isSidebarOpen && clickedOutsideSidebar && !clickedToggle) {
            filtersRoot.classList.remove('sidebar--open');
        }
    });

    // === CORRECTION PRINCIPALE : auto-submit min/max ===
    document.getElementById('min-price').addEventListener('change', () => {
        document.getElementById('filters-form').submit();
    });

    document.getElementById('max-price').addEventListener('change', () => {
        document.getElementById('filters-form').submit();
    });

    // === SUPPRESSION ADMIN PRODUIT ===
    document.querySelectorAll('.btn-delete-product').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const productId = this.dataset.id;
            const card = this.closest('.product-cart');

            if (!confirm('Supprimer ce produit ?\nCette action est irréversible !')) {
                return;
            }

            card.classList.add('being-deleted');
            card.style.transition = 'opacity 0.4s ease';
            card.style.opacity = '0';

            fetch(`/products/${productId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => { throw err; });
                }
                return response.json();
            })
            .then(data => {
                setTimeout(() => {
                    card.remove();
                    const currentCount = parseInt(resultsCount.textContent);
                    resultsCount.textContent = Math.max(0, currentCount - 1);
                    alert(data.message || 'Produit supprimé avec succès !');
                }, 400);
            })
            .catch(err => {
                console.error('Erreur suppression:', err);
                card.style.opacity = '1';
                card.classList.remove('being-deleted');
                alert(err.message || 'Erreur lors de la suppression du produit');
            });
        });
    });

    // === CORRECTION : event pour tous les radios prix ===
    document.querySelectorAll('input[name="price_range"]').forEach(radio => {
        radio.addEventListener('change', function () {

            const mapping = {
                'Tout prix': {min: '', max: ''},
                '0-5000': {min: '', max: 5000},
                '5000-10000': {min: 5000, max: 10000},
                '10000-50000': {min: 10000, max: 50000},
                '50000-100000': {min: 50000, max: 100000},
                '100000-500000': {min: 100000, max: 500000},
                '500000-1000000': {min: 500000, max: 1000000}
            };

            const val = this.value;
            const {min, max} = mapping[val] || {min: '', max: ''};

            document.getElementById('filter-min').value = min;
            document.getElementById('filter-max').value = max;

            document.getElementById('filters-form').submit(); // ⬅ reload page
        });
    });
});
