# Démo jointures SQL

## Récupérer le nom de la marque et le nom et le prix du produit numero 4
```sql
SELECT `brand`.`name`, `product`.`name`, `product`.`price`
FROM `product`
INNER JOIN `brand` ON `brand`.`id` = `product`.`brand_id`
WHERE `product`.`id` = 4;
```

Ou dans l'autre sens (la seule différence, c'est la logique par laquelle on passe)

```sql
SELECT `brand`.`name`, `product`.`name`, `product`.`price`
FROM `brand`
INNER JOIN `product` ON `product`.`brand_id` = `brand`.`id`
WHERE `product`.`id` = 4;
```

## Nom, prix, nom de la marque et nom de la catégorie des produits de la catégorie 4
```sql
SELECT product.name, product.price, brand.name, category.name
FROM category
JOIN product ON product.category_id = category.id
JOIN brand ON brand.id = product.brand_id
WHERE category.id = 4;
```

## Différence entre les types de jointures
- `JOIN` VS `INNER JOIN` : Pas de différence.
- `INNER JOIN` VS `LEFT JOIN` : Le INNER va retouner les résultats qui ont un matching dans les 2 tables. Le LEFT va retourner un résultat même si il n'y a pas de matching dans la 2eme table.
- `RIGHT JOIN` : inverse du LEFT -> QUASI JAMAIS UTILISÉ CAR PAS NATUREL COMME FAÇON DE PROCÉDER.
- Les autres, on fait comme si ils n'existaient pas.