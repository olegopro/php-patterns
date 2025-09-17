<?php

/**
 * Интерфейс для UI кнопки
 * 
 * Определяет общие методы, которые должны реализовать
 * все типы кнопок в различных операционных системах
 */
interface ButtonInterface
{
    /**
     * Отрисовать кнопку
     * 
     * @return string HTML/представление кнопки
     */
    public function render(): string;
    
    /**
     * Обработать клик по кнопке
     * 
     * @return string Результат обработки клика
     */
    public function onClick(): string;
    
    /**
     * Получить текст кнопки
     * 
     * @return string Текст на кнопке
     */
    public function getText(): string;
    
    /**
     * Установить текст кнопки
     * 
     * @param string $text Новый текст
     * @return self Для цепочки вызовов
     */
    public function setText(string $text): self;
    
    /**
     * Получить стиль кнопки (специфичный для каждой ОС)
     * 
     * @return string Описание стиля
     */
    public function getStyle(): string;
}
