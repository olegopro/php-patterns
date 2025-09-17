<?php

require_once 'ProductInterface.php';
require_once 'Book.php';
require_once 'Clothes.php';

/**
 * Фабрика для создания товаров
 * Реализует паттерн Factory для инкапсуляции логики создания объектов
 */
class ProductFactory
{
    /**
     * Создать товар по типу и параметрам
     *
     * @param string $type Тип товара ('book' или 'clothes')
     * @param array $params Параметры для создания товара
     * @return ProductInterface
     * @throws Exception Если тип товара не поддерживается
     */
    public static function create(string $type, array $params): ProductInterface
    {
        switch ($type) {
            case 'book':
                return self::createBook($params);

            case 'clothes':
                return self::createClothes($params);

            default:
                throw new Exception("Неизвестный тип товара: {$type}");
        }
    }

    /**
     * Создать книгу
     *
     * @param array $params Параметры книги
     * @return Book
     * @throws Exception Если не хватает обязательных параметров
     */
    private static function createBook(array $params): Book
    {
        if (!isset($params['title']) || !isset($params['author'])) {
            throw new Exception('Для создания книги необходимы параметры: title, author');
        }

        $price = $params['price'] ?? 25.99;

        return new Book($params['title'], $params['author'], $price);
    }

    /**
     * Создать одежду
     *
     * @param array $params Параметры одежды
     * @return Clothes
     * @throws Exception Если не хватает обязательных параметров
     */
    private static function createClothes(array $params): Clothes
    {
        if (!isset($params['size']) || !isset($params['color'])) {
            throw new Exception('Для создания одежды необходимы параметры: size, color');
        }

        $price = $params['price'] ?? 49.99;
        $brand = $params['brand'] ?? 'Generic';

        return new Clothes($params['size'], $params['color'], $price, $brand);
    }

    /**
     * Получить список поддерживаемых типов товаров
     *
     * @return array
     */
    public static function getSupportedTypes(): array
    {
        return ['book', 'clothes'];
    }
}
