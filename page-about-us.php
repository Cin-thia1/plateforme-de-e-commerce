
<?php
/**
 * Template Name: About Page
 */

get_header(); ?>



  <main class="container">
    <!-- first presentation -->
    <div class="row">
      <div class="fist-detail">
        <div>
          <span>Qui sommes nous</span>
          <h3>Etudiant ENSPY M1-GI</h3>
          <p>
            Etudiant a l'Ecole Nationale Superieure Polytechnique de Yaounde, nous sommes passionnés par la conception
            des applications,
            leur implementation et surtout par le developpement web. Nous sommes toujours pret a relever de nouveaux
            defis !
          </p>
        </div>
        <div>
          <ul>
            <li> <i class="fa-solid fa-check"></i> Deux ans d'experiences</li>
            <li> <i class="fa-solid fa-check"></i> Serieux et assiduité</li>
            <li> <i class="fa-solid fa-check"></i> 10+ projets déjà réalisés</li>
          </ul>
        </div>
      </div>
      <div class="Detail-illustration">
        <img src="<?php echo get_template_directory_uri();?>/assets/images/school.jpg" alt="">
      </div>
    </div>
    <!-- the team -->
    <div class="row">
      <div class="title-team">Notre équipe</div>
      <div class="team">

        <div class="member">
          <div class="round-image">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Ndeffeu Arthur</span>
            <span class="member-status">22P690</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Menome Loic</span>
            <span class="member-status">22P680</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Meli Yan</span>
            <span class="member-status">22P624</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Magnye Cabrelle</span>
            <span class="member-status">22P643</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Tsomo Cinthia</span>
            <span class="member-status">22P649</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Yackson Pascal</span>
            <span class="member-status">22P692</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Mafoma marlyse</span>
            <span class="member-status">22P664</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Mboua Mboua</span>
            <span class="member-status">21P473</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Noutchat Audrey</span>
            <span class="member-status">21P451</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">N'godak Salomon</span>
            <span class="member-status">20P437</span>
          </div>
        </div>

      </div>
    </div>
    <!-- troisieme ligne -->
    <!-- Contact Section -->
    <div class="row contact-row">
  <div class="contact-title">
    <span class="contact-us-link">NOUS CONTACTER</span>
    <h2>Vous ne trouvez pas de réponses, Contacter nous !</h2>
  </div>
  <div class="contact-cards">

    <!-- CARD TÉLÉPHONE -->
    <div class="contact-card">
      <div class="icon phone-icon"><i class="fa-solid fa-phone"></i></div>
      <div class="contact-info">
        <h4>Appeler maintenant</h4>
        <p>Nous sommes disponible en ligne de 08:00 a 17:00 (GMT+1). Discutez avec nous sans plus tarder.</p>
        <p class="phone">+237 - 655 884 341</p>
        
        <!-- Bouton qui appelle directement au clic (mobile + desktop) -->
        <button class="call-btn" onclick="window.location.href='tel:+237655884341'">
          APPELER MAINTENANT <i class="fa-solid fa-arrow-right"></i>
        </button>
      </div>
    </div>

    <!-- CARD EMAIL / WHATSAPP -->
    <div class="contact-card">
      <div class="icon chat-icon"><i class="fa-solid fa-comment"></i></div>
      <div class="contact-info">
        <h4>Communiquer avec nous</h4>
        <p>Nous sommes disponible en ligne de 08:00 a 17:00 (GMT+1). Nous écrire dès à présent.</p>
        <p class="email">m1gienspy@gmail.com</p>
        
        <!-- Tu choisis : Email classique OU WhatsApp (plus efficace pour le Cameroun) -->
        
        <!-- Option 1 : Ouvrir WhatsApp directement (recommandé) -->
        <button class="chat-btn" onclick="window.open('https://wa.me/237655884341?text=Bonjour%20%F0%9F%91%8B%20Je%20viens%20du%20site%20et%20j%27aurais%20besoin%20d%27aide', '_blank')">
          NOUS CONTACTER <i class="fa-solid fa-arrow-right"></i>
        </button>

        <!-- Option 2 : Si tu préfères ouvrir le mail (décommente cette ligne et commente la précédente) -->
        <!-- 
        <button class="chat-btn" onclick="window.location.href='mailto:m1gienspy@gmail.com?subject=Question%20depuis%20le%20site&body=Bonjour%2C%0A%0AJe%20vous%20contacte%20depuis%20le%20site...'">
          NOUS CONTACTER <i class="fa-solid fa-arrow-right"></i>
        </button>
        -->

      </div>
    </div>

  </div>
</div>
  </main>

<?php get_footer(); ?>