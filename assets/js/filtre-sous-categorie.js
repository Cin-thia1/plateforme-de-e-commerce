document.addEventListener('DOMContentLoaded', () => {
    const filtersRoot = document.querySelector('.sidebar');
    const chipsContainer = document.getElementById('active-filters');

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
    });

    filtersRoot.querySelectorAll('input[type="checkbox"]:checked').forEach((cb) => {
        const label = getInputLabel(cb);
        addChip(slug(label), label);
    });
    filtersRoot.querySelectorAll('input[type="radio"]:checked').forEach((rb) => {
        const label = getInputLabel(rb);
        const group = rb.name || 'radio';
        addChip(slug(label), label, group);
    });
});
