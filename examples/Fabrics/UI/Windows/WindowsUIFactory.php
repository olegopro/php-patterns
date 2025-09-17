<?php

require_once '../Interfaces/UIFactoryInterface.php';
require_once 'WindowsButton.php';
require_once 'WindowsCheckbox.php';

/**
 * Конкретная фабрика для создания Windows UI компонентов
 * 
 * Это ключевой класс паттерна "Абстрактная фабрика".
 * Создает СЕМЕЙСТВО связанных объектов (все компоненты для Windows)
 * и гарантирует их совместимость между собой.
 */
class WindowsUIFactory implements UIFactoryInterface
{
    private string $version;
    
    public function __construct(string $version = '11.0')
    {
        $this->version = $version;
    }
    
    /**
     * Создать кнопку для Windows
     * 
     * @param string $text Текст кнопки
     * @return ButtonInterface Windows кнопка
     */
    public function createButton(string $text = 'OK'): ButtonInterface
    {
        $button = new WindowsButton($text);
        
        // Можно добавить Windows-специфичную настройку
        // Например, применить тему Windows 11
        
        return $button;
    }
    
    /**
     * Создать чекбокс для Windows
     * 
     * @param string $label Метка чекбокса
     * @param bool $checked Начальное состояние
     * @return CheckboxInterface Windows чекбокс
     */
    public function createCheckbox(string $label = 'Опция', bool $checked = false): CheckboxInterface
    {
        $checkbox = new WindowsCheckbox($label, $checked);
        
        // Можно добавить Windows-специфичную настройку
        // Например, применить стиль Fluent Design
        
        return $checkbox;
    }
    
    /**
     * Получить название платформы
     */
    public function getPlatformName(): string
    {
        return 'Microsoft Windows';
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
            // 'TextBox',
            // 'DropDown',
            // 'RadioButton'
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
     * Получить информацию о Windows специфичных особенностях фабрики
     */
    public function getWindowsFactoryInfo(): array
    {
        return [
            'design_system' => 'Fluent Design System',
            'theme_support' => ['Light', 'Dark', 'High Contrast'],
            'accessibility' => 'WCAG 2.1 AA compliant',
            'framework_compatibility' => ['WinUI 3', 'WPF', 'UWP'],
            'created_components' => $this->getSupportedComponents()
        ];
    }
}
