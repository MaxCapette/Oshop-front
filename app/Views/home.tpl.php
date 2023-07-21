<?php

/** @var \App\Models\Category[] $categoriesForHomepage */
$categoriesForHomepage = $viewData['categories_for_homepage'];

// var_dump(
//     $categoriesForHomepage,
//     array_slice($categoriesForHomepage, 0, 2),
//     array_slice($categoriesForHomepage, 2, 3),
// ); die;

?>

<section>
    <div class="container-fluid">
        <div class="row mx-0">
            <!-- Dans la première ligne, on va boucler sur les 2 premières catégories de la liste -->
            <?php
            // array_slice va extraitre une portion de notre liste de catégories (ici, les 2 premières).
            foreach (array_slice($categoriesForHomepage, 0, 2) as $categoryForHomepage) {
                ?>
                <div class="col-md-6">
                    <div class="card border-0 text-white text-center">
                        <img src="<?= $absoluteUrl ?>/<?= $categoryForHomepage->getPicture() ?>" alt="Card image" class="card-img">
                        <div class="card-img-overlay d-flex align-items-center">
                            <div class="w-100 py-3">
                                <h2 class="display-3 font-weight-bold mb-4"><?= $categoryForHomepage->getName() ?></h2>
                                <a href="<?= $router->generate("category", ["id" => $categoryForHomepage->getId()]) ?>" class="btn btn-light"><?= $categoryForHomepage->getSubtitle() ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <div class="row mx-0">
            <!-- Dans la 2eme ligne, on va boucler sur les 3 suivantes -->
            <?php
            foreach (array_slice($categoriesForHomepage, 2, 3) as $categoryForHomepage) {
                ?>
                <div class="col-lg-4">
                    <div class="card border-0 text-center text-white">
                        <img src="<?= $absoluteUrl ?>/<?= $categoryForHomepage->getPicture() ?>" alt="Card image" class="card-img">
                        <div class="card-img-overlay d-flex align-items-center">
                            <div class="w-100">
                                <h2 class="display-4 mb-4"><?= $categoryForHomepage->getName() ?></h2>
                                <a href="<?= $router->generate("category", ["id" => $categoryForHomepage->getId()]) ?>" class="btn btn-link text-white">
                                <?= $categoryForHomepage->getSubtitle() ?> <i class="fa-arrow-right fa ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>