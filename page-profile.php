<?php
/**
 * Template Name: Page Profil
 * Accessible uniquement aux utilisateurs connectés
 */

// Si pas connecté → on le renvoie vers la page de connexion
if (!is_user_logged_in()) {
  wp_redirect(site_url('/login'));
  exit;
}

$current_user = wp_get_current_user();

// Traitement des formulaires (doit être avant get_header() pour éviter les erreurs de headers)
$message = '';

// === Mise à jour des infos personnelles ===
if (isset($_POST['save_profile'])) {
  $first_name = sanitize_text_field($_POST['first_name']);
  $last_name = sanitize_text_field($_POST['last_name']);
  $email = sanitize_email($_POST['email']);
  $phone = sanitize_text_field($_POST['phone']);
  $birth_date = sanitize_text_field($_POST['birth_date']);
  $sex = sanitize_text_field($_POST['sex']);

  // Mise à jour des infos utilisateur
  wp_update_user(array(
    'ID' => $current_user->ID,
    'user_email' => $email,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'display_name' => $first_name . ' ' . $last_name,
  ));

  // Métadonnées supplémentaires
  update_user_meta($current_user->ID, 'billing_phone', $phone);
  update_user_meta($current_user->ID, 'birth_date', $birth_date);
  update_user_meta($current_user->ID, 'sex', $sex);

  $message = '<div style="color:green; padding:12px; background:#e6f7e6; border-radius:6px; margin:15px 0;">Informations mises à jour avec succès !</div>';
}

// === Mise à jour adresse de facturation ===
if (isset($_POST['save_address'])) {
  update_user_meta($current_user->ID, 'billing_address_1', sanitize_text_field($_POST['address']));
  update_user_meta($current_user->ID, 'billing_city', sanitize_text_field($_POST['city']));
  update_user_meta($current_user->ID, 'billing_state', sanitize_text_field($_POST['state']));
  update_user_meta($current_user->ID, 'billing_postcode', sanitize_text_field($_POST['zip']));

  $message = '<div style="color:green; padding:12px; background:#e6f7e6; border-radius:6px; margin:15px 0;">Adresse mise à jour !</div>';
}

// === Changement de mot de passe ===
if (isset($_POST['change_password'])) {
  $current = $_POST['current_password'];
  $new = $_POST['new_password'];
  $confirm = $_POST['confirm_password'];

  if (!wp_check_password($current, $current_user->user_pass, $current_user->ID)) {
    $message = '<div style="color:red; padding:12px; background:#ffebee; border-radius:6px; margin:15px 0;">Mot de passe actuel incorrect.</div>';
  } elseif ($new !== $confirm) {
    $message = '<div style="color:red; padding:12px; background:#ffebee; border-radius:6px; margin:15px 0;">Les nouveaux mots de passe ne correspondent pas.</div>';
  } elseif (strlen($new) < 6) {
    $message = '<div style="color:red; padding:12px; background:#ffebee; border-radius:6px; margin:15px 0;">Le nouveau mot de passe doit faire au moins 6 caractères.</div>';
  } else {
    wp_set_password($new, $current_user->ID);
    wp_set_current_user($current_user->ID);
    wp_set_auth_cookie($current_user->ID);
    $message = '<div style="color:green; padding:12px; background:#e6f7e6; border-radius:6px; margin:15px 0;">Mot de passe changé avec succès !</div>';
  }
}

// === Déconnexion ===
if (isset($_GET['logout'])) {
  wp_logout();
  wp_redirect(site_url('/login'));
  exit;
}

get_header();
?>

<div class="container-profile">
  <aside>
    <ul>
      <li onclick="window.location.href='<?php echo wc_get_page_permalink('myaccount'); ?>';" style="cursor:pointer;">
        <i class="fa-solid fa-layer-group"></i>Tableau de bord
      </li>
      <li onclick="window.location.href='<?php echo wc_get_account_endpoint_url('orders'); ?>';"
        style="cursor:pointer;">
        <i class="fa-solid fa-history"></i>Historique des commandes
      </li>
      <li onclick="window.location.href='<?php echo wc_get_cart_url(); ?>';" style="cursor:pointer;">
        <i class="fa-solid fa-shopping-cart"></i>Panier
      </li>
      <li onclick="window.location.href='<?php echo site_url('/favoris'); ?>';" style="cursor:pointer;">
        <i class="fa-solid fa-heart"></i>Favoris
      </li>
      <li class="active">
        <i class="fa-solid fa-gear"></i>Paramètres du compte
      </li>
      <li onclick="window.location.href='?logout=1';" style="cursor:pointer; color:#e74c3c;">
        <i class="fa-solid fa-right-from-bracket"></i>Déconnexion
      </li>
    </ul>
  </aside>

  <div class="main">
    <?php echo $message; ?>

    <section class="account-setting">
      <h2>PARAMÈTRES DU COMPTE</h2>
      <form method="post" class="account-details-form">
        <div class="profile-header">
          <div class="profile-picture">
            <?php echo get_avatar($current_user->ID, 120, '', 'Photo de profil', array('class' => 'rounded-full')); ?>
          </div>
          <div class="profile-fields">
            <div class="form-group">
              <label>Prénom</label>
              <input type="text" name="first_name" value="<?php echo esc_attr($current_user->first_name); ?>" required>
            </div>
            <div class="form-group">
              <label>Nom</label>
              <input type="text" name="last_name" value="<?php echo esc_attr($current_user->last_name); ?>" required>
            </div>
            <div class="form-group">
              <label>Date de naissance</label>
              <input type="date" name="birth_date"
                value="<?php echo esc_attr(get_user_meta($current_user->ID, 'birth_date', true)); ?>">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" value="<?php echo esc_attr($current_user->user_email); ?>" required>
            </div>
            <div class="form-group">
              <label>Sexe</label>
              <select name="sex">
                <option value="male" <?php selected(get_user_meta($current_user->ID, 'sex', true), 'male'); ?>>Homme
                </option>
                <option value="female" <?php selected(get_user_meta($current_user->ID, 'sex', true), 'female'); ?>>Femme
                </option>
                <option value="other" <?php selected(get_user_meta($current_user->ID, 'sex', true), 'other'); ?>>Autre
                </option>
              </select>
            </div>
            <div class="form-group">
              <label>Téléphone</label>
              <input type="tel" name="phone"
                value="<?php echo esc_attr(get_user_meta($current_user->ID, 'billing_phone', true)); ?>">
            </div>
            <button type="submit" name="save_profile" class="button primary-button">ENREGISTER LES
              MODIFICATIONS</button>
          </div>
        </div>
      </form>
    </section>

    <div class="settings-two-columns">

      <section class="billing-address">
        <h3>ADRESSE DE FACTURATION</h3>
        <form method="post" class="address-form">
          <div class="form-group">
            <label>Adresse</label>
            <input type="text" name="address"
              value="<?php echo esc_attr(get_user_meta($current_user->ID, 'billing_address_1', true)); ?>"
              placeholder="Numéro et rue">
          </div>
          <div class="form-group">
            <label>Région / État</label>
            <input type="text" name="state"
              value="<?php echo esc_attr(get_user_meta($current_user->ID, 'billing_state', true)); ?>">
          </div>
          <div class="form-row">
            <div class="form-group half-width">
              <label>Ville</label>
              <input type="text" name="city"
                value="<?php echo esc_attr(get_user_meta($current_user->ID, 'billing_city', true)); ?>">
            </div>
            <div class="form-group half-width">
              <label>Code postal</label>
              <input type="text" name="zip"
                value="<?php echo esc_attr(get_user_meta($current_user->ID, 'billing_postcode', true)); ?>">
            </div>
          </div>
          <button type="submit" name="save_address" class="button primary-button">ENREGISTER L'ADRESSE</button>
        </form>
      </section>

      <section class="change-password">
        <h3>CHANGER LE MOT DE PASSE</h3>
        <form method="post" class="password-form">
          <div class="form-group">
            <label>Mot de passe actuel</label>
            <input type="password" name="current_password" required>
          </div>
          <div class="form-group">
            <label>Nouveau mot de passe</label>
            <input type="password" name="new_password" required minlength="6">
          </div>
          <div class="form-group">
            <label>Confirmer</label>
            <input type="password" name="confirm_password" required>
          </div>
          <button type="submit" name="change_password" class="button primary-button">CHANGER LE MOT DE PASSE</button>
        </form>
      </section>
    </div>
  </div>
</div>

<?php get_footer(); ?>