<?php

require_once 'NotificationInterface.php';

/**
 * Реализация уведомлений по email
 * 
 * Отправляет уведомления на электронную почту
 */
class EmailNotification implements NotificationInterface
{
    /**
     * Отправка email уведомления
     * 
     * @param string $message Текст сообщения
     * @param string $recipient Email получателя
     * @return bool Результат отправки
     */
    public function send(string $message, string $recipient): bool
    {
        // В реальном приложении здесь был бы код отправки email
        // Например, через PHPMailer, SwiftMailer или встроенную функцию mail()
        
        echo "📧 Email уведомление отправлено!\n";
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
        return 'email';
    }
}
