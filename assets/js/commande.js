document.addEventListener('DOMContentLoaded', () => {
  // === Sélection paiement ===
  const radios = Array.from(document.querySelectorAll('input[type="radio"][name="payment"]'));
  const tiles  = radios.map(r => r.closest('.pay-tile'));
  const forms  = Array.from(document.querySelectorAll('.pay-form'));
  const placeBtn = document.getElementById('place-order');
  const statusEl = document.getElementById('order-status');
  const form = document.getElementById('checkout-form');

  const setSelectedTile = (value) => {
    tiles.forEach(tile => {
      const r = tile.querySelector('input[type="radio"]');
      tile.dataset.selected = (r.value === value) ? 'true' : 'false';
    });
  };

  const showFormFor = (value) => {
    forms.forEach(form => {
      const active = form.dataset.method === value;
      form.classList.toggle('hidden', !active);
      form.setAttribute('aria-hidden', String(!active));
      // désactive inputs dans les formulaires cachés
      form.querySelectorAll('input, select, textarea, button').forEach(el => {
        el.disabled = !active;
      });
    });
  };

  const getSelectedMethod = () => (radios.find(r => r.checked) || radios[0]).value;

  const updateUI = () => {
    const value = getSelectedMethod();
    setSelectedTile(value);
    showFormFor(value);
  };

  // init
  updateUI();
  radios.forEach(r => r.addEventListener('change', updateUI));

  // === (optionnel) formatage carte ===
  const ccNumber = document.getElementById('cc-number');
  const ccExp    = document.getElementById('cc-exp');
  const ccCvc    = document.getElementById('cc-cvc');

  if (ccNumber) {
    ccNumber.addEventListener('input', (e) => {
      let v = e.target.value.replace(/\D/g, '').slice(0, 16);
      v = v.replace(/(\d{4})(?=\d)/g, '$1 ');
      e.target.value = v;
    });
  }
  if (ccExp) {
    ccExp.addEventListener('input', (e) => {
      let v = e.target.value.replace(/\D/g, '').slice(0, 4);
      if (v.length >= 3) v = v.replace(/^(\d{2})(\d{1,2})$/, '$1/$2');
      e.target.value = v;
    });
  }
  if (ccCvc) {
    ccCvc.addEventListener('input', (e) => {
      e.target.value = e.target.value.replace(/\D/g, '').slice(0, 4);
    });
  }

  // === Simulation d’enregistrement de commande ===
  const sleep = (ms) => new Promise(res => setTimeout(res, ms));

  const setStatus = (type, text) => {
    statusEl.classList.remove('hidden', 'ok', 'err', 'loading');
    statusEl.classList.add(type);
    statusEl.textContent = text;
  };

  const serialize = () => {
    // récupère juste les infos utiles pour la démo
    const data = new FormData(form);
    data.set('payment_method', getSelectedMethod());
    return Object.fromEntries(data.entries());
  };

  const fakeSubmit = async () => {
    try {
      placeBtn.disabled = true;
      setStatus('loading', 'Enregistrement de la commande…');

      // petite latence simulée
      await sleep(1000);

      // "validation" minimale côté front
      const payment = getSelectedMethod();
      if (payment === 'card') {
        if (!ccNumber.value || !ccExp.value || !ccCvc.value) {
          throw new Error('Renseignez les informations de carte bancaire.');
        }
      }

      // payload simulé
      const payload = serialize();
      console.log('Commande envoyée (fake):', payload);

      await sleep(600);

      setStatus('ok', 'Commande enregistrée ! Un e-mail de confirmation vous a été envoyé.');
    } catch (err) {
      setStatus('err', err.message || 'Une erreur est survenue.');
    } finally {
      placeBtn.disabled = false;
    }
  };

  placeBtn.addEventListener('click', fakeSubmit);
});
