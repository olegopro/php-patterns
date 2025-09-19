<?php

/**
 * Интерфейс для всех столов
 * 
 * Определяет общие методы для столов любого стиля
 */
interface TableInterface
{
    /**
     * Получение описания стола
     * 
     * @return string Описание внешнего вида
     */
    public function getDescription(): string;
    
    /**
     * Получение материала стола
     * 
     * @return string Материал изготовления
     */
    public function getMaterial(): string;
    
    /**
     * Получение стиля стола
     * 
     * @return string Стиль (модерн, классика и т.д.)
     */
    public function getStyle(): string;
    
    /**
     * Отображение стола
     * 
     * @return string HTML/текстовое представление
     */
    public function render(): string;
}
