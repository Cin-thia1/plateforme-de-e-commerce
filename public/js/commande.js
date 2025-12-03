document.addEventListener("DOMContentLoaded", async () => {

    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const statusBox = document.getElementById("order-status");
    const placeBtn = document.getElementById("place-order");
    const payForms = document.querySelectorAll(".pay-form");

    // ============================================================
    // 1. Récupérer les produits depuis Laravel
    // ============================================================
    async function loadProducts() {
        if (cart.length === 0) return [];

        const token = document.querySelector('meta[name="csrf-token"]').content;

        const response = await fetch("/checkout/products", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token
            },
            body: JSON.stringify({ items: cart })
        });

        const data = await response.json();
        return data.products || [];
    }

    // ============================================================
    // 2. Afficher le récap
    // ============================================================
    function renderSummary(products) {
        const list = document.querySelector(".order-list");
        list.innerHTML = "";

        let subtotal = 0;

        products.forEach(p => {
            subtotal += p.price * p.qty;
            list.innerHTML += `
                <div class="item">
                    <img src="${p.image}" class="w-16 h-16 rounded">
                    <div>
                        <div>${p.name} - ${p.small_description}</div>
                        <div>${p.qty} × ${p.price} fcfa</div>
                    </div>
                </div>
                <hr>
            `;
        });

        document.getElementById("subtotal").textContent = subtotal + " fcfa";
        document.getElementById("total").textContent = subtotal + " fcfa";
    }

    const products = await loadProducts();
    renderSummary(products);

    // ============================================================
    // 3. Gestion affichage des modes de paiement
    // ============================================================
    function togglePayForms(method) {
        payForms.forEach(pf => {
            const active = pf.dataset.method === method;
            pf.classList.toggle("hidden", !active);
            pf.setAttribute("aria-hidden", !active);

            [...pf.querySelectorAll("input")].forEach(input => {
                active ? input.setAttribute("required", "required")
                       : input.removeAttribute("required");
            });
        });
    }

    document.querySelectorAll('input[name="payment"]').forEach(r => {
        r.addEventListener("change", () => togglePayForms(r.value));
    });

    togglePayForms(document.querySelector("input[name='payment']:checked").value);

    // ============================================================
    // 4. Collecte des infos
    // ============================================================
    function collectBilling() {
        return {
            name: document.getElementById("fname").value.trim()
                + " " + document.getElementById("lname").value.trim(),
            address: document.getElementById("address").value.trim(),
            country: document.getElementById("country").value.trim(),
            region: document.getElementById("region").value.trim(),
            city: document.getElementById("city").value.trim(),
            zip: document.getElementById("zip").value.trim(),
            phone: document.getElementById("phone").value.trim(),
            email: document.getElementById("email").value.trim(),
            notes: document.getElementById("notes")?.value.trim() || ""
        };
    }

    function collectPayment() {
        const method = document.querySelector("input[name='payment']:checked").value;
        const form = document.querySelector(`.pay-form[data-method="${method}"]`);

        const details = {};
        if (form) {
            form.querySelectorAll("input").forEach(i => {
                details[i.name] = i.value;
            });
        }

        return { method, details };
    }

    function validateForm() {
        return document.getElementById("checkout-form").reportValidity();
    }

    // ============================================================
    // 5. Envoyer la commande
    // ============================================================
    placeBtn.addEventListener("click", async () => {
        if (!validateForm()) return;

        const payload = {
            billing: collectBilling(),
            payment_method: collectPayment(),
            items: cart
        };

        const token = document.querySelector('meta[name="csrf-token"]').content;

        const response = await fetch("/order/place", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token
            },
            body: JSON.stringify(payload)
        });

        const data = await response.json();

        if (data.success) {
            localStorage.removeItem("cart");
            statusBox.classList.remove("hidden");
            statusBox.textContent = "Commande validée ! Redirection…";
            alert("Commande passée avec succès !");
            setTimeout(() => window.location.href = "/orders/history", 900);
        } else {
            statusBox.classList.remove("hidden");
            statusBox.textContent = "Erreur lors de la commande.";
            alert("Erreur lors de la passation de la commande : " + (data.message || "Erreur inconnue"));
        }
    });
});



