<?php

require_once __DIR__ . '/../Interfaces/FurnitureFactoryInterface.php';
require_once __DIR__ . '/ModernTable.php';
require_once __DIR__ . '/ModernChair.php';

/**
 * Фабрика мебели в стиле модерн
 * 
 * Создает СЕМЕЙСТВО мебели в едином современном стиле.
 * Гарантирует, что стол и стулья будут сочетаться между собой.
 */
class ModernFurnitureFactory implements FurnitureFactoryInterface
{
    /**
     * Создание стола в стиле модерн
     * 
     * @return TableInterface Модерновый стол
     */
    public function createTable(): TableInterface
    {
        return new ModernTable();
    }
    
    /**
     * Создание стула в стиле модерн
     * 
     * @return ChairInterface Модерновый стул
     */
    public function createChair(): ChairInterface
    {
        return new ModernChair();
    }
    
    /**
     * Получение названия стиля фабрики
     * 
     * @return string Название стиля
     */
    public function getStyleName(): string
    {
        return 'Модерн';
    }
    
    /**
     * Создание полного набора мебели для столовой
     * 
     * @param int $chairsCount Количество стульев
     * @return array Массив с набором мебели
     */
    public function createDiningSet(int $chairsCount = 4): array
    {
        $chairs = [];
        
        // Создаем нужное количество стульев
        for ($i = 0; $i < $chairsCount; $i++) {
            $chairs[] = $this->createChair();
        }
        
        return [
            'table' => $this->createTable(),
            'chairs' => $chairs,
            'style' => $this->getStyleName(),
            'total_items' => $chairsCount + 1,
            'description' => "Современный набор мебели в стиле {$this->getStyleName()}: 1 стол + {$chairsCount} стульев"
        ];
    }
}
