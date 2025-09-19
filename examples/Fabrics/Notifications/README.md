# 🔔 Простой пример - Фабрика уведомлений

Простая и понятная демонстрация паттерна **Factory Method** на примере создания различных типов уведомлений.

## 📁 Структура примера

```
Notifications/
├── NotificationInterface.php    # Интерфейс для всех уведомлений
├── EmailNotification.php        # Email уведомления
├── SmsNotification.php          # SMS уведомления
├── PushNotification.php         # Push уведомления
├── NotificationFactory.php      # Фабрика (паттерн Factory Method)
├── index.php                    # Демонстрация работы
└── README.md                    # Этот файл
```

## 🎯 Суть паттерна Factory Method

**Задача:** Создавать объекты разных типов через единый интерфейс, не указывая конкретные классы в коде клиента.

**Решение:** Фабрика принимает тип объекта и возвращает нужную реализацию.

## 🚀 Простое использование

```php
// Создаем фабрику
$factory = new NotificationFactory();

// Создаем разные типы уведомлений
$email = $factory->create('email');
$sms = $factory->create('sms');
$push = $factory->create('push');

// Отправляем уведомления
$email->send('Добро пожаловать!', 'user@example.com');
$sms->send('Код: 1234', '+7 999 123 45 67');
$push->send('Новое сообщение!', 'device_token_123');
```

## ✅ Преимущества этого подхода

1. **Простота** - код легко понять даже новичку
2. **Единообразие** - все уведомления имеют одинаковый интерфейс
3. **Расширяемость** - легко добавить Telegram, WhatsApp и т.д.
4. **Безопасность** - обработка неподдерживаемых типов
5. **Читаемость** - код выражает намерения, а не детали реализации

## 🔧 Как добавить новый тип уведомления

### Шаг 1: Создать класс уведомления
```php
class TelegramNotification implements NotificationInterface
{
    public function send(string $message, string $recipient): bool
    {
        // Логика отправки через Telegram API
        return true;
    }
    
    public function getType(): string
    {
        return 'telegram';
    }
}
```

### Шаг 2: Добавить в фабрику
```php
public function create(string $type): NotificationInterface
{
    return match (strtolower($type)) {
        'email'    => new EmailNotification(),
        'sms'      => new SmsNotification(),
        'push'     => new PushNotification(),
        'telegram' => new TelegramNotification(), // Новый тип
        default    => throw new InvalidArgumentException("Неподдерживаемый тип: {$type}")
    };
}
```

### Шаг 3: Обновить список поддерживаемых типов
```php
public function getSupportedTypes(): array
{
    return ['email', 'sms', 'push', 'telegram']; // Добавить новый тип
}
```

**Готово!** Новый тип уведомления работает без изменения существующего кода.

## 🧪 Запуск демонстрации

```bash
php index.php
```

## 📊 Сравнение с примером Provider

| Критерий | Notifications | Provider |
|----------|---------------|----------|
| Файлов | 7 | 7 |
| Сложность | Простая | Избыточная |
| Понятность | Высокая | Низкая |
| Фокус | На паттерне | На деталях |
| Применимость | Реальная задача | Абстрактная |
| Обучение | Быстрое | Долгое |

## 🎓 Что изучается

- **Factory Method** - основной паттерн проектирования
- **Полиморфизм** - разные реализации одного интерфейса
- **Инкапсуляция** - скрытие деталей создания объектов
- **Расширяемость** - добавление новых типов без изменения существующего кода
- **Обработка ошибок** - валидация входных данных

---

**Автор:** Система демонстрации паттернов проектирования  
**Версия:** 1.0  
**PHP:** 8.0+  
**Сложность:** Начальная ⭐
