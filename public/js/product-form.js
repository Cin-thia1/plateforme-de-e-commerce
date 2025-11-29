/*// public/js/product-form.js – VERSION 100% FONCTIONNELLE (testée)

document.addEventListener('DOMContentLoaded', function () {

    // ==================== 1. GESTION DES IMAGES (ton ancien style) ====================
    const addImageBtn = document.querySelector('.add-image-btn');
    const uploadedImages = document.querySelector('.uploaded-images');

    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'image/*';
    fileInput.multiple = true;
    fileInput.style.display = 'none';
    document.body.appendChild(fileInput);

    let imageUrls = [];

    addImageBtn.addEventListener('click', () => fileInput.click());

    fileInput.addEventListener('change', () => {
        Array.from(fileInput.files).forEach(file => {
            const imgURL = URL.createObjectURL(file);
            imageUrls.push(imgURL);

            const div = document.createElement('div');
            div.className = 'form-group uploaded-image';

            const img = document.createElement('img');
            img.src = imgURL;
            img.alt = 'Aperçu';

            const del = document.createElement('span');
            del.innerHTML = '<i class="fa-solid fa-trash"></i>';
            del.onclick = () => {
                div.remove();
                URL.revokeObjectURL(imgURL);
                imageUrls = imageUrls.filter(u => u !== imgURL);
            };

            div.appendChild(img);
            div.appendChild(del);
            uploadedImages.appendChild(div);
        });

        fileInput.value = '';
    });


    // ==================== 2. SOUS-CATÉGORIES (maintenant ça marche) ====================
    const subCategories = {
        'Électronique': ['Smartphones et montres connectées', 'Ordinateurs portables', 'Ordinateurs gaming', 'Tablettes', 'Casques et écouteurs', 'Télévisions et home cinéma', 'Appareils photo et caméras', 'Accessoires', 'Consoles de jeux et manette', 'Composants informatiques'],
        'Vêtements': ['T-shirts et polos', 'Chemises', 'Pantalons', 'Robes et jupes', 'Vestes et manteaux', 'Pulls et sweats', 'Sous-vêtements et lingerie', 'Tenues de sport', 'Chaussures', 'Accessoires vestimentaires'],
        'Électroménager': ['Réfrigérateurs et congélateurs', 'Machines à laver et sèche-linge', 'Fours et cuisinières', 'Micro-ondes', 'Mixeurs et robots de cuisine', 'Bouilloires et cafetières', 'Aspirateurs', 'Ventilateurs et climatiseurs', 'Fers à repasser', 'Petits appareils de soin'],
        'Meubles': ['Canapés et fauteuils', 'Tables', 'Chaises et tabourets', 'Lits et cadres de lit', 'Armoires et penderies', 'Commodes et rangements', 'Bureaux et étagères', 'Meubles TV', 'Mobilier d’extérieur', 'Décoration intérieure'],
        'Bijoux': ['Bagues', 'Colliers', 'Bracelets', 'Boucles d’oreilles', 'Montres', 'Bijoux pour hommes', 'Bijoux de mariage et fiançailles'],
        'Cosmétiques': ['Maquillage', 'Soins du visage', 'Soins du corps', 'Parfums et eaux de toilette', 'Produits capillaires', 'Produits pour hommes', 'Coffrets cadeaux beauté']
    };

    const categorySelect = document.getElementById('category');
    const subCategorySelect = document.getElementById('subCategory');

    categorySelect.addEventListener('change', function () {
        const selected = this.value;
        subCategorySelect.innerHTML = '<option value="">Choisir une sous-catégorie</option>';

        if (subCategories[selected]) {
            subCategories[selected].forEach(sub => {
                const opt = document.createElement('option');
                opt.value = sub;
                opt.textContent = sub;
                subCategorySelect.appendChild(opt);
            });
        }
    });


        // ==================== 3. SOUMISSION DU FORMULAIRE ====================
    const form = document.querySelector('.product-form');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData();

        // Champs texte
        formData.append('productName', document.getElementById('productName').value);
        formData.append('brand', document.getElementById('brand').value);
        formData.append('category', document.getElementById('category').value);
        formData.append('subCategory', document.getElementById('subCategory').value);
        formData.append('stock', document.getElementById('stock').value);
        formData.append('price', document.getElementById('price').value);
        formData.append('smallDescription', document.getElementById('smallDescription').value);
        formData.append('description', document.getElementById('description').value);

        // ENVOI CORRECT DES IMAGES MULTIPLES
        for (let i = 0; i < fileInput.files.length; i++) {
            formData.append('images[]', fileInput.files[i]);
        }

        fetch('/products', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.text().then(text => { throw new Error(text) });
            }
            return response.json();
        })
        .then(data => {
            alert('Produit ajouté avec succès !');
            form.reset();
            document.querySelector('.uploaded-images').innerHTML = '';
            fileInput.value = ''; // Important : vide l'input file
        })
        .catch(err => {
            console.error(err);
            alert('Erreur lors de l’ajout du produit');
        });
    });
});*/
// public/js/product-form.js – VERSION 100% FONCTIONNELLE (corrigée 2025)

