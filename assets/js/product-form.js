// Sélection des éléments du DOM
const addImageBtn = document.querySelector('.add-image-btn');
const uploadedImages = document.querySelector('.uploaded-images');

// Création d'un input file caché
const fileInput = document.createElement('input');
fileInput.type = 'file';
fileInput.accept = 'image/*';
fileInput.style.display = 'none';
document.body.appendChild(fileInput);

// Événement pour ouvrir le sélecteur de fichiers lors du clic sur le bouton
addImageBtn.addEventListener('click', () => {
    fileInput.click();
});

// Événement pour gérer la sélection d'une image
fileInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
        // Création d'un aperçu de l'image
        const imgURL = URL.createObjectURL(file);

        // Création du conteneur pour l'image uploadée
        const imageDiv = document.createElement('div');
        imageDiv.classList.add('form-group');
        const img = document.createElement('img');
        img.src = imgURL;
        img.alt = 'Uploaded image';

        // Création de l'icône de suppression
        const deleteSpan = document.createElement('span');
        deleteSpan.title = 'Supprimer';
        const trashIcon = document.createElement('i');
        trashIcon.classList.add('fa-solid', 'fa-trash');
        deleteSpan.appendChild(trashIcon);

        // Ajout de l'événement de suppression
        deleteSpan.addEventListener('click', () => {
            imageDiv.remove();
            // Révoquer l'URL pour libérer la mémoire
            URL.revokeObjectURL(imgURL);
        });

        // Assemblage et ajout au DOM
        imageDiv.appendChild(img);
        imageDiv.appendChild(deleteSpan);
        uploadedImages.appendChild(imageDiv);

        // Réinitialiser l'input pour permettre de sélectionner à nouveau
        fileInput.value = '';
    }
});