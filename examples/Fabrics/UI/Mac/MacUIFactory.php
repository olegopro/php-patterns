<?php

require_once '../Interfaces/UIFactoryInterface.php';
require_once 'MacButton.php';
require_once 'MacCheckbox.php';

/**
 * Конкретная фабрика для создания Mac UI компонентов
 * 
 * Это вторая конкретная фабрика паттерна "Абстрактная фабрика".
 * Создает СЕМЕЙСТВО связанных объектов (все компоненты для macOS)
 * и гарантирует их совместимость между собой.
 */
class MacUIFactory implements UIFactoryInterface
{
    private string $version;
    
    public function __construct(string $version = '13.0')
    {
        $this->version = $version;
    }
    
    /**
     * Создать кнопку для Mac
     * 
     * @param string $text Текст кнопки
     * @return ButtonInterface Mac кнопка
     */
    public function createButton(string $text = 'OK'): ButtonInterface
    {
        $button = new MacButton($text);
        
        // Можно добавить Mac-специфичную настройку
        // Например, применить тему macOS Big Sur/Ventura
        
        return $button;
    }
    
    /**
     * Создать чекбокс для Mac
     * 
     * @param string $label Метка чекбокса
     * @param bool $checked Начальное состояние
     * @return CheckboxInterface Mac чекбокс
     */
    public function createCheckbox(string $label = 'Опция', bool $checked = false): CheckboxInterface
    {
        $checkbox = new MacCheckbox($label, $checked);
        
        // Можно добавить Mac-специфичную настройку
        // Например, применить стиль Human Interface Guidelines
        
        return $checkbox;
    }
    
    /**
     * Получить название платформы
     */
    public function getPlatformName(): string
    {
        return 'Apple macOS';
    }
    
    /**
     * Получить версию UI компонентов
     */
    public function getUIVersion(): string
    {
        return $this->version;
    }
    
    /**
     * Получить список поддерживаемых компонентов
     */
    public function getSupportedComponents(): array
    {
        return [
            'Button',
            'Checkbox',
            // В будущем можно добавить:
            // 'TextField',
            // 'PopUpButton',
            // 'SegmentedControl'
        ];
    }
    
    /**
     * Создать полный набор компонентов для формы
     * 
     * Демонстрирует создание семейства связанных объектов
     * 
     * @param array $config Конфигурация формы
     * @return array Массив UI компонентов
     */
    public function createFormComponents(array $config = []): array
    {
        $components = [];
        
        // Создаем кнопки
        $components['submit_button'] = $this->createButton($config['submit_text'] ?? 'Отправить');
        $components['cancel_button'] = $this->createButton($config['cancel_text'] ?? 'Отмена');
        
        // Создаем чекбоксы
        $components['agree_checkbox'] = $this->createCheckbox(
            $config['agree_text'] ?? 'Согласен с условиями',
            $config['agree_checked'] ?? false
        );
        $components['newsletter_checkbox'] = $this->createCheckbox(
            $config['newsletter_text'] ?? 'Подписаться на рассылку',
            $config['newsletter_checked'] ?? false
        );
        
        return $components;
    }
    
    /**
     * Получить информацию о Mac специфичных особенностях фабрики
     */
    public function getMacFactoryInfo(): array
    {
        return [
            'design_system' => 'Human Interface Guidelines',
            'theme_support' => ['Light', 'Dark', 'Auto (System)'],
            'accessibility' => 'VoiceOver and Switch Control',
            'framework_compatibility' => ['SwiftUI', 'AppKit', 'Catalyst'],
            'created_components' => $this->getSupportedComponents()
        ];
    }
}
