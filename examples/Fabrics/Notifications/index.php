<?php

/**
 * Демонстрация работы фабрики уведомлений
 * 
 * Простой и понятный пример использования паттерна Factory Method
 * для создания различных типов уведомлений
 */

require_once 'NotificationFactory.php';

echo "🔔 Простой пример - Фабрика уведомлений\n";
echo str_repeat("=", 60) . "\n\n";

// Создаем фабрику
$factory = new NotificationFactory();

echo "📋 Поддерживаемые типы уведомлений:\n";
foreach ($factory->getSupportedTypes() as $type) {
    echo "- {$type}\n";
}
echo "\n";

echo "🚀 Демонстрация работы:\n";
echo str_repeat("-", 40) . "\n\n";

// Пример 1: Email уведомление
echo "1️⃣ Email уведомление:\n";
try {
    $emailNotification = $factory->create('email');
    $emailNotification->send(
        'Добро пожаловать на наш сайт!', 
        'user@example.com'
    );
} catch (Exception $e) {
    echo "❌ Ошибка: " . $e->getMessage() . "\n";
}

// Пример 2: SMS уведомление
echo "2️⃣ SMS уведомление:\n";
try {
    $smsNotification = $factory->create('sms');
    $smsNotification->send(
        'Ваш код подтверждения: 1234', 
        '+7 (999) 123-45-67'
    );
} catch (Exception $e) {
    echo "❌ Ошибка: " . $e->getMessage() . "\n";
}

// Пример 3: Push уведомление
echo "3️⃣ Push уведомление:\n";
try {
    $pushNotification = $factory->create('push');
    $pushNotification->send(
        'У вас новое сообщение!', 
        'device_token_abc123'
    );
} catch (Exception $e) {
    echo "❌ Ошибка: " . $e->getMessage() . "\n";
}

// Пример 4: Попытка создать неподдерживаемый тип
echo "4️⃣ Неподдерживаемый тип:\n";
try {
    $telegramNotification = $factory->create('telegram');
} catch (Exception $e) {
    echo "⚠️ Ожидаемая ошибка: " . $e->getMessage() . "\n\n";
}

// Пример 5: Проверка поддержки типов
echo "5️⃣ Проверка поддержки типов:\n";
$typesToCheck = ['email', 'sms', 'push', 'telegram', 'whatsapp'];

foreach ($typesToCheck as $type) {
    $status = $factory->isSupported($type) ? '✅ Поддерживается' : '❌ Не поддерживается';
    echo "   {$type}: {$status}\n";
}
echo "\n";

// Пример 6: Массовая отправка разных уведомлений
echo "6️⃣ Массовая отправка:\n";
$notifications = [
    ['type' => 'email', 'message' => 'Новый заказ оформлен', 'recipient' => 'admin@shop.com'],
    ['type' => 'sms', 'message' => 'Заказ готов к выдаче', 'recipient' => '+7 900 123 45 67'],
    ['type' => 'push', 'message' => 'Скидка 20% на все товары!', 'recipient' => 'user_device_123']
];

foreach ($notifications as $notificationData) {
    try {
        $notification = $factory->create($notificationData['type']);
        echo "   Тип: {$notification->getType()}\n";
        $notification->send(
            $notificationData['message'], 
            $notificationData['recipient']
        );
    } catch (Exception $e) {
        echo "   ❌ Ошибка: " . $e->getMessage() . "\n";
    }
}

echo str_repeat("=", 60) . "\n";
echo "📊 Итоги демонстрации:\n";
echo "✅ Фабрика создает нужные типы уведомлений\n";
echo "✅ Единый интерфейс для всех типов\n";
echo "✅ Легко добавлять новые типы уведомлений\n";
echo "✅ Обработка ошибок для неподдерживаемых типов\n";
echo "✅ Проверка поддержки типов\n";
echo "✅ Простота использования\n\n";
echo "🎯 Паттерн Factory Method - простой и эффективный!\n";

?>
