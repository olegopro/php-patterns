<?php

/**
 * Интерфейс для всех стульев
 * 
 * Определяет общие методы для стульев любого стиля
 */
interface ChairInterface
{
    /**
     * Получение описания стула
     * 
     * @return string Описание внешнего вида
     */
    public function getDescription(): string;
    
    /**
     * Получение материала стула
     * 
     * @return string Материал изготовления
     */
    public function getMaterial(): string;
    
    /**
     * Получение стиля стула
     * 
     * @return string Стиль (модерн, классика и т.д.)
     */
    public function getStyle(): string;
    
    /**
     * Проверка наличия подлокотников
     * 
     * @return bool Есть ли подлокотники
     */
    public function hasArmrests(): bool;
    
    /**
     * Отображение стула
     * 
     * @return string HTML/текстовое представление
     */
    public function render(): string;
}
