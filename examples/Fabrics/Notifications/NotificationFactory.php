<?php

require_once 'NotificationInterface.php';
require_once 'EmailNotification.php';
require_once 'SmsNotification.php';
require_once 'PushNotification.php';

/**
 * Фабрика уведомлений
 * 
 * Реализует паттерн Factory Method для создания различных типов уведомлений.
 * Инкапсулирует логику создания объектов и скрывает детали реализации от клиента.
 */
class NotificationFactory
{
    /**
     * Создание уведомления по типу
     * 
     * @param string $type Тип уведомления ('email', 'sms', 'push')
     * @return NotificationInterface Экземпляр уведомления
     * @throws InvalidArgumentException При неподдерживаемом типе
     */
    public function create(string $type): NotificationInterface
    {
        return match (strtolower($type)) {
            'email' => new EmailNotification(),
            'sms'   => new SmsNotification(),
            'push'  => new PushNotification(),
            default => throw new InvalidArgumentException("Неподдерживаемый тип уведомления: {$type}")
        };
    }
    
    /**
     * Получение списка поддерживаемых типов уведомлений
     * 
     * @return array Массив доступных типов
     */
    public function getSupportedTypes(): array
    {
        return ['email', 'sms', 'push'];
    }
    
    /**
     * Проверка поддержки типа уведомления
     * 
     * @param string $type Тип уведомления для проверки
     * @return bool True если тип поддерживается
     */
    public function isSupported(string $type): bool
    {
        return in_array(strtolower($type), $this->getSupportedTypes());
    }
}
