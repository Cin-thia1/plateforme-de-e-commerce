document.addEventListener('DOMContentLoaded', function () {
  const key = 'shopnow_orders';
  const raw = localStorage.getItem(key);
  const orders = raw ? JSON.parse(raw) : [];
  const tbody = document.getElementById('orders-table-body');
  if (!tbody) return;

  function formatCurrency(n) {
    return (n || 0).toLocaleString('fr-FR') + ' fcfa';
  }

  orders.reverse().forEach(o => {
    const tr = document.createElement('tr');

    const idTd = document.createElement('td');
    idTd.textContent = o.id;
    tr.appendChild(idTd);

    const dateTd = document.createElement('td');
    dateTd.textContent = new Date(o.date).toLocaleString('fr-FR');
    tr.appendChild(dateTd);

    const itemsTd = document.createElement('td');
    itemsTd.innerHTML = o.items.map(it => `${it.title} <small>(${it.qty}× ${formatCurrency(it.price)})</small>`).join('<br>');
    tr.appendChild(itemsTd);

    const totalTd = document.createElement('td');
    totalTd.textContent = formatCurrency(o.total);
    tr.appendChild(totalTd);

    const methodTd = document.createElement('td');
    methodTd.textContent = (o.payment?.method || '');
    tr.appendChild(methodTd);

    const statusTd = document.createElement('td');
    statusTd.textContent = 'Enregistrée';
    tr.appendChild(statusTd);

    tbody.appendChild(tr);
  });
});