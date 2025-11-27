<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ et Support Client</title>
  <link rel="stylesheet" href="<?php echo e(asset('css/faq.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/header-footer.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome/css/all.min.css')); ?>">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <!--header-->
  <?php echo $__env->make('shared.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <div class="main-wrapper">

    <div class="content-wrapper">

      <section class="faq-section">
        <h1 class="faq-title">Frequently Asked Questions</h1>
        <div class="faq-list">

          <details class="faq-item">
            <summary>Quels sont les délais de livraison standard ?</summary>
            <div class="faq-content">
              <p>Nos délais de livraison standard sont généralement de <strong>3 à 5 jours ouvrables</strong> après
                l'expédition de votre commande. Vous recevrez un e-mail de confirmation d'expédition avec un numéro de
                suivi dès que votre colis quittera notre entrepôt.</p>
            </div>
          </details>

          <details class="faq-item" open>
            <summary>Quelles sont vos options et les coûts de livraison ?</summary>
            <div class="faq-content">
              <p>Nous proposons plusieurs options :</p>
              <ul>
                <li><strong>Livraison Standard (3-5 jours ouvrables) :</strong> 3500 fcfa ou <strong>Gratuite</strong>
                  pour toute commande supérieure à 3000 fcfa.</li>
                <li><strong>Livraison Express (24-48h) :</strong> 6500 fcfa.</li>
                <li><strong>Retrait en point relais :</strong> 2000 fcfa.</li>
              </ul>
              <p>Veuillez consulter notre page de livraison pour plus de détails.</p>
            </div>
          </details>

          <details class="faq-item">
            <summary>Comment puis-je retourner un article ?</summary>
            <div class="faq-content">
              <p>Vous disposez de <strong>14 jours</strong> à compter de la réception de votre commande pour effectuer
                un retour. L'article doit être dans son état d'origine, avec étiquettes.</p>
            </div>
          </details>

          <details class="faq-item">
            <summary>Quels modes de paiement acceptez-vous ?</summary>
            <div class="faq-content">
              <p>Nous acceptons les cartes de crédit/débit (Visa, MasterCard, American Express), Orange money, Mobile
                money et le paiement par virement bancaire.</p>
            </div>
          </details>

          <details class="faq-item">
            <summary>Mon article est endommagé, que dois-je faire ?</summary>
            <div class="faq-content">
              <p>Veuillez contacter notre service support immédiatement en utilisant le formulaire ci-contre. Joignez
                des photos de l'article endommagé ainsi que votre numéro de commande.</p>
            </div>
          </details>

        </div>
      </section>

      <section class="support-section">
        <div class="support-box">
          <h2>Vous ne touvex pas de réponses, Demander de l'aide.</h2>
          <p class="intro-support">
            Nous savons que les questions peuvent survenir. N'hésitez pas à nous contacter pour toute demande concernant
            votre commande, un produit, ou pour signaler un problème. <strong>Nous vous recontacterons très
              rapidement.</strong>
          </p>

          <form action="#" method="post" class="support-form">
            <div class="form-group">
              <label for="email" class="sr-only">Adresse email</label>
              <input type="email" id="email" name="email" required placeholder="Adresse email">
            </div>

            <div class="form-group">
              <label for="subject" class="sr-only">Objet</label>
              <input type="text" id="subject" name="subject" required placeholder="Objet">
            </div>

            <div class="form-group">
              <label for="message" class="sr-only">Message</label>
              <textarea id="message" name="message" rows="4" placeholder="Message (Optionnel)"></textarea>
            </div>

            <button type="submit" class="submit-button">ENVOVER →</button>
          </form>
        </div>
      </section>

    </div>
  </div>

  <!-- footer-->
  <?php echo $__env->make('shared.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>

</html><?php /**PATH D:\PROGRAMMATION WEB 4\plateforme-de-e-commerce\resources\views/faq.blade.php ENDPATH**/ ?>