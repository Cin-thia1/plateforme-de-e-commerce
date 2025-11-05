<?php
/**
 * Template Name: Page commande
 */

get_header(); ?>

  <main class="container">
    <!-- Col gauche: formulaire -->
    <section class="card">
      <form id="checkout-form" class="section" aria-labelledby="heading-billing">
        <h2 id="heading-billing">Informations de facturation</h2>
        <div class="grid cols-2">
          <div>
            <label for="fname">Prénom</label>
            <input class="input" id="fname" name="fname" autocomplete="given-name" />
          </div>
          <div>
            <label for="lname">Nom</label>
            <input class="input" id="lname" name="lname" autocomplete="family-name" />
          </div>
        </div>
        <div class="grid cols-2">
          <div>
            <label for="company">Entreprise <span class="muted">(optionnel)</span></label>
            <input class="input" id="company" name="company" autocomplete="organization" />
          </div>
          <div></div>
        </div>
        <div>
          <label for="address">Adresse</label>
          <input class="input" id="address" name="address" autocomplete="street-address" />
        </div>

        <div class="grid cols-4 cols-3" style="grid-template-columns:repeat(4,1fr); gap:14px">
          <div>
            <label for="country">Pays</label>
            <select class="input" id="country" name="country" autocomplete="country-name">
              <option value="">Sélectionner...</option>
              <option>Cameroun</option>
              <option>Gabon</option>
              <option>Congo</option>
              <option>Tchad</option>
            </select>
          </div>
          <div>
            <label for="region">Région/État</label>
            <input class="input" id="region" name="region" />
          </div>
          <div>
            <label for="city">Ville</label>
            <input class="input" id="city" name="city" />
          </div>
          <div>
            <label for="zip">Code postal</label>
            <input class="input" id="zip" name="zip" inputmode="numeric" />
          </div>
        </div>

        <div class="grid cols-2">
          <div>
            <label for="email">E-mail</label>
            <input class="input" id="email" name="email" type="email" autocomplete="email" />
          </div>
          <div>
            <label for="phone">Téléphone</label>
            <input class="input" id="phone" name="phone" type="tel" autocomplete="tel" />
          </div>
        </div>

        <div class="checkbox">
          <input id="ship-diff" type="checkbox" />
          <label for="ship-diff">Expédier à une adresse différente</label>
        </div>
      </form>

      <!-- === PAIEMENT === -->
      <div class="section" aria-labelledby="heading-payment">
        <h2 id="heading-payment">Mode de paiement</h2>

        <div class="pay-box card-light">
          <div class="pay-options" role="radiogroup" aria-label="Choisir un mode de paiement">
            <label class="pay-tile">
              <input type="radio" name="payment" value="cod">
              <span class="label">
                <span class="logo">
                  <img src="assets/img/payments/cash.svg" alt="" aria-hidden="true">
                </span>
                Cash à la livraison
              </span>
            </label>

            <label class="pay-tile">
              <input type="radio" name="payment" value="orange">
              <span class="label">
                <span class="logo wide">
                  <img src="./assets/images/orange.jpg" alt="" aria-hidden="true">
                </span>
                Orange Money
              </span>
            </label>

            <label class="pay-tile">
              <input type="radio" name="payment" value="paypal">
              <span class="label">
                <span class="logo wide">
                  <img src="assets/images/paypal.jpg" alt="" aria-hidden="true">
                </span>
                PayPal
              </span>
            </label>

            <label class="pay-tile">
              <input type="radio" name="payment" value="mtn">
              <span class="label">
                <span class="logo wide">
                  <img src="./assets/images/mtn.jpg" alt="" aria-hidden="true">
                </span>
                MTN Mobile Money
              </span>
            </label>

            <label class="pay-tile">
              <input type="radio" name="payment" value="card" checked>
              <span class="label">
                <span class="logo">
                  <img src="assets/img/payments/card.svg" alt="" aria-hidden="true">
                </span>
                Carte bancaire
              </span>
            </label>
          </div>



          <!-- Formulaires spécifiques -->
          <div class="pay-forms">
            <div class="pay-form hidden" data-method="cod" aria-hidden="true">
              <p class="hint">Vous réglerez en espèces à la livraison.</p>
              <div class="grid">
                <div>
                  <label for="cod-notes">Instruction livreur <span class="muted">(optionnel)</span></label>
                  <input class="input" id="cod-notes" name="cod-notes" placeholder="Ex. rendre la monnaie sur 10 000" />
                </div>
              </div>
            </div>

            <div class="pay-form hidden" data-method="orange" aria-hidden="true">
              <p class="hint">Un code USSD/SMS vous sera envoyé pour confirmer le paiement Orange Money.</p>
              <div class="grid cols-2">
                <div>
                  <label for="om-phone">Numéro Orange Money</label>
                  <input class="input" id="om-phone" name="om-phone" type="tel" placeholder="Ex. 07 12 34 56 78" />
                </div>
                <div>
                  <label for="om-name">Nom du titulaire</label>
                  <input class="input" id="om-name" name="om-name" placeholder="Nom sur le compte OM" />
                </div>
              </div>
            </div>


            <div class="pay-form hidden" data-method="paypal" aria-hidden="true">
              <p class="hint">Connexion sécurisée à PayPal pour finaliser la transaction.</p>
              <div class="grid">
                <div>
                  <label for="paypal-email">E-mail PayPal</label>
                  <input class="input" id="paypal-email" name="paypal-email" type="email"
                    placeholder="vous@exemple.com" />
                </div>
              </div>
            </div>

            <div class="pay-form hidden" data-method="mtn" aria-hidden="true">
              <p class="hint">Vous recevrez une demande d’approbation MTN MoMo sur votre téléphone.</p>
              <div class="grid cols-2">
                <div>
                  <label for="mtn-phone">Numéro MTN MoMo</label>
                  <input class="input" id="mtn-phone" name="mtn-phone" type="tel" placeholder="Ex. 05 12 34 56 78" />
                </div>
                <div>
                  <label for="mtn-name">Nom du titulaire</label>
                  <input class="input" id="mtn-name" name="mtn-name" placeholder="Nom sur le compte MTN" />
                </div>
              </div>
            </div>

            <div class="pay-form" data-method="card">
              <div class="grid">
                <div>
                  <label for="cc-name">Nom sur la carte</label>
                  <input class="input" id="cc-name" name="cc-name" autocomplete="cc-name" />
                </div>
                <div>
                  <label for="cc-number">Numéro de carte</label>
                  <input class="input" id="cc-number" name="cc-number" inputmode="numeric" autocomplete="cc-number"
                    placeholder="0000 0000 0000 0000" />
                </div>
                <div class="grid cols-2">
                  <div>
                    <label for="cc-exp">Date d'expiration</label>
                    <input class="input" id="cc-exp" name="cc-exp" inputmode="numeric" autocomplete="cc-exp"
                      placeholder="MM/AA" />
                  </div>
                  <div>
                    <label for="cc-cvc">CVC</label>
                    <input class="input" id="cc-cvc" name="cc-cvc" inputmode="numeric" autocomplete="cc-csc"
                      placeholder="123" />
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- /.pay-forms -->
        </div> <!-- /.pay-box -->
      </div>

      <div class="section" aria-labelledby="heading-notes">
        <h2 id="heading-notes">Informations supplémentaires <span class="hint">(optionnel)</span></h2>
        <label class="sr-only" for="notes">Notes de commande</label>
        <textarea class="input note" id="notes" name="notes"
          placeholder="Notes sur la commande, ex : instructions de livraison…"></textarea>
      </div>
    </section>

    <!-- Col droite: récapitulatif commande -->
    <aside class="order-summary card section" aria-labelledby="heading-summary">
      <h2 id="heading-summary">Récapitulatif</h2>
      <div class="order-list">
        <div class="item">
          <div class="thumb">📷</div>
          <div style="flex:1">
            <div class="item-title">Canon EOS 1500D DSLR Camera Body</div>
            <div class="item-meta">1 × 57000 fcfa</div>
          </div>
        </div>
        <div class="item">
          <div class="thumb">🎧</div>
          <div style="flex:1">
            <div class="item-title">Casque filaire over-ear avec micro</div>
            <div class="item-meta">3 × 25000 fcfa</div>
          </div>
        </div>
      </div>

      <div class="section" style="padding:18px 0 0">
        <div class="row"><span>Sous-total</span><span>32000 fcfa</span></div>
        <div class="row"><span>Livraison</span><span>Offerte</span></div>
        <div class="row"><span>Remise</span><span>-1000fcfa</span></div>
        <div class="row"><span>Taxes</span><span></span></div>
        <div class="row total" style="margin-top:14px"><span>Total</span><span></span></div>

        <!-- Bouton commande -->
        <button id="place-order" class="btn" type="button" aria-label="Placer la commande">
          PASSER LA COMMANDE
        </button>

        <!-- Message de statut (simulation) -->
        <div id="order-status" class="status hidden" role="status" aria-live="polite"></div>
      </div>
    </aside>
  </main>

  
<?php get_footer(); ?>