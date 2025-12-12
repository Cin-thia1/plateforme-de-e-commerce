<?php
/**
 * Template Name: Page Inscription
 * 
 * → Si déjà connecté → redirection vers /profile
 * → Inscription réussie → redirection vers /login
 */



// 1. Si l'utilisateur est déjà connecté → on le redirige vers son profil
if ( is_user_logged_in() ) {
    wp_redirect( site_url('/profile') );
    exit;
}

// 2. Traitement du formulaire d'inscription
$error_message   = '';
$success_message = '';

if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['signup_submit'] ) ) {

    $fullname = sanitize_text_field( $_POST['fullname'] ?? '' );
    $email    = sanitize_email( $_POST['email'] ?? '' );
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm_password'] ?? '';

    // Validation
    if ( empty( $fullname ) || empty( $email ) || empty( $password ) || empty( $confirm ) ) {
        $error_message = 'Tous les champs sont obligatoires.';
    } elseif ( ! is_email( $email ) ) {
        $error_message = 'L’adresse email n’est pas valide.';
    } elseif ( email_exists( $email ) ) {
        $error_message = 'Cet email est déjà utilisé par un autre compte.';
    } elseif ( strlen( $password ) < 6 ) {
        $error_message = 'Le mot de passe doit contenir au moins 6 caractères.';
    } elseif ( $password !== $confirm ) {
        $error_message = 'Les deux mots de passe ne correspondent pas.';
    } else {

        // Création de l'utilisateur
        $user_id = wp_create_user( $email, $password, $email );

        if ( is_wp_error( $user_id ) ) {
            $error_message = 'Erreur lors de la création du compte. Veuillez réessayer.';
        } else {

            // Mise à jour du nom complet
            wp_update_user( array(
                'ID'           => $user_id,
                'display_name' => $fullname,
                'first_name'   => explode( ' ', $fullname )[0] ?? '',
                'last_name'    => explode( ' ', $fullname, 2 )[1] ?? '',
                'nickname'     => $fullname,
            ) );

            // Attribution du rôle "customer" (client WooCommerce)
            $user = new WP_User( $user_id );
            $user->set_role( 'customer' );

            // Optionnel : envoi de l'email de bienvenue WooCommerce
            WC()->mailer()->customer_new_account( $user_id );

            // Redirection immédiate vers la page de connexion
            wp_redirect( site_url('/login') );
            exit;
        }
    }
}
get_header();
?>

<main class="form-container">
    <form method="POST" action="" class="signup-form">
        <h2>Créer un compte</h2>

        <?php if ( ! empty( $error_message ) ) : ?>
            <div class="error-message" style="background:#ffebee; color:#c62828; padding:12px 15px; border-radius:6px; margin:15px 0; font-size:14px;">
                <?php echo esc_html( $error_message ); ?>
            </div>
        <?php endif; ?>

        <p style="color:#666; margin-bottom:25px; font-size:15px;">
            Rejoignez-nous et profitez d’une expérience d’achat rapide et personnalisée.
        </p>

        <div class="form-group">
            <label for="fullname">Nom complet</label>
            <div class="input-wrapper">
                <input type="text" 
                       name="fullname" 
                       id="fullname" 
                       placeholder="Jean Dupont" 
                       value="<?php echo isset($_POST['fullname']) ? esc_attr($_POST['fullname']) : ''; ?>" 
                       required>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Adresse email</label>
            <div class="input-wrapper">
                <input type="email" 
                       name="email" 
                       id="email" 
                       placeholder="jean.dupont@email.com" 
                       value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>" 
                       required>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <div class="input-wrapper">
                <input type="password" name="password" id="password" required minlength="6">
            </div>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirmer le mot de passe</label>
            <div class="input-wrapper">
                <input type="password" name="confirm_password" id="confirm_password" required>
            </div>
        </div>

        <button type="submit" name="signup_submit" class="btn-submit">
            <span>CRÉER MON COMPTE</span>
            <i class="fas fa-arrow-right"></i>
        </button>

        <hr class="separator" style="margin:35px 0; border:none; border-top:1px solid #eee;">

        <p style="text-align:center; color:#555; font-size:15px;">
            Déjà inscrit ? 
            <a href="<?php echo site_url('/login'); ?>" class="link-sign" style="font-weight:600;">
                Se connecter
            </a>
        </p>
    </form>
</main>

<?php get_footer(); ?>