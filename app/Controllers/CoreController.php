<?php

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Type;

class CoreController
{
   
    /**
     * Affiche la page
     *
     * @param string $viewName
     * @param array $viewData (Facultatif)
     */
    protected function show($viewName, $viewData = [])
    {
        global $router; // Ce truc là, c'est DÉGUEULASSE.

         $absoluteUrl = $_SERVER["BASE_URI"];

        $categoryModel = new Category();
        $categoriesList = $categoryModel->findAll("name");

        $typeModel = new Type();
        $typesList = $typeModel->findAll("name");

        $brandModel = new Brand();
        $brandsList = $brandModel->findAll("name");

        // Ici, on crée une "copie" de $categoryList avec une petite différence : les index seront les id des category.
        // Avantage : il sera très simple de piocher la bonne category dans cette liste là.
        // Exemple : Si on veut récupérer la category 7, on aura juste à faire $categoriesListById[7].
        $categoriesListById = [];
        foreach ($categoriesList as $categoryElement) {
            $categoriesListById[$categoryElement->getId()] = $categoryElement;
        }
        // Ici, on crée une "copie" de $brandList avec une petite différence : les index seront les id des brand.
        // Avantage : il sera très simple de piocher le bon brand dans cette liste là.
        // Exemple : Si on veut récupérer le brand 7, on aura juste à faire $brandsListById[7].
        $brandsListById = [];
        foreach ($brandsList as $brandElement) {
            $brandsListById[$brandElement->getId()] = $brandElement;
        }
        // Ici, on crée une "copie" de $typeList avec une petite différence : les index seront les id des type.
        // Avantage : il sera très simple de piocher le bon type dans cette liste là.
        // Exemple : Si on veut récupérer le type 7, on aura juste à faire $typesListById[7].
        $typesListById = [];
        foreach ($typesList as $typeElement) {
            $typesListById[$typeElement->getId()] = $typeElement;
        }

        require_once __DIR__ . "/../Views/header.tpl.php";
        require_once __DIR__ . "/../Views/$viewName.tpl.php";
        require_once __DIR__ . "/../Views/footer.tpl.php";
    }

      
}