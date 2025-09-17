<?php

require_once 'ProductInterface.php';

/**
 * Класс одежды, реализующий интерфейс ProductInterface
 */
class Clothes implements ProductInterface
{
    private string $size;
    private string $color;
    private float $price;
    private string $brand;

    public function __construct(string $size, string $color, float $price = 49.99, string $brand = 'Generic')
    {
        $this->size = $size;
        $this->color = $color;
        $this->price = $price;
        $this->brand = $brand;
    }

    /**
     * Получить информацию об одежде
     */
    public function getInfo(): string
    {
        return "Одежда: {$this->brand}, размер: {$this->size}, цвет: {$this->color}";
    }

    /**
     * Получить цену одежды
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Получить тип товара
     */
    public function getType(): string
    {
        return 'clothes';
    }

    /**
     * Получить размер
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * Получить цвет
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Получить бренд
     */
    public function getBrand(): string
    {
        return $this->brand;
    }
}
