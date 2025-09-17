<?php

require_once '../Interfaces/ButtonInterface.php';

/**
 * Кнопка в стиле Mac (macOS)
 * 
 * Реализует интерфейс ButtonInterface для создания
 * кнопки со специфичным для macOS внешним видом и поведением
 */
class MacButton implements ButtonInterface
{
    private string $text;
    private bool $isEnabled;
    
    public function __construct(string $text = 'OK')
    {
        $this->text = $text;
        $this->isEnabled = true;
    }
    
    /**
     * Отрисовать кнопку в стиле Mac
     */
    public function render(): string
    {
        $style = $this->getStyle();
        $status = $this->isEnabled ? 'enabled' : 'disabled';
        
        return "[Mac Button: '{$this->text}' | Style: {$style} | Status: {$status}]";
    }
    
    /**
     * Обработать клик в стиле Mac
     */
    public function onClick(): string
    {
        if (!$this->isEnabled) {
            return "Mac Button '{$this->text}': Кнопка отключена";
        }
        
        return "Mac Button '{$this->text}': *тихий клик macOS* Кнопка нажата с анимацией!";
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
     * Получить стиль кнопки Mac
     */
    public function getStyle(): string
    {
        return 'Округлая кнопка с градиентом, цвет: #007AFF (синий Apple)';
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
     * Получить информацию о Mac специфичных особенностях
     */
    public function getMacFeatures(): array
    {
        return [
            'design_language' => 'Human Interface Guidelines',
            'animation' => 'CoreAnimation with spring physics',
            'accessibility' => 'VoiceOver compatible',
            'haptic_feedback' => true,
            'trackpad_support' => 'Force Touch'
        ];
    }
}
