<?php

require_once '../Interfaces/CheckboxInterface.php';

/**
 * Чекбокс в стиле Windows
 * 
 * Реализует интерфейс CheckboxInterface для создания
 * чекбокса со специфичным для Windows внешним видом и поведением
 */
class WindowsCheckbox implements CheckboxInterface
{
    private string $label;
    private bool $checked;
    private bool $isEnabled;
    
    public function __construct(string $label = 'Опция', bool $checked = false)
    {
        $this->label = $label;
        $this->checked = $checked;
        $this->isEnabled = true;
    }
    
    /**
     * Отрисовать чекбокс в стиле Windows
     */
    public function render(): string
    {
        $style = $this->getStyle();
        $status = $this->checked ? '☑' : '☐';
        $enabledStatus = $this->isEnabled ? 'enabled' : 'disabled';
        
        return "[Windows Checkbox: {$status} {$this->label} | Style: {$style} | Status: {$enabledStatus}]";
    }
    
    /**
     * Переключить состояние чекбокса
     */
    public function toggle(): string
    {
        if (!$this->isEnabled) {
            return "Windows Checkbox '{$this->label}': Чекбокс отключен";
        }
        
        $this->checked = !$this->checked;
        $state = $this->checked ? 'отмечен' : 'снят';
        
        return "Windows Checkbox '{$this->label}': *звук Windows переключения* Чекбокс {$state}!";
    }
    
    /**
     * Проверить, отмечен ли чекбокс
     */
    public function isChecked(): bool
    {
        return $this->checked;
    }
    
    /**
     * Установить состояние чекбокса
     */
    public function setChecked(bool $checked): self
    {
        $this->checked = $checked;
        return $this;
    }
    
    /**
     * Получить метку чекбокса
     */
    public function getLabel(): string
    {
        return $this->label;
    }
    
    /**
     * Установить метку чекбокса
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }
    
    /**
     * Получить стиль чекбокса Windows
     */
    public function getStyle(): string
    {
        return 'Квадратный чекбокс с галочкой, цвет: #0078D4 (синий Windows)';
    }
    
    /**
     * Установить состояние доступности
     */
    public function setEnabled(bool $enabled): self
    {
        $this->isEnabled = $enabled;
        return $this;
    }
    
    /**
     * Проверить, включен ли чекбокс
     */
    public function isEnabled(): bool
    {
        return $this->isEnabled;
    }
    
    /**
     * Получить информацию о Windows специфичных особенностях
     */
    public function getWindowsFeatures(): array
    {
        return [
            'theme' => 'Fluent Design',
            'animation' => 'Smooth check animation',
            'accessibility' => 'Screen reader compatible',
            'keyboard_support' => 'Space to toggle'
        ];
    }
}
