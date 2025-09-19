<?php

require_once 'TableInterface.php';
require_once 'ChairInterface.php';

/**
 * Абстрактная фабрика мебели
 * 
 * Определяет методы для создания СЕМЕЙСТВА связанных объектов.
 * Каждая конкретная фабрика будет создавать мебель в едином стиле.
 */
interface FurnitureFactoryInterface
{
    /**
     * Создание стола
     * 
     * @return TableInterface Стол в стиле фабрики
     */
    public function createTable(): TableInterface;
    
    /**
     * Создание стула
     * 
     * @return ChairInterface Стул в стиле фабрики
     */
    public function createChair(): ChairInterface;
    
    /**
     * Получение названия стиля фабрики
     * 
     * @return string Название стиля (модерн, классика и т.д.)
     */
    public function getStyleName(): string;
    
    /**
     * Создание полного набора мебели для комнаты
     * 
     * @param int $chairsCount Количество стульев
     * @return array Массив с набором мебели
     */
    public function createDiningSet(int $chairsCount = 4): array;
}
