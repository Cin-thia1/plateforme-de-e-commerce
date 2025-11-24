<?php
/**
 * Template Name: Page signup
 */

 // Déjà connecté ? direction mon-compte
if (is_user_logged_in()) {
  wp_redirect(site_url('/my-account'));
  exit;
}

get_header();



$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fullname = sanitize_text_field($_POST['fullname']);
    $email    = sanitize_email($_POST['email']);
    $password = sanitize_text_field($_POST['password']);
    $confirm  = sanitize_text_field($_POST['confirm_password']);

    if (empty($fullname) || empty($email) || empty($password)) {
        $error = "Tous les champs sont obligatoires.";
    } elseif (!is_email($email)) {
        $error = "L'adresse email est invalide.";
    } elseif (email_exists($email)) {
        $error = "Un compte utilise déjà cet email.";
    } elseif ($password !== $confirm) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {

        // création utilisateur
        $user_id = wp_create_user($email, $password, $email);

        if (is_wp_error($user_id)) {
            $error = "Impossible de créer le compte.";
        } else {

            // Ajout du nom complet dans usermeta
            wp_update_user([
                'ID' => $user_id,
                'display_name' => $fullname,
                'nickname' => $fullname
            ]);

            $success = "Votre compte a été créé. Vous pouvez maintenant vous connecter.";
        }
    }
}
?>

<main class="form-container">
    <form method="POST" action="">
        <h2>S'inscrire</h2>

        <?php if ($error): ?>
            <p style="color:red;"><?= $error ?></p>
        <?php endif; ?>

        <?php if ($success): ?>
            <p style="color:green;"><?= $success ?></p>
        <?php endif; ?>

        <p>Entrez vos informations pour créer un compte.</p>

        <div class="form-group">
            <label for="fullname">Nom et prénom</label>
            <div class="input-wrapper">
                <input type="text" name="fullname" id="fullname" placeholder="Arthur Simo" required>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Adresse email</label>
            <div class="input-wrapper">
                <input type="email" name="email" id="email" placeholder="exemple@texte.domaine" required>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <div class="input-wrapper">
                <input type="password" name="password" id="password" required>
            </div>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirmer le mot de passe</label>
            <div class="input-wrapper">
                <input type="password" name="confirm_password" id="confirm_password" required>
            </div>
        </div>

        <button type="submit" class="btn-submit">
            <span>INSCRIPTION</span>
            <i class="fas fa-arrow-right"></i>
        </button>

        <hr class="separator">

        <p>
            Vous avez déjà un compte ?
            <a href="<?php echo site_url('/login'); ?>" class="link-sign">Connectez-vous</a>
        </p>
    </form>
</main>

<?php get_footer(); ?>
