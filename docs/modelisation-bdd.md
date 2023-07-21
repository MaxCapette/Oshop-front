# Modélisation de la base de données oShop

## MCD

```
BRAND: brand code, brand name
made, 0N BRAND, 11 PRODUCT
PRODUCT: product code, product name, description, picture, price, rate, status
is tagged as, 01 PRODUCT, 0N CATEGORY
CATEGORY: category code, category name, subtitle, picture, home order

TYPE: type code, type name
is a, 0N TYPE, 11 PRODUCT
```

## MLD

**BRAND** (<ins>brand code</ins>, brand name)

**PRODUCT** (<ins>product code</ins>, product name, description, picture, price, rate, status, _category code_, _brand code_, _type code_)

**CATEGORY** (<ins>category code</ins>, category name, subtitle, picture, home order)

**TYPE** (<ins>type code</ins>, type name)