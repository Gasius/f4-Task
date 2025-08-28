<?php


require_once __DIR__ . '/../part1_basics.php';
require_once __DIR__ . '/../part2_oop.php';

$productsForTests = [
    ['name' => 'Ноутбук', 'price' => 1200, 'category' => 'Электроника', 'quantity' => 10],
    ['name' => 'Клавиатура', 'price' => 80, 'category' => 'Электроника', 'quantity' => 50],
    ['name' => 'Книга "Чистый код"', 'price' => 25, 'category' => 'Книги', 'quantity' => 30],
    ['name' => 'Кофе', 'price' => 15, 'category' => 'Продукты', 'quantity' => 0],
    ['name' => 'Мышь', 'price' => 40, 'category' => 'Электроника', 'quantity' => 5],
];

test('calculateTotalPrice возвращает правильную общую стоимость', function () use ($productsForTests) {
    $expectedTotal = (1200 * 10) + (80 * 50) + (25 * 30) + (15 * 0) + (40 * 5);
    expect(calculateTotalPrice($productsForTests))->toBe($expectedTotal);
});

test('filterProductsByCategory правильно фильтрует товары', function () use ($productsForTests) {
    $electronics = filterProductsByCategory($productsForTests, 'Электроника');
    $expectedNames = ['Ноутбук', 'Клавиатура', 'Мышь'];
    $actualNames = array_map(fn($item) => $item['name'], $electronics);
    expect($actualNames)->toBe($expectedNames);
});

test('isAvailable() возвращает true для товара в наличии', function () {
    $laptop = new Product('Ноутбук', 1200, 'Электроника', 10);
    expect($laptop->isAvailable())->toBeTrue();
});

test('isAvailable() возвращает false для товара, которого нет в наличии', function () {
    $coffee = new Product('Кофе', 15, 'Продукты', 0);
    expect($coffee->isAvailable())->toBeFalse();
});