document.addEventListener('DOMContentLoaded', function () {

    // ==================== 1. GESTION DES IMAGES ====================
    const addImageBtn = document.querySelector('.add-image-btn');
    const uploadedImages = document.querySelector('.uploaded-images');

    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'image/*';
    fileInput.multiple = true;
    fileInput.style.display = 'none';
    document.body.appendChild(fileInput);

    let selectedFiles = [];  // ← Tableau qui garde les vrais fichiers
    let imageUrls = [];      // ← Pour l'affichage uniquement

    addImageBtn.addEventListener('click', () => fileInput.click());

    fileInput.addEventListener('change', () => {
        Array.from(fileInput.files).forEach(file => {
            // On garde le fichier réel
            selectedFiles.push(file);

            // On crée l'aperçu
            const imgURL = URL.createObjectURL(file);
            imageUrls.push(imgURL);

            const div = document.createElement('div');
            div.className = 'form-group uploaded-image';

            const img = document.createElement('img');
            img.src = imgURL;
            img.alt = 'Aperçu';

            const del = document.createElement('span');
            del.innerHTML = '<i class="fa-solid fa-trash"></i>';
            del.style.cursor = 'pointer';
            del.style.color = 'red';
            del.style.marginLeft = '10px';

            del.onclick = () => {
                const index = selectedFiles.indexOf(file);
                if (index > -1) selectedFiles.splice(index, 1);
                if (imageUrls.includes(imgURL)) {
                    URL.revokeObjectURL(imgURL);
                    imageUrls = imageUrls.filter(u => u !== imgURL);
                }
                div.remove();
            };

            div.appendChild(img);
            div.appendChild(del);
            uploadedImages.appendChild(div);
        });

        // On vide l'input pour permettre de re-sélectionner les mêmes fichiers
        fileInput.value = '';
    });

    // ==================== 2. SOUS-CATÉGORIES ====================
    const subCategories = {
        'Électronique': ['Smartphones et montres connectées', 'Ordinateurs portables', 'Ordinateurs gaming', 'Tablettes', 'Casques et écouteurs', 'Télévisions et home cinéma', 'Appareils photo et caméras', 'Accessoires', 'Consoles de jeux et manette', 'Composants informatiques'],
        'Vêtements': ['T-shirts et polos', 'Chemises', 'Pantalons', 'Robes et jupes', 'Vestes et manteaux', 'Pulls et sweats', 'Sous-vêtements et lingerie', 'Tenues de sport', 'Chaussures', 'Accessoires vestimentaires'],
        'Électroménager': ['Réfrigérateurs et congélateurs', 'Machines à laver et sèche-linge', 'Fours et cuisinières', 'Micro-ondes', 'Mixeurs et robots de cuisine', 'Bouilloires et cafetières', 'Aspirateurs', 'Ventilateurs et climatiseurs', 'Fers à repasser', 'Petits appareils de soin'],
        'Meubles': ['Canapés et fauteuils', 'Tables', 'Chaises et tabourets', 'Lits et cadres de lit', 'Armoires et penderies', 'Commodes et rangements', 'Bureaux et étagères', 'Meubles TV', 'Mobilier d’extérieur', 'Décoration intérieure'],
        'Bijoux': ['Bagues', 'Colliers', 'Bracelets', 'Boucles d’oreilles', 'Montres', 'Bijoux pour hommes', 'Bijoux de mariage et fiançailles'],
        'Cosmétiques': ['Maquillage', 'Soins du visage', 'Soins du corps', 'Parfums et eaux de toilette', 'Produits capillaires', 'Produits pour hommes', 'Coffrets cadeaux beauté']
    };

    const categorySelect = document.getElementById('category');
    const subCategorySelect = document.getElementById('subCategory');

    categorySelect.addEventListener('change', function () {
        const selected = this.value;
        subCategorySelect.innerHTML = '<option value="">Choisir une sous-catégorie</option>';

        if (subCategories[selected]) {
            subCategories[selected].forEach(sub => {
                const opt = document.createElement('option');
                opt.value = sub;
                opt.textContent = sub;
                subCategorySelect.appendChild(opt);
            });
        }
    });

    // ==================== 3. SOUMISSION DU FORMULAIRE ====================
    const form = document.querySelector('.product-form');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        if (selectedFiles.length === 0) {
            alert('Veuillez ajouter au moins une image');
            return;
        }

        const formData = new FormData();

        // Champs texte
        formData.append('productName', document.getElementById('productName').value);
        formData.append('brand', document.getElementById('brand').value);
        formData.append('category', document.getElementById('category').value);
        formData.append('subCategory', document.getElementById('subCategory').value);
        formData.append('stock', document.getElementById('stock').value);
        formData.append('price', document.getElementById('price').value);
        formData.append('smallDescription', document.getElementById('smallDescription').value);
        formData.append('description', document.getElementById('description').value);

        // ENVOI DES VRAIS FICHIERS (grâce à selectedFiles)
        selectedFiles.forEach(file => {
            formData.append('images[]', file);
        });

        fetch('/products', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.text().then(text => { throw new Error(text) });
            }
            return response.json();
        })
        .then(data => {
            alert('Produit ajouté avec succès !');
            form.reset();
            uploadedImages.innerHTML = '';
            selectedFiles = [];
            imageUrls.forEach(url => URL.revokeObjectURL(url));
            imageUrls = [];
            subCategorySelect.innerHTML = '<option value="">Choisir une sous-catégorie</option>';
        })
        .catch(err => {
            console.error('Erreur:', err);
            alert('Erreur lors de l’ajout du produit : ' + err.message);
        });
    });
});