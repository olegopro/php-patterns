<?php

require_once 'NotificationInterface.php';

/**
 * Реализация Push уведомлений
 * 
 * Отправляет push-уведомления на мобильные устройства и браузеры
 */
class PushNotification implements NotificationInterface
{
    /**
     * Отправка Push уведомления
     * 
     * @param string $message Текст сообщения
     * @param string $recipient Device ID или Push token получателя
     * @return bool Результат отправки
     */
    public function send(string $message, string $recipient): bool
    {
        // В реальном приложении здесь был бы код отправки push-уведомления
        // Например, через Firebase Cloud Messaging, Apple Push Notification service
        
        echo "🔔 Push уведомление отправлено!\n";
        echo "   Получатель: {$recipient}\n";
        echo "   Сообщение: {$message}\n";
        echo "   Время: " . date('Y-m-d H:i:s') . "\n";
        echo "   Статус: ✅ Доставлено\n\n";
        
        // Симуляция успешной отправки
        return true;
    }
    
    /**
     * Получение типа уведомления
     * 
     * @return string Тип уведомления
     */
    public function getType(): string
    {
        return 'push';
    }
}
