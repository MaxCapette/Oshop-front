<?php

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;

class CatalogController extends CoreController
{
    public function category($params)
    {
        // Maintenant on peut récupérer la bonne catégories dans la DB
        $categoryModel = new Category();
        $category = $categoryModel->find($params["id"]);

        // Si la catégorie demandée n'est pas trouvé en BDD, on va afficher la page 404 et tout arrêter.
        if ($category === false) {
            $errorController = new ErrorController();
            $errorController->error404();
            exit;
        }

        // On doit aussi récupérer les produits de la catégorie pour les donner à la vue, pour boucler dessus et les afficher.
        $productModel = new Product();
        $products = $productModel->findByCategory($params["id"]);

        $this->show("products_list", [
            "object" => $category,
            "products" => $products,
        ]);
    }

    public function type($params)
    {
        // Maintenant on peut récupérer le bon type dans la DB
        $typeModel = new Type();
        $type = $typeModel->find($params["id"]);

        // Si le type demandé n'est pas trouvé en BDD, on va afficher la page 404 et tout arrêter.
        if ($type === false) {
            $errorController = new ErrorController();
            $errorController->error404();
            exit;
        }

        // On doit aussi récupérer les produits du type pour les donner à la vue, pour boucler dessus et les afficher.
        $productModel = new Product();
        $products = $productModel->findByType($params["id"]);

        $this->show("products_list", [
            "object" => $type,
            "products" => $products,
        ]);
    }

    public function brand($params)
    {
        // Maintenant on peut récupérer la bonne marque dans la DB
        $brandModel = new Brand();
        $brand = $brandModel->find($params["id"]);

        // Si la marque demandée n'est pas trouvé en BDD, on va afficher la page 404 et tout arrêter.
        if ($brand === false) {
            $errorController = new ErrorController();
            $errorController->error404();
            exit;
        }

        // On doit aussi récupérer les produits de la marque pour les donner à la vue, pour boucler dessus et les afficher.
        $productModel = new Product();
        $products = $productModel->findByBrand($params["id"]);

        $this->show("products_list", [
            "object" => $brand,
            "products" => $products,
        ]);
    }

    public function product($params)
    {
            // 1ere étape: Récupërer les données -> le produit correspond à l'id demandé dans l'URL
            $productModel = new Product();
            $product = $productModel->find($params["id"]);

        $this->show("product", [
            "product" => $product
        ]);
    }
}