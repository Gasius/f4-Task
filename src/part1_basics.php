<?php

$products = [
    ['name' => 'Ноутбук', 'price' => 1200, 'category' => 'Электроника', 'quantity' => 10],
    ['name' => 'Клавиатура', 'price' => 80, 'category' => 'Электроника', 'quantity' => 50],
    ['name' => 'Книга "Чистый код"', 'price' => 25, 'category' => 'Книги', 'quantity' => 30],
    ['name' => 'Кофе', 'price' => 15, 'category' => 'Продукты', 'quantity' => 0],
    ['name' => 'Мышь', 'price' => 40, 'category' => 'Электроника', 'quantity' => 5],
];

function calculateTotalPrice(array $items): float
{
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

function filterProductsByCategory(array $items, string $category): array
{
    $filteredProducts = [];
    foreach ($items as $item) {
        if ($item['category'] === $category) {
            $filteredProducts[] = $item;
        }
    }
    return $filteredProducts;
}

echo "Общая стоимость всех товаров- " . calculateTotalPrice($products) . "\n";

$electronics = filterProductsByCategory($products, 'Электроника');
$electronicsNames = [];
foreach ($electronics as $item) {
    $electronicsNames[] = $item['name'];
}
echo "Названия товаров из категории 'Электроника'- " . implode(', ', $electronicsNames) . "\n";
