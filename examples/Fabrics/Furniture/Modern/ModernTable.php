<?php

require_once __DIR__ . '/../Interfaces/TableInterface.php';

/**
 * Стол в стиле модерн
 * 
 * Современный минималистичный стол с чистыми линиями
 */
class ModernTable implements TableInterface
{
    /**
     * Получение описания стола
     * 
     * @return string Описание внешнего вида
     */
    public function getDescription(): string
    {
        return 'Минималистичный стол с чистыми геометрическими линиями, без лишних деталей';
    }
    
    /**
     * Получение материала стола
     * 
     * @return string Материал изготовления
     */
    public function getMaterial(): string
    {
        return 'Закаленное стекло и хромированная сталь';
    }
    
    /**
     * Получение стиля стола
     * 
     * @return string Стиль
     */
    public function getStyle(): string
    {
        return 'Модерн';
    }
    
    /**
     * Отображение стола
     * 
     * @return string Текстовое представление
     */
    public function render(): string
    {
        return "
🔲 === МОДЕРНОВЫЙ СТОЛ ===
   Материал: {$this->getMaterial()}
   Описание: {$this->getDescription()}
   Стиль: {$this->getStyle()}
   ✨ Особенности: LED-подсветка, сенсорная поверхность
   🎨 Цвета: Прозрачный + хром
================================
        ";
    }
}
