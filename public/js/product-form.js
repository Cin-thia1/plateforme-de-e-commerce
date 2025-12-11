document.addEventListener('DOMContentLoaded', function () {
    const addImageBtn     = document.querySelector('.add-image-btn');
    const uploadedImages  = document.querySelector('.uploaded-images');
    const form            = document.querySelector('.product-form');

    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'image/*';
    fileInput.multiple = true;
    fileInput.style.display = 'none';
    document.body.appendChild(fileInput);

    let selectedFiles = [];   // nouvelles images
    let deletedPaths  = [];   // chemins des images existantes supprimées

    // === 1. Ajout de nouvelles images ===
    addImageBtn.addEventListener('click', () => fileInput.click());

    fileInput.addEventListener('change', () => {
        Array.from(fileInput.files).forEach(file => {
            selectedFiles.push(file);

            const div = document.createElement('div');
            div.className = 'form-group uploaded-image new-image';

            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.alt = 'Nouvelle image';

            const del = document.createElement('span');
            del.innerHTML = '<i class="fa-solid fa-trash"></i>';
            del.style.cursor = 'pointer';
            del.style.color = 'red';
            del.style.marginLeft = '10px';

            del.onclick = () => {
                selectedFiles = selectedFiles.filter(f => f !== file);
                URL.revokeObjectURL(img.src);
                div.remove();
            };

            div.appendChild(img);
            div.appendChild(del);
            uploadedImages.appendChild(div);
        });
        fileInput.value = '';
    });

    // === 2. Suppression d'une image EXISTANTE ===
    document.querySelectorAll('.delete-old').forEach(btn => {
        btn.addEventListener('click', function () {
            const container = this.closest('.existing-image');
            //const path = container.dataset.path;
            const path=container.dataset.imagePath;
            if (path) deletedPaths.push(path);
            container.remove();
        });
    });

    // === 3. Soumission du formulaire ===
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        // Si c'est un nouvel ajout et aucune image → erreur
        if (!form.dataset.productId && selectedFiles.length === 0) {
            alert('Veuillez ajouter au moins une image');
            return;
        }

        const formData = new FormData();
        const action   = form.dataset.action;
        const method   = form.dataset.method;

        // Champs texte
        formData.append('productName',       document.getElementById('productName').value);
        formData.append('brand',             document.getElementById('brand').value);
        formData.append('category',          document.getElementById('category').value);
        formData.append('subCategory',       document.getElementById('subCategory').value);
        formData.append('stock',             document.getElementById('stock').value);
        formData.append('price',             document.getElementById('price').value);
        formData.append('smallDescription', document.getElementById('smallDescription').value);
        formData.append('description',       document.getElementById('description').value);

        // Nouvelles images
        selectedFiles.forEach(file => formData.append('images[]', file));

        // Images supprimées (uniquement en modification)
        deletedPaths.forEach(path => formData.append('deleted_images[]', path));

        // Spoof PUT si nécessaire
        if (method === 'PUT') {
            formData.append('_method', 'PUT');
        }

        fetch(action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(r => {
            if (!r.ok) throw new Error('Erreur serveur');
            return r.json();
        })
        .then(data => {
            alert(data.message || 'Produit enregistré avec succès !');
            if (!form.dataset.productId) {
                form.reset();
                uploadedImages.innerHTML = '';
                selectedFiles = [];
            } else {
                location.reload(); // recharge pour voir les nouvelles images
            }
        })
        .catch(err => {
            console.error(err);
            alert('Erreur : ' + err.message);
        });
    });

    
        // ==================== GESTION DES SOUS-CATÉGORIES ====================
    const subCategories = {
        'Électronique': ['Smartphones et montres connectées', 'Ordinateurs portables', 'Ordinateurs gaming', 'Tablettes', 'Casques et écouteurs', 'Télévisions et home cinéma', 'Appareils photo et caméras', 'Accessoires', 'Consoles de jeux et manette', 'Composants informatiques'],
        'Vêtements': ['T-shirts et polos', 'Chemises', 'Pantalons', 'Robes et jupes', 'Vestes et manteaux', 'Pulls et sweats', 'Sous-vêtements et lingerie', 'Tenues de sport', 'Chaussures', 'Accessoires vestimentaires'],
        'Électroménager': ['Réfrigérateurs et congélateurs', 'Machines à laver et sèche-linge', 'Fours et cuisinières', 'Micro-ondes', 'Mixeurs et robots de cuisine', 'Bouilloires et cafetières', 'Aspirateurs', 'Ventilateurs et climatiseurs', 'Fers à repasser', 'Petits appareils de soin'],
        'Meubles': ['Canapés et fauteuils', 'Tables', 'Chaises et tabourets', 'Lits et cadres de lit', 'Armoires et penderies', 'Commodes et rangements', 'Bureaux et étagères', 'Meubles TV', 'Mobilier d’extérieur', 'Décoration intérieure'],
        'Bijoux': ['Bagues', 'Colliers', 'Bracelets', 'Boucles d’oreilles', 'Montres', 'Bijoux pour hommes', 'Bijoux de mariage et fiançailles'],
        'Cosmétiques': ['Maquillage', 'Soins du visage', 'Soins du corps', 'Parfums et eaux de toilette', 'Produits capillaires', 'Produits pour hommes', 'Coffrets cadeaux beauté']
    };

    const categorySelect    = document.getElementById('category');
    const subCategorySelect = document.getElementById('subCategory');

    // Fonction pour remplir les sous-catégories
    function fillSubCategories(selectedCategory) {
        // Vide d'abord
        subCategorySelect.innerHTML = '<option value="">Choisir une sous-catégorie</option>';

        if (!selectedCategory || !subCategories[selectedCategory]) return;

        subCategories[selectedCategory].forEach(sub => {
            const opt = document.createElement('option');
            opt.value = sub;
            opt.textContent = sub;
            subCategorySelect.appendChild(opt);
        });
    }

    // Quand on change de catégorie
    categorySelect.addEventListener('change', function () {
        fillSubCategories(this.value);
    });

    // === CHARGEMENT INITIAL EN MODE MODIFICATION ===
    // On récupère les valeurs depuis les data-attributs du formulaire
    const savedCategory    = form.dataset.savedCategory;
    const savedSubCategory = form.dataset.savedSubcategory;

    if (savedCategory && subCategories[savedCategory]) {
        // 1. On remet la bonne catégorie
        categorySelect.value = savedCategory;

        // 2. On remplit les sous-catégories correspondantes
        fillSubCategories(savedCategory);

        // 3. On pré-sélectionne la sous-catégorie sauvegardée
        if (savedSubCategory) {
            subCategorySelect.value = savedSubCategory;
        }
    }
    //suppression d'un produit
    document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', function () {
        const productId = this.dataset.id;

        // Confirmation stylisée (tu peux remplacer par un modal plus beau plus tard)
        if (!confirm('Êtes-vous sûr de vouloir supprimer ce produit ?\nCette action est irréversible !')) {
            return;
        }

        fetch(`/products/${productId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => { throw err; });
            }
            return response.json();
        })
        .then(data => {
            alert(data.message || 'Produit supprimé avec succès !');

            // Supprime la carte du DOM sans recharger la page
            this.closest('.product-cart').remove();

            // Optionnel : mettre à jour le compteur de résultats
            const resultCount = document.querySelector('.result-active-filters');
            if (resultCount) {
                let count = parseInt(resultCount.textContent.match(/\d+/)[0]);
                resultCount.innerHTML = `${count - 1} <span class="fonce">Résultats</span>`;
            }
        })
        .catch(err => {
            console.error(err);
            alert(err.message || 'Erreur lors de la suppression');
        });
    });
});
});