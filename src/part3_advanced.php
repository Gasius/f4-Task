<?php

require_once 'part2_oop.php';

$productsForDiscount = [
    new Product('Ноутбук', 1200, 'Электроника', 10),
    new Product('Клавиатура', 80, 'Электроника', 50),
];
function applyDiscount(array &$items, float $discountPercentage): void
{
    $discountMultiplier = 1 - ($discountPercentage / 100);
    foreach ($items as $item) {
        $item->price *= $discountMultiplier;
    }
}

echo "Цены до скидки:\n";
foreach ($productsForDiscount as $product) {
    echo "{$product->name}: {$product->price}\n";
}

applyDiscount($productsForDiscount, 20);

echo "\nСкидка 20%:\n";
foreach ($productsForDiscount as $product) {
    echo "{$product->name}: {$product->price}\n";
}

$productsProcedural = [
    ['name' => 'Ноутбук', 'price' => 1200, 'category' => 'Электроника', 'quantity' => 10],
    ['name' => 'Клавиатура', 'price' => 80, 'category' => 'Электроника', 'quantity' => 50],
    ['name' => 'Книга "Чистый код"', 'price' => 25, 'category' => 'Книги', 'quantity' => 30],
];

$totalPriceFunctional = array_reduce($productsProcedural, fn($carry, $item) => $carry + ($item['price'] * $item['quantity']), 0);
echo "\nОбщая стоимость (функциональный подход): " . $totalPriceFunctional . "\n";

$electronicsFunctional = array_filter($productsProcedural, fn($item) => $item['category'] === 'Электроника');
$electronicsNamesFunctional = array_map(fn($item) => $item['name'], $electronicsFunctional);
echo "Названия электроники (функциональный подход): " . implode(', ', $electronicsNamesFunctional) . "\n";






class ModernProduct
{
    public function __construct(
        public string $name,
        public float $price,
        public string $category,
        public int $quantity
    ) {
    }

    public function isAvailable(): bool
    {
        return $this->quantity > 0;
    }
}

function getCategoryDiscount(ModernProduct $product): int
{
    return match ($product->category) {
        'Электроника' => 10,
        'Книги' => 20,
        default => 0,
    };
}

$laptop = new ModernProduct('Ноутбук', 1200, 'Электроника', 10);
$book = new ModernProduct('Книга', 25, 'Книги', 30);

echo "\nСкидка на {$laptop->name}: " . getCategoryDiscount($laptop) . "%\n";
echo "Скидка на {$book->name}: " . getCategoryDiscount($book) . "%\n";
