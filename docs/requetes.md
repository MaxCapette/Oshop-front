# Requêtes SQL

## Récupérer toutes les categories par ordre alphabétique
```sql
SELECT id, name
FROM category
ORDER BY name ASC
```

## Récupérer tous les types par ordre alphabétique
```sql
SELECT id, name
FROM type
ORDER BY name ASC
```

## Récupérer toutes les marques par ordre alphabétique
```sql
SELECT id, name
FROM brand
ORDER BY name ASC
```

## Récupérer les 5 catégories mises en avant sur la homepage dans le bon ordre
```sql
SELECT *
FROM `category`
WHERE `home_order` >  0
ORDER BY `home_order` ASC
LIMIT 5;
```

## Récupérer les info de la catégorie 2
```sql
SELECT id, name, subtitle
FROM category
WHERE id = 2
```

## Récupérer la liste de tous les produits de la catégorie 7
```sql
SELECT *
FROM product
WHERE category_id = 7
```

## Récupérer les info du type 2
```sql
SELECT id, name
FROM type
WHERE id = 2
```

## Récupérer la liste de tous les produits du type 2
```sql
SELECT *
FROM product
WHERE type_id = 2
```

## Récupérer les info de la marque 2
```sql
SELECT id, name
FROM brand
WHERE id = 2
```

## Récupérer la liste de tous les produits de la marque 2
```sql
SELECT *
FROM product
WHERE brand_id = 2
```

## Récupérer les infos du produit 3 (avec le nom de la marque et de la catégorie)
```sql
SELECT product.*, category.name, brand.name
FROM product
LEFT JOIN category ON category.id = product.category_id
JOIN brand ON brand.id = product.brand_id
WHERE product.id = 3
```