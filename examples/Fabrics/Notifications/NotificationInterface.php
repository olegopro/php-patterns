<?php

/**
 * Интерфейс для всех типов уведомлений
 * 
 * Определяет единый контракт для отправки уведомлений
 * независимо от способа доставки (email, SMS, push)
 */
interface NotificationInterface
{
    /**
     * Отправка уведомления
     * 
     * @param string $message Текст сообщения
     * @param string $recipient Получатель (email, телефон, device_id)
     * @return bool Результат отправки
     */
    public function send(string $message, string $recipient): bool;
    
    /**
     * Получение типа уведомления
     * 
     * @return string Тип уведомления
     */
    public function getType(): string;
}
