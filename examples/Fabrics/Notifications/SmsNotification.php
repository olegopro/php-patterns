<?php

require_once 'NotificationInterface.php';

/**
 * Реализация SMS уведомлений
 * 
 * Отправляет короткие текстовые сообщения на мобильные телефоны
 */
class SmsNotification implements NotificationInterface
{
    /**
     * Отправка SMS уведомления
     * 
     * @param string $message Текст сообщения
     * @param string $recipient Номер телефона получателя
     * @return bool Результат отправки
     */
    public function send(string $message, string $recipient): bool
    {
        // В реальном приложении здесь был бы код отправки SMS
        // Например, через Twilio, SMS.ru, или другой SMS-провайдер
        
        echo "📱 SMS уведомление отправлено!\n";
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
        return 'sms';
    }
}
