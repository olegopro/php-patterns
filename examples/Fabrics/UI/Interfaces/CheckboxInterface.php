<?php

/**
 * Интерфейс для UI чекбокса
 * 
 * Определяет общие методы, которые должны реализовать
 * все типы чекбоксов в различных операционных системах
 */
interface CheckboxInterface
{
    /**
     * Отрисовать чекбокс
     * 
     * @return string HTML/представление чекбокса
     */
    public function render(): string;
    
    /**
     * Переключить состояние чекбокса
     * 
     * @return string Результат переключения
     */
    public function toggle(): string;
    
    /**
     * Проверить, отмечен ли чекбокс
     * 
     * @return bool True если отмечен
     */
    public function isChecked(): bool;
    
    /**
     * Установить состояние чекбокса
     * 
     * @param bool $checked Новое состояние
     * @return self Для цепочки вызовов
     */
    public function setChecked(bool $checked): self;
    
    /**
     * Получить метку чекбокса
     * 
     * @return string Текст метки
     */
    public function getLabel(): string;
    
    /**
     * Установить метку чекбокса
     * 
     * @param string $label Новая метка
     * @return self Для цепочки вызовов
     */
    public function setLabel(string $label): self;
    
    /**
     * Получить стиль чекбокса (специфичный для каждой ОС)
     * 
     * @return string Описание стиля
     */
    public function getStyle(): string;
}
