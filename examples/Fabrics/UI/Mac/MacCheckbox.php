<?php

require_once '../Interfaces/CheckboxInterface.php';

/**
 * Чекбокс в стиле Mac (macOS)
 * 
 * Реализует интерфейс CheckboxInterface для создания
 * чекбокса со специфичным для macOS внешним видом и поведением
 */
class MacCheckbox implements CheckboxInterface
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
     * Отрисовать чекбокс в стиле Mac
     */
    public function render(): string
    {
        $style = $this->getStyle();
        $status = $this->checked ? '✓' : '○';
        $enabledStatus = $this->isEnabled ? 'enabled' : 'disabled';
        
        return "[Mac Checkbox: {$status} {$this->label} | Style: {$style} | Status: {$enabledStatus}]";
    }
    
    /**
     * Переключить состояние чекбокса
     */
    public function toggle(): string
    {
        if (!$this->isEnabled) {
            return "Mac Checkbox '{$this->label}': Чекбокс отключен";
        }
        
        $this->checked = !$this->checked;
        $state = $this->checked ? 'отмечен' : 'снят';
        
        return "Mac Checkbox '{$this->label}': *плавная анимация macOS* Чекбокс {$state} с haptic feedback!";
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
     * Получить стиль чекбокса Mac
     */
    public function getStyle(): string
    {
        return 'Круглый чекбокс с галочкой, цвет: #007AFF (синий Apple)';
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
     * Получить информацию о Mac специфичных особенностях
     */
    public function getMacFeatures(): array
    {
        return [
            'design_language' => 'Human Interface Guidelines',
            'animation' => 'Core Animation with smooth transitions',
            'accessibility' => 'VoiceOver and Switch Control compatible',
            'haptic_feedback' => 'Subtle tactile response',
            'dark_mode' => 'Automatic adaptation'
        ];
    }
}