/*document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('checkout-form');
  const paymentRadios = Array.from(document.querySelectorAll('input[name="payment"]'));
  const payForms = Array.from(document.querySelectorAll('.pay-form'));
  const placeBtn = document.getElementById('place-order');
  const statusEl = document.getElementById('order-status');

  function showPayForm(method) {
    payForms.forEach(pf => {
      const isActive = pf.dataset.method === method;
      pf.classList.toggle('hidden', !isActive);
      pf.setAttribute('aria-hidden', (!isActive).toString());

      // Toggle required on inputs inside the shown payment form only
      const inputs = Array.from(pf.querySelectorAll('input, select, textarea'));
      inputs.forEach(inp => {
        if (isActive) inp.setAttribute('required', 'required');
        else inp.removeAttribute('required');
      });
    });

    // Also ensure card fields (default) are required when card is selected
    // (If card form exists outside pay-forms logic, it's already handled above)
  }

  // init - show the checked payment method's form, default is card (checked in HTML)
  const checked = document.querySelector('input[name="payment"]:checked');
  showPayForm(checked ? checked.value : 'card');

  paymentRadios.forEach(r => r.addEventListener('change', e => showPayForm(e.target.value)));

  function parseOrderItems() {
    const items = [];
    const itemEls = Array.from(document.querySelectorAll('.order-list .item'));
    let subtotal = 0;
    itemEls.forEach(it => {
      const title = it.querySelector('.item-title')?.textContent?.trim() || '';
      const meta = it.querySelector('.item-meta')?.textContent?.trim() || '';
      // meta example: "3 × 25000 fcfa" or "1 × 57000 fcfa"
      const m = meta.match(/(\d+)\s*[×x]\s*([\d\s.,]+)\s*([^\d\s]*)/i);
      let qty = 1, price = 0, currency = '';
      if (m) {
        qty = parseInt(m[1], 10) || 1;
        price = parseFloat(m[2].replace(/\s+/g, '').replace(',', '.')) || 0;
        currency = m[3] || '';
      } else {
        // fallback: try to extract a number
        const num = meta.match(/([\d\s.,]+)/);
        if (num) price = parseFloat(num[1].replace(/\s+/g, '').replace(',', '.')) || 0;
      }
      subtotal += qty * price;
      items.push({ title, qty, price, currency, meta });
    });
    return { items, subtotal };
  }

  function parseTotalsFromSummary() {
    // Try to read Remise and Taxes if present; otherwise compute basic total
    const rows = Array.from(document.querySelectorAll('.order-summary .row'));
    let discount = 0, shipping = 0, taxes = 0;
    rows.forEach(r => {
      const left = r.children[0]?.textContent?.trim() || '';
      const right = r.children[1]?.textContent?.trim() || '';
      if (/Remise/i.test(left) && right) {
        const n = right.match(/-?[\d\s,.]+/);
        if (n) discount = parseFloat(n[0].replace(/\s+/g, '').replace(',', '.')) || 0;
        // if it's shown as "-1000fcfa" accept negative
      } else if (/Livraison/i.test(left)) {
        if (/offert/i.test(right) || right === '') shipping = 0;
        else {
          const n = right.match(/-?[\d\s,.]+/);
          shipping = n ? parseFloat(n[0].replace(/\s+/g, '').replace(',', '.')) || 0 : 0;
        }
      } else if (/Taxes/i.test(left)) {
        const n = right.match(/-?[\d\s,.]+/);
        taxes = n ? parseFloat(n[0].replace(/\s+/g, '').replace(',', '.')) || 0 : 0;
      }
    });

    const parsed = parseOrderItems();
    const subtotal = parsed.subtotal;
    const total = Math.max(0, subtotal - Math.abs(discount) + shipping + taxes);
    return { subtotal, discount, shipping, taxes, total, items: parsed.items };
  }

  function collectBilling() {
    return {
      fname: document.getElementById('fname').value.trim(),
      lname: document.getElementById('lname').value.trim(),
      company: document.getElementById('company').value.trim(),
      address: document.getElementById('address').value.trim(),
      country: document.getElementById('country').value.trim(),
      region: document.getElementById('region').value.trim(),
      city: document.getElementById('city').value.trim(),
      zip: document.getElementById('zip').value.trim(),
      email: document.getElementById('email').value.trim(),
      phone: document.getElementById('phone').value.trim(),
      shipDiff: document.getElementById('ship-diff').checked,
      notes: document.getElementById('notes') ? document.getElementById('notes').value.trim() : ''
    };
  }

  function collectPayment() {
    const method = document.querySelector('input[name="payment"]:checked')?.value || 'card';
    const payObj = { method, details: {} };
    const pf = document.querySelector(`.pay-form[data-method="${method}"]`);
    if (pf) {
      const inputs = Array.from(pf.querySelectorAll('input, select, textarea'));
      inputs.forEach(inp => {
        const name = inp.name || inp.id || null;
        if (!name) return;
        payObj.details[name] = inp.value;
      });
    } else {
      // For card form that might be the only shown .pay-form without data-method attr
      const card = document.querySelector('.pay-form[data-method="card"]');
      if (card) {
        const inputs = Array.from(card.querySelectorAll('input'));
        inputs.forEach(inp => {
          const name = inp.name || inp.id || null;
          if (!name) return;
          payObj.details[name] = inp.value;
        });
      }
    }
    return payObj;
  }

  function validateAll() {
    // First use HTML5 reportValidity on the left form
    if (!form.reportValidity()) {
      return false;
    }
    // Ensure a payment method is selected
    const pm = document.querySelector('input[name="payment"]:checked');
    if (!pm) {
      alert('Veuillez sélectionner un mode de paiement.');
      return false;
    }
    // Ensure visible payment inputs are valid (they have required set by showPayForm)
    const visibleInputs = Array.from(document.querySelectorAll('.pay-form:not(.hidden) input, .pay-form:not(.hidden) select, .pay-form:not(.hidden) textarea'));
    for (const inp of visibleInputs) {
      if (inp.hasAttribute('required') && !inp.value.trim()) {
        inp.focus();
        // try default browser message (if supported)
        inp.reportValidity && inp.reportValidity();
        return false;
      }
    }
    return true;
  }

  placeBtn.addEventListener('click', function () {
    if (!validateAll()) return;

    const billing = collectBilling();
    const payment = collectPayment();
    const totals = parseTotalsFromSummary();

    const order = {
      id: 'ord-' + Date.now(),
      date: new Date().toISOString(),
      billing,
      payment,
      items: totals.items,
      subtotal: totals.subtotal,
      discount: totals.discount,
      shipping: totals.shipping,
      taxes: totals.taxes,
      total: totals.total
    };

    // Save to localStorage
    try {
      const key = 'shopnow_orders';
      const raw = localStorage.getItem(key);
      const arr = raw ? JSON.parse(raw) : [];
      arr.push(order);
      localStorage.setItem(key, JSON.stringify(arr));
      statusEl.classList.remove('hidden');
      statusEl.textContent = 'Commande enregistrée — redirection vers l’historique...';
      // small delay so user sees message
      setTimeout(() => {
        // Redirect to order-history page (assumed filename order-history.html)
        window.location.href = 'order-history.html';
      }, 900);
    } catch (err) {
      console.error('Erreur sauvegarde commande :', err);
      statusEl.classList.remove('hidden');
      statusEl.textContent = 'Erreur lors de l’enregistrement de la commande. Réessayez.';
    }
  });
});
*/