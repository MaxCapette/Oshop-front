<?php

/** @var \App\Models\Product $product */
$product = $viewData['product'];

?>

<section class="hero">
    <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="<?= $router->generate("home") ?>">Home</a></li>
            <li class="breadcrumb-item active"><?= $categoriesListById[$product->getCategoryId()]->getName() ?></li>
        </ol>
    </div>
</section>

<section class="products-grid">
    <div class="container-fluid">
        <div class="row">
            <!-- product-->
            <div class="col-lg-6 col-sm-12">
                <div class="product-image">
                    <a href="detail.html" class="product-hover-overlay-link">
                        <img src="<?= $absoluteUrl ?>/<?= $product->getPicture() ?>" alt="product" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="mb-3">
                    <h3 class="h3 text-uppercase mb-1"><?= $product->getName() ?></h3>
                    <div class="text-muted">by <em><?= $brandsListById[$product->getBrandId()]->getName() ?></em></div>
                    <div>
                        <?php
                        for ($i=0; $i < 5; $i++) {
                            // Si jamais le compteur est inférieur à la note du produit -> alors on met une étoile pleine
                            // Sinon on met une étoile vide.
                            if ($i < $product->getRate()) {
                                
                               echo '<i class="fa fa-star"></i>' ;
                                
                            } else {
                                
                               echo  '<i class="fa fa-star-o"></i>';
                                
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="my-2">
                    <div class="text-muted"><span class="h4"><?= $product->getPrice() ?> €</span> TTC</div>
                </div>
                <div class="product-action-buttons">
                    <form action="cart.html" method="post">
                        <input type="hidden" name="product_id" value="<?= $product->getId() ?>">
                        <button class="btn btn-dark btn-buy">
                            <i class="fa fa-shopping-cart"></i><span class="btn-buy-label ml-2">Ajouter au panier</span>
                        </button>
                    </form>
                </div>
                <div class="mt-5">
                    <p><?= $product->getDescription() ?></p>
                </div>
            </div>
            <!-- /product-->
        </div>
    </div>
</section>