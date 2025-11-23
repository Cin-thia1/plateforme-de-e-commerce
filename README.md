# 🛍️ TP1 – Site Web Statique E-commerce

## 📌 Vue d'ensemble du Projet

**Objectif Principal :** Construire un site vitrine e-commerce complet en **HTML & CSS pur**, sans dépendances externes.

**Type :** Projet académique - Travail collectif en équipe  


---

## 👥 Équipe du Projet

### Membres et Responsabilités

| # | Nom Complet | Email | 
|---|-------------|-------|
| 1 | **Tsomo Tsague Audrey Cinthia** | cinthiatsomo37@gmail.com | 
| 2 | **Ndeffeu Tamla Valentin Arthur** | ndeffeuarthur74@gmail.com | 
| 3 | **Evrad Yan Meli Nsonwa** | evradyanmeli@gmail.com | 
| 4 | **Magnye simo Cabrelle** | simomaniche27@gmail.com | 
| 5 | **MAFOMA NTSACKO MARLYSE** | marlysemafoma0@gmail.com | 
| 6 | **Yackson Pascal Harlem Dave** | pascaldave57@gmail.com | 
| 7 | **MENOME FOKOU Léandre Loïc** | menomeloic2013@gmail.com | 
| 8 | **MBOUA MBOUA II joseph Aimé** | josephaimemboua@gmail.com | 
| 9 | **Saka Ngnith aurel Wilson** | wilsonsaka110@gmail.com | 

---

## 📁 Structure du Projet

```
projet-ecommerce-tp1/
│
├── index.html              # Page d'accueil (ACCUEIL)
├── produits.html           # Catalogue produits (PRODUITS)
├── contact.html            # Formulaire de contact (CONTACT)
├── apropos.html            # À propos de l'entreprise (À PROPOS)
│
├── assets/
│   ├── css/
│   │   ├── style.css       # Styles principaux (toutes les pages)
│   │   ├── header-footer.css
│   │   ├── produits.css    # Styles spécifiques produits
│   │   ├── formulaire.css  # Styles formulaires
│   │   └── responsive.css  # Media queries (mobile/tablet/desktop)
│   │
│   ├── images/
│   │   ├── logo.png        # Logo du site
│   │   ├── banner/         # Bandeaux publicitaires
│   │   ├── produits/       # Photos produits
│   │   ├── icons/          # Icônes (panier, loupe, etc.)
│   │   └── equipe/         # Photos équipe
│   │
│   └── fonts/
│       ├── roboto.woff2    # Polices personnalisées
│       └── poppins.woff2
│
├── README.md               # Ce fichier
└── CONTRIBUTEURS.md        # Détail contributions

```

---

## 📄 Pages à Développer

### 1️⃣ Page Accueil (`index.html`)

**Responsable :** Tsomo Tsague Audrey Cinthia + Ndeffeu Tamla Valentin Arthur

**Sections obligatoires :**
- Header avec logo + navigation
- Banneau héro (titre accrocheur + CTA bouton)
- Section "Catégories en vedette" (4-6 catégories)
- Section "Produits populaires" (grille 4 colonnes)
- Newsletter inscription
- Footer avec liens

**Dimensions banneau :** 1920px × 600px

---

### 2️⃣ Page Produits (`produits.html`)

**Responsable :** Ndeffeu Tamla Valentin Arthur + Evrad Yan Meli Nsonwa

**Sections obligatoires :**
- Barre de filtrage (catégorie, prix)
- Grille produits responsive (4 col desktop, 2 col tablet, 1 col mobile)
- Pagination (12 produits par page)
- Chaque produit affiche :
  - Image
  - Nom
  - Prix
  - Note (⭐⭐⭐⭐⭐)
  - Bouton "Ajouter au panier"
  - Badge "En promotion" si applicable

**Produits à lister :** Minimum 24 (données fictives acceptées)

---

### 3️⃣ Page Contact (`contact.html`)

**Responsable :** Magnye simo Cabrelle + Yackson Pascal Harlem Dave

**Sections obligatoires :**
- Titre + description
- **Formulaire de contact :**
  - Champs : Nom, Email, Sujet, Message
  - Validation HTML5
  - Bouton Envoyer (avec CSS hover)
- Informations de contact (téléphone, adresse, horaires)
- Carte intégrée (Google Maps ou image statique)
- Réseaux sociaux (Facebook, Instagram, Twitter)

**Validation :** Email format, champs obligatoires

---

### 4️⃣ Page À Propos (`apropos.html`)

**Responsable :** MAFOMA NTSACKO MARLYSE + MENOME FOKOU Léandre Loïc

**Sections obligatoires :**
- **Histoire de l'entreprise** (1-2 paragraphes)
- **Mission/Vision** (sections dédiées)
- **Notre équipe** (cartes 3+ personnes avec photo + nom + poste)
- **Chiffres clés** (nombre clients, années d'expérience, etc.)
- **Valeurs** (3-4 cartes : qualité, service, innovation, durabilité)
- **Engagement écologique** (optionnel mais apprécié)

---

