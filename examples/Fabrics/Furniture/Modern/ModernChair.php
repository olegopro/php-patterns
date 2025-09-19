<?php

require_once __DIR__ . '/../Interfaces/ChairInterface.php';

/**
 * Стул в стиле модерн
 * 
 * Современный эргономичный стул с минималистичным дизайном
 */
class ModernChair implements ChairInterface
{
    /**
     * Получение описания стула
     * 
     * @return string Описание внешнего вида
     */
    public function getDescription(): string
    {
        return 'Эргономичный стул с обтекаемыми формами и минималистичным дизайном';
    }
    
    /**
     * Получение материала стула
     * 
     * @return string Материал изготовления
     */
    public function getMaterial(): string
    {
        return 'Формованный пластик и алюминий';
    }
    
    /**
     * Получение стиля стула
     * 
     * @return string Стиль
     */
    public function getStyle(): string
    {
        return 'Модерн';
    }
    
    /**
     * Проверка наличия подлокотников
     * 
     * @return bool Есть ли подлокотники
     */
    public function hasArmrests(): bool
    {
        return false; // Модерновые стулья часто без подлокотников для минимализма
    }
    
    /**
     * Отображение стула
     * 
     * @return string Текстовое представление
     */
    public function render(): string
    {
        $armrests = $this->hasArmrests() ? 'Да' : 'Нет';
        
        return "
🪑 === МОДЕРНОВЫЙ СТУЛ ===
   Материал: {$this->getMaterial()}
   Описание: {$this->getDescription()}
   Стиль: {$this->getStyle()}
   Подлокотники: {$armrests}
   ✨ Особенности: Регулировка высоты, поворотный механизм
   🎨 Цвета: Белый + серебро
==============================
        ";
    }
}
