<?php
/**
 * Template Name: Page Connexion
 * 
 * → Si déjà connecté → redirection immédiate vers /profile
 * → Connexion réussie → redirection vers /profile
 */

 // TOUT CE BLOC DOIT ÊTRE AVANT get_header() !!!
if ( is_user_logged_in() ) {
    wp_redirect( site_url('/profile') );
    exit;
}

// Traitement du formulaire (aussi avant tout affichage)
$error_message = '';

if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['login_submit'] ) ) {

    if ( empty( $_POST['email'] ) || empty( $_POST['password'] ) ) {
        $error_message = 'Veuillez remplir tous les champs.';
    } else {
        $email    = sanitize_email( $_POST['email'] );
        $password = $_POST['password'];
        $remember = isset( $_POST['rememberme'] );

        $creds = array(
            'user_login'    => $email,
            'user_password' => $password,
            'remember'      => $remember
        );

        $user = wp_signon( $creds, false );

        if ( is_wp_error( $user ) ) {
            $error_message = 'Adresse email ou mot de passe incorrect.';
        } else {
            // Connexion réussie → on force le cookie WooCommerce
            wc_set_customer_auth_cookie( $user->ID );

            // Redirection SANS AUCUN HTML avant
            wp_redirect( site_url('/profile') );
            exit;
        }
    }
}

// Maintenant on peut charger le header (seulement si pas de redirection)
get_header();
?>

<main class="form-container">
    <form method="POST" action="" class="login-form">
        <h2>Se connecter</h2>

        <?php if ( ! empty( $error_message ) ) : ?>
            <div class="error-message" style="background:#ffebee; color:#c62828; padding:12px 15px; border-radius:6px; margin:15px 0;">
                <?php echo esc_html( $error_message ); ?>
            </div>
        <?php endif; ?>

        <p style="color:#666; margin-bottom:25px;">
            Connectez-vous pour accéder à votre espace client.
        </p>

        <div class="form-group">
            <label for="email">Adresse email</label>
            <div class="input-wrapper">
                <input type="email" 
                       id="email" 
                       name="email" 
                       placeholder="votre@email.com" 
                       value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>" 
                       required>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <div class="input-wrapper">
                <input type="password" id="password" name="password" required autocomplete="current-password">
            </div>
        </div>

        <div class="form-options" style="display:flex; justify-content:space-between; align-items:center; margin:18px 0;">
            <label style="cursor:pointer; font-size:14px;">
                <input type="checkbox" name="rememberme" style="margin-right:8px;">
                Rester connecté
            </label>
            <a href="<?php echo wp_lostpassword_url(); ?>" class="link-sign">Mot de passe oublié ?</a>
        </div>

        <button type="submit" name="login_submit" class="btn-submit">
            <span>CONNEXION</span>
            <i class="fas fa-arrow-right"></i>
        </button>

        <hr class="separator" style="margin:35px 0; border:none; border-top:1px solid #eee;">

        <p style="text-align:center; color:#555;">
            Pas encore de compte ? 
            <a href="<?php echo site_url('/signup'); ?>" class="link-sign" style="font-weight:600;">
                Créer un compte
            </a>
        </p>
    </form>
</main>

<?php get_footer(); ?>