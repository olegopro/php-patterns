<?php

require_once '../Interfaces/ButtonInterface.php';

/**
 * Кнопка в стиле Windows
 * 
 * Реализует интерфейс ButtonInterface для создания
 * кнопки со специфичным для Windows внешним видом и поведением
 */
class WindowsButton implements ButtonInterface
{
    private string $text;
    private bool $isEnabled;
    
    public function __construct(string $text = 'OK')
    {
        $this->text = $text;
        $this->isEnabled = true;
    }
    
    /**
     * Отрисовать кнопку в стиле Windows
     */
    public function render(): string
    {
        $style = $this->getStyle();
        $status = $this->isEnabled ? 'enabled' : 'disabled';
        
        return "[Windows Button: '{$this->text}' | Style: {$style} | Status: {$status}]";
    }
    
    /**
     * Обработать клик в стиле Windows
     */
    public function onClick(): string
    {
        if (!$this->isEnabled) {
            return "Windows Button '{$this->text}': Кнопка отключена";
        }
        
        return "Windows Button '{$this->text}': *звук Windows клика* Кнопка нажата!";
    }
    
    /**
     * Получить текст кнопки
     */
    public function getText(): string
    {
        return $this->text;
    }
    
    /**
     * Установить текст кнопки
     */
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }
    
    /**
     * Получить стиль кнопки Windows
     */
    public function getStyle(): string
    {
        return 'Плоская кнопка с тенью, цвет: #0078D4 (синий Windows)';
    }
    
    /**
     * Установить состояние кнопки
     */
    public function setEnabled(bool $enabled): self
    {
        $this->isEnabled = $enabled;
        return $this;
    }
    
    /**
     * Проверить, включена ли кнопка
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
            'animation' => 'Fade in/out',
            'accessibility' => 'NVDA compatible',
            'hotkey_support' => true
        ];
    }
}
