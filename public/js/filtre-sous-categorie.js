// filtre-sous-categorie.js (Version complète avec gestion des filtres, chips, toggle mobile, et filtrage produits)
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
                    input.dispatchEvent(new Event('change', { bubbles: true }));
                } else if (input.type === 'radio') {
                    input.checked = false;
                }
                break;
            }
        }
        chip.remove();
        applyFilters(); // Réappliquer les filtres après suppression
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
            else {
                const existing = chipsContainer.querySelector(`.chip[data-group="${group}"]`);
                if (existing && existing.dataset.filterId === id) existing.remove();
            }
        }
        applyFilters(); // Appliquer les filtres à chaque changement
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

        // Fermer les filtres quand on repasse en grand écran
        window.addEventListener('resize', () => {
            if (window.innerWidth > 680) {
                filtersRoot.classList.remove('sidebar--open');
            }
        });
    }

    // Fermer sidebar si clic dehors en mobile
    document.addEventListener('click', (e) => {
        const isMobile = window.innerWidth <= 680;
        const isSidebarOpen = filtersRoot.classList.contains('sidebar--open');
        const clickedOutsideSidebar = !filtersRoot.contains(e.target);
        const clickedToggle = filterToggle && filterToggle.contains(e.target);
        if (isMobile && isSidebarOpen && clickedOutsideSidebar && !clickedToggle) {
            filtersRoot.classList.remove('sidebar--open');
        }
    });

    // Fonction pour appliquer les filtres (filtrer les produits)
    function applyFilters() {
        const selectedSubcats = Array.from(filtersRoot.querySelectorAll('#filters-categories input[type="checkbox"]:checked'))
            .map(input => input.value.trim().toLowerCase());

        const selectedBrands = Array.from(filtersRoot.querySelectorAll('.brand-grid input[type="checkbox"]:checked'))
            .map(input => input.value.trim().toLowerCase());

        const selectedPriceRadio = filtersRoot.querySelector('input[name="choix-prix"]:checked');
        let minPrice = 0;
        let maxPrice = Infinity;
        if (selectedPriceRadio && selectedPriceRadio.value !== 'Tout prix') {
            const range = selectedPriceRadio.value.replace(/ FCFA/g, '').split(' à ');
            if (range[0].includes('Moins de')) {
                minPrice = 0;
                maxPrice = parseInt(range[0].replace('Moins de ', ''));
            } else {
                minPrice = parseInt(range[0]);
                maxPrice = range[1] ? parseInt(range[1]) : Infinity;
            }
        }

        // Inputs min/max personnalisés (priorité sur radios si vides)
        const minInput = document.getElementById('min-price');
        const maxInput = document.getElementById('max-price');
        if (minInput.value) minPrice = parseInt(minInput.value);
        if (maxInput.value) maxPrice = parseInt(maxInput.value);

        const products = document.querySelectorAll('.product-cart');
        let visibleCount = 0;

        products.forEach(product => {
            const subcategory = product.dataset.subcategory?.trim().toLowerCase() || '';
            const brand = product.dataset.brand?.trim().toLowerCase() || '';
            const price = parseFloat(product.dataset.price) || 0;

            const matchesSubcat = selectedSubcats.length === 0 || selectedSubcats.includes(subcategory);
            const matchesBrand = selectedBrands.length === 0 || selectedBrands.includes(brand);
            const matchesPrice = price >= minPrice && price <= maxPrice;

            if (matchesSubcat && matchesBrand && matchesPrice) {
                product.classList.remove('hidden');
                visibleCount++;
            } else {
                product.classList.add('hidden');
            }
        });

        resultsCount.textContent = visibleCount;
    }


    // Appliquer les filtres initiaux
    applyFilters();

    // Écouter les changements sur min/max inputs
    document.getElementById('min-price').addEventListener('input', applyFilters);
    document.getElementById('max-price').addEventListener('input', applyFilters);

    // === NOUVELLE FONCTION : SUPPRESSION DE PRODUIT (ADMIN) ===
    document.querySelectorAll('.btn-delete-product').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const productId = this.dataset.id;
            const card = this.closest('.product-cart');

            if (!confirm('Supprimer ce produit ?\nCette action est irréversible !')) {
                return;
            }

            // Animation de disparition
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
                // Suppression définitive du DOM après animation
                setTimeout(() => {
                    card.remove();

                    // Mise à jour du compteur
                    const currentCount = parseInt(resultsCount.textContent);
                    resultsCount.textContent = Math.max(0, currentCount - 1);

                    // Message de succès (tu peux remplacer par un toast plus tard)
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
});