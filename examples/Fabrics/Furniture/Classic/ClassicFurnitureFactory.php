<?php

require_once __DIR__ . '/../Interfaces/FurnitureFactoryInterface.php';
require_once __DIR__ . '/ClassicTable.php';
require_once __DIR__ . '/ClassicChair.php';

/**
 * Фабрика мебели в классическом стиле
 * 
 * Создает СЕМЕЙСТВО мебели в едином традиционном стиле.
 * Гарантирует, что стол и стулья будут сочетаться между собой.
 */
class ClassicFurnitureFactory implements FurnitureFactoryInterface
{
    /**
     * Создание стола в классическом стиле
     * 
     * @return TableInterface Классический стол
     */
    public function createTable(): TableInterface
    {
        return new ClassicTable();
    }
    
    /**
     * Создание стула в классическом стиле
     * 
     * @return ChairInterface Классический стул
     */
    public function createChair(): ChairInterface
    {
        return new ClassicChair();
    }
    
    /**
     * Получение названия стиля фабрики
     * 
     * @return string Название стиля
     */
    public function getStyleName(): string
    {
        return 'Классика';
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
            'description' => "Элегантный набор мебели в стиле {$this->getStyleName()}: 1 стол + {$chairsCount} стульев"
        ];
    }
}
