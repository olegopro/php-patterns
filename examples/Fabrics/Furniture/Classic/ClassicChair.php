<?php

require_once __DIR__ . '/../Interfaces/ChairInterface.php';

/**
 * Стул в классическом стиле
 * 
 * Традиционный стул с богатой отделкой и комфортными подлокотниками
 */
class ClassicChair implements ChairInterface
{
    /**
     * Получение описания стула
     * 
     * @return string Описание внешнего вида
     */
    public function getDescription(): string
    {
        return 'Традиционный стул с высокой спинкой и мягкой обивкой';
    }
    
    /**
     * Получение материала стула
     * 
     * @return string Материал изготовления
     */
    public function getMaterial(): string
    {
        return 'Массив дуба с кожаной обивкой';
    }
    
    /**
     * Получение стиля стула
     * 
     * @return string Стиль
     */
    public function getStyle(): string
    {
        return 'Классика';
    }
    
    /**
     * Проверка наличия подлокотников
     * 
     * @return bool Есть ли подлокотники
     */
    public function hasArmrests(): bool
    {
        return true; // Классические стулья часто имеют подлокотники
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
🪑 === КЛАССИЧЕСКИЙ СТУЛ ===
   Материал: {$this->getMaterial()}
   Описание: {$this->getDescription()}
   Стиль: {$this->getStyle()}
   Подлокотники: {$armrests}
   ✨ Особенности: Резная спинка, мягкие подушки
   🎨 Цвета: Темный дуб + коричневая кожа
================================
        ";
    }
}
