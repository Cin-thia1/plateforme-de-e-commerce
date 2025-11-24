<?php
/**
 * Template Name: Page login
 */

// Si l'utilisateur est déjà connecté → on le vire vers son compte
if (is_user_logged_in()) {
  wp_redirect(site_url('/my-account'));
  exit;
}

get_header();

// Traitement du formulaire
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $creds = array(
        'user_login'    => sanitize_text_field($_POST['email']),
        'user_password' => sanitize_text_field($_POST['password']),
        'remember'      => true,
    );

    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {
        $error = 'Email ou mot de passe incorrect.';
    } else {
        wp_redirect(site_url('/mon-compte'));
        exit;
    }
}
?>

<main class="form-container">
    <form method="POST" action="">
        <h2>Se connecter</h2>

        <?php if (!empty($error)) : ?>
            <p style="color:red;"><?= $error ?></p>
        <?php endif; ?>

        <p>Entrez votre adresse email et votre mot de passe pour vous connecter.</p>

        <div class="form-group">
            <label for="email">Adresse email</label>
            <div class="input-wrapper">
                <input type="email" id="email" name="email" placeholder="exemple@texte.domaine" required>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <div class="input-wrapper">
                <input type="password" id="password" name="password" required>
            </div>
        </div>

        <button type="submit" class="btn-submit">
            <span>CONNEXION</span>
            <i class="fas fa-arrow-right"></i>
        </button>

        <p style="margin-top:20px;">
            <a href="<?php echo wp_lostpassword_url(); ?>" class="link-sign">Mot de passe oublié ?</a>
        </p>

        <hr class="separator">

        <p>
            Pas de compte ?
            <a href="<?php echo site_url('/signup'); ?>" class="link-sign">S'inscrire</a>
        </p>
    </form>
</main>

<?php get_footer(); ?>