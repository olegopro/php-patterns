<?php

require_once 'ButtonInterface.php';
require_once 'CheckboxInterface.php';

/**
 * Абстрактная фабрика для создания семейств UI компонентов
 * 
 * Это основной интерфейс паттерна "Абстрактная фабрика".
 * Каждая конкретная фабрика должна реализовать этот интерфейс
 * и предоставить методы для создания ВСЕХ типов компонентов
 * своего семейства (платформы).
 */
interface UIFactoryInterface
{
    /**
     * Создать кнопку для конкретной платформы
     * 
     * @param string $text Текст кнопки
     * @return ButtonInterface Кнопка специфичная для платформы
     */
    public function createButton(string $text = 'OK'): ButtonInterface;
    
    /**
     * Создать чекбокс для конкретной платформы
     * 
     * @param string $label Метка чекбокса
     * @param bool $checked Начальное состояние
     * @return CheckboxInterface Чекбокс специфичный для платформы
     */
    public function createCheckbox(string $label = 'Опция', bool $checked = false): CheckboxInterface;
    
    /**
     * Получить название платформы
     * 
     * @return string Название платформы (Windows, Mac, etc.)
     */
    public function getPlatformName(): string;
    
    /**
     * Получить версию UI компонентов
     * 
     * @return string Версия библиотеки UI
     */
    public function getUIVersion(): string;
    
    /**
     * Получить список поддерживаемых компонентов
     * 
     * @return array Массив названий поддерживаемых компонентов
     */
    public function getSupportedComponents(): array;
}
