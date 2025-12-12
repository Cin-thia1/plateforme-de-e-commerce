<?php
/**
 * Template Name: Page panier
 */
get_header(); ?>

<div class="page-container">
    <div class="cart-wrapper">

        <section class="shopping-cart">
            <h2>Votre Panier</h2>

            <?php if ( WC()->cart->is_empty() ) : ?>
                <p class="cart-empty-message" style="text-align:center; padding:40px; font-size:18px; color:#999;">
                    Votre panier est actuellement vide.
                </p>
                <div class="cart-actions">
                    <a href="<?php echo wc_get_page_permalink('home'); ?>" class="btn btn-shop">← RETOUR À LA BOUTIQUE</a>
                </div>
            <?php else : ?>

                <div class="cart-table-container">
                    <table class="cart-table" id="panier-table">
                        <thead>
                            <tr>
                                <th class="col-remove"></th>
                                <th class="col-product">PRODUITS</th>
                                <th class="col-price">PRIX</th>
                                <th class="col-qty">QUANTITÉ</th>
                                <th class="col-subtotal">SOUS-TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                                $product = $cart_item['data'];
                                $product_id = $cart_item['product_id'];
                                $quantity = $cart_item['quantity'];
                                $price = $product->get_price();
                                $subtotal = $price * $quantity;
                                $thumbnail = $product->get_image('thumbnail');
                                $product_permalink = $product->is_visible() ? $product->get_permalink() : '';
                            ?>
                                <tr class="cart-item" data-key="<?php echo esc_attr($cart_item_key); ?>">
                                    <td class="col-remove">
                                        <a href="<?php echo esc_url( wc_get_cart_remove_url($cart_item_key) ); ?>" 
                                           class="remove-item" title="Supprimer cet article">
                                            &times;
                                        </a>
                                    </td>
                                    <td class="col-product">
                                        <div class="product-info-cart">
                                            <?php if ( $product_permalink ) : ?>
                                                <a href="<?php echo esc_url($product_permalink); ?>">
                                                    <?php echo $thumbnail; ?>
                                                </a>
                                            <?php else : ?>
                                                <?php echo $thumbnail; ?>
                                            <?php endif; ?>
                                            <div class="product-name">
                                                <?php if ( $product_permalink ) : ?>
                                                    <a href="<?php echo esc_url($product_permalink); ?>">
                                                        <?php echo wp_kses_post($product->get_name()); ?>
                                                    </a>
                                                <?php else : ?>
                                                    <?php echo wp_kses_post($product->get_name()); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-price"><?php echo wc_price($price); ?></td>
                                    <td class="col-qty">
                                        <div class="quantity-selector">
                                            <button type="button" class="minus">-</button>
                                            <input type="number" class="qty" value="<?php echo $quantity; ?>" 
                                                   min="1" data-key="<?php echo esc_attr($cart_item_key); ?>">
                                            <button type="button" class="plus">+</button>
                                        </div>
                                    </td>
                                    <td class="col-subtotal"><?php echo wc_price($subtotal); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="cart-actions">
                    <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="btn btn-shop">← RETOUR À LA BOUTIQUE</a>
                    <button type="submit" form="cart-form" class="btn btn-update">METTRE À JOUR LE PANIER</button>
                </div>

            <?php endif; ?>
        </section>

        <?php if ( ! WC()->cart->is_empty() ) : ?>
            <aside class="card-totals-section">

                <form id="cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                    <?php do_action('woocommerce_before_cart_totals'); ?>

                    <div class="card-totals">
                        <h3>Totaux du Panier</h3>
                        <div class="total-row">
                            <span class="label">Sous-total</span>
                            <span class="value total-sub"><?php wc_cart_totals_subtotal_html(); ?></span>
                        </div>
                        <div class="total-row">
                            <span class="label">Livraison</span>
                            <span class="value total-shipping">Gratuite</span>
                        </div>
                        <div class="total-row total-tax">
                            <span class="label">Taxes (TVA)</span>
                            <span class="value total-tax-value"><?php wc_cart_totals_taxes_total_html(); ?></span>
                        </div>
                        <div class="total-row total-main">
                            <span class="label">Total</span>
                            <span class="value total-final"><?php wc_cart_totals_order_total_html(); ?></span>
                        </div>

                        <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn btn-checkout">
                            PROCÉDER AU PAIEMENT
                        </a>
                    </div>
                </form>

                <div class="coupon-code">
                    <h4>Code Promo</h4>
                    <form class="woocommerce-cart-coupon" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                        <div class="coupon-form">
                            <input type="text" name="coupon_code" placeholder="Entrez votre code promo" required>
                            <button type="submit" class="btn btn-coupon" name="apply_coupon">APPLIQUER LE COUPON</button>
                        </div>
                    </form>
                </div>

            </aside>
        <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>