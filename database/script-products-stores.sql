SELECT stores.name, products.nombre FROM products
JOIN products_has_stores ON products_has_stores.products_id = products.id
JOIN stores ON products_has_stores.stores_id = stores.id
