<?php

require_once __DIR__ . '/../Interfaces/TableInterface.php';

/**
 * Стол в классическом стиле
 * 
 * Элегантный стол с традиционными формами и богатой отделкой
 */
class ClassicTable implements TableInterface
{
    /**
     * Получение описания стола
     * 
     * @return string Описание внешнего вида
     */
    public function getDescription(): string
    {
        return 'Элегантный стол с резными ножками и традиционными пропорциями';
    }
    
    /**
     * Получение материала стола
     * 
     * @return string Материал изготовления
     */
    public function getMaterial(): string
    {
        return 'Массив дуба с лаковым покрытием';
    }
    
    /**
     * Получение стиля стола
     * 
     * @return string Стиль
     */
    public function getStyle(): string
    {
        return 'Классика';
    }
    
    /**
     * Отображение стола
     * 
     * @return string Текстовое представление
     */
    public function render(): string
    {
        return "
🏛️ === КЛАССИЧЕСКИЙ СТОЛ ===
   Материал: {$this->getMaterial()}
   Описание: {$this->getDescription()}
   Стиль: {$this->getStyle()}
   ✨ Особенности: Резные ножки, латунная фурнитура
   🎨 Цвета: Темный дуб + золотые акценты
==================================
        ";
    }
}
