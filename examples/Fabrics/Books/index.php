<?php

require_once 'ProductFactory.php';

/**
 * Демонстрация работы паттерна Factory
 * Этот файл показывает практическое применение фабрики товаров
 */

echo "=== Демонстрация паттерна Factory ===\n\n";

try {
    // Создание книги через фабрику
    echo "1. Создание книги:\n";
    $book = ProductFactory::create('book', [
        'title'  => 'Design Patterns',
        'author' => 'Gang of Four',
        'price'  => 35.50
    ]);

    echo "   {$book->getInfo()}\n";
    echo "   Цена: {$book->getPrice()} руб.\n";
    echo "   Тип: {$book->getType()}\n\n";

    // Создание одежды через фабрику
    echo "2. Создание одежды:\n";
    $clothes = ProductFactory::create('clothes', [
        'size'  => 'XL',
        'color' => 'синий',
        'price' => 89.99,
        'brand' => 'Nike'
    ]);

    echo "   {$clothes->getInfo()}\n";
    echo "   Цена: {$clothes->getPrice()} руб.\n";
    echo "   Тип: {$clothes->getType()}\n\n";

    // Создание товаров с минимальными параметрами
    echo "3. Создание товаров с базовыми параметрами:\n";

    $simpleBook = ProductFactory::create('book', [
        'title'  => 'PHP для начинающих',
        'author' => 'Иван Иванов'
    ]);

    echo "   {$simpleBook->getInfo()}\n";
    echo "   Цена по умолчанию: {$simpleBook->getPrice()} руб.\n\n";

    $simpleClothes = ProductFactory::create('clothes', [
        'size'  => 'M',
        'color' => 'красный'
    ]);

    echo "   {$simpleClothes->getInfo()}\n";
    echo "   Цена по умолчанию: {$simpleClothes->getPrice()} руб.\n\n";

    // Демонстрация работы с массивом товаров
    echo "4. Создание нескольких товаров:\n";

    $products = [];

    // Данные для создания товаров
    $productData = [
        ['type' => 'book', 'params' => ['title' => 'Чистый код', 'author' => 'Роберт Мартин', 'price' => 45.00]],
        ['type' => 'clothes', 'params' => ['size' => 'L', 'color' => 'черный', 'brand' => 'Adidas', 'price' => 120.00]],
        ['type' => 'book', 'params' => ['title' => 'Рефакторинг', 'author' => 'Мартин Фаулер']],
        ['type' => 'clothes', 'params' => ['size' => 'S', 'color' => 'белый']]
    ];

    foreach ($productData as $index => $data) {
        $product = ProductFactory::create($data['type'], $data['params']);
        $products[] = $product;
        echo "   Товар " . ($index + 1) . ": {$product->getInfo()} - {$product->getPrice()} руб.\n";
    }

    // Подсчет общей стоимости
    $totalPrice = array_sum(array_map(fn ($product) => $product->getPrice(), $products));
    echo "\n   Общая стоимость всех товаров: {$totalPrice} руб.\n\n";

    // Показать поддерживаемые типы
    echo "5. Поддерживаемые типы товаров:\n";
    $supportedTypes = ProductFactory::getSupportedTypes();
    foreach ($supportedTypes as $type) {
        echo "   - {$type}\n";
    }

} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
}

echo "\n=== Демонстрация обработки ошибок ===\n\n";

// Демонстрация обработки ошибок
try {
    echo "Попытка создать неподдерживаемый тип товара:\n";
    $invalidProduct = ProductFactory::create('electronics', ['name' => 'Телефон']);
} catch (Exception $e) {
    echo "Ошибка: {$e->getMessage()}\n\n";
}

try {
    echo "Попытка создать книгу без обязательных параметров:\n";
    $invalidBook = ProductFactory::create('book', ['title' => 'Неполная книга']);
} catch (Exception $e) {
    echo "Ошибка: {$e->getMessage()}\n\n";
}

try {
    echo "Попытка создать одежду без обязательных параметров:\n";
    $invalidClothes = ProductFactory::create('clothes', ['size' => 'M']);
} catch (Exception $e) {
    echo "Ошибка: {$e->getMessage()}\n\n";
}

echo "=== Конец демонстрации ===\n";
