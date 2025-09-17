<?php

/**
 * Интерфейс для всех товаров
 * Определяет общие методы, которые должны реализовать все типы товаров
 */
interface ProductInterface
{
    /**
     * Получить информацию о товаре
     * @return string
     */
    public function getInfo(): string;
    
    /**
     * Получить цену товара
     * @return float
     */
    public function getPrice(): float;
    
    /**
     * Получить тип товара
     * @return string
     */
    public function getType(): string;
}