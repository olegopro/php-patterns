# 🔧 Сложный пример с разбором - Фабрика сервисов для работы с разными API провайдерами

Этот пример демонстрирует реализацию паттерна **Factory** для создания сервисов работы с различными API провайдерами данных. Система обеспечивает гибкость, расширяемость и единообразный интерфейс для работы с разнородными источниками данных.

## 📁 Структура проекта

```
Provider/
├── DataProvidersEnum.php      # Перечисление типов провайдеров
├── Interfaces.php             # Интерфейсы системы
├── FirstDebugDataService.php  # Первый провайдер (OAuth + JSON)
├── SecondDebugDataService.php # Второй провайдер (API Key + XML)
├── ServiceFactory.php         # Основная фабрика сервисов
├── TestDataQuery.php          # Реализация запросов
├── index.php                  # Демонстрация работы
└── README.md                  # Этот файл
```

## 🎯 Основные компоненты

### 1. DataProvidersEnum.php
**Назначение:** Типобезопасное перечисление доступных провайдеров данных.

```php
enum DataProvidersEnum: string
{
    case FIRST_DATA_PROVIDER = 'first_data_provider';
    case SECOND_DATA_PROVIDER = 'second_data_provider';
    case NOT_SUPPORTED_DATA_PROVIDER = 'not_supported_data_provider';
}
```

**Преимущества:**
- Типобезопасность на уровне языка
- Предотвращение ошибок с неверными строковыми значениями
- Автодополнение в IDE

### 2. Interfaces.php
**Назначение:** Определение контрактов для всех компонентов системы.

#### Интерфейсы:
- `ITestDataQuery` - Контракт для запросов к API
- `IDebugDataService` - Контракт для сервисов получения данных
- `IServiceFactory` - Контракт для фабрики сервисов

**Принципы:**
- Инверсия зависимостей (Dependency Inversion Principle)
- Разделение интерфейса (Interface Segregation Principle)

### 3. Конкретные реализации сервисов

#### FirstDebugDataService.php
**Особенности:**
- Аутентификация через OAuth
- Работа с JSON данными
- Специфичная обработка ошибок

#### SecondDebugDataService.php
**Особенности:**
- Аутентификация через API ключ
- Работа с XML данными
- Альтернативная логика обработки

### 4. ServiceFactory.php
**Назначение:** Центральная фабрика для создания экземпляров сервисов.

**Ключевые методы:**
- `getDebugDataServiceInstance()` - Создание сервиса по типу провайдера
- `getSupportedProviders()` - Получение списка поддерживаемых провайдеров
- `isProviderSupported()` - Проверка поддержки провайдера

**Паттерн:** Factory Method с использованием match expression (PHP 8+)

### 5. TestDataQuery.php
**Назначение:** Гибкая система формирования запросов к API.

**Возможности:**
- Различные типы запросов (test, debug, production)
- Цепочка вызовов (Fluent Interface)
- Генерация уникальных идентификаторов
- Контекстно-зависимые данные

## 🚀 Использование

### Базовый пример

```php
// Создание фабрики
$factory = new ServiceFactory();

// Создание сервиса для первого провайдера
$service = $factory->getDebugDataServiceInstance(
    DataProvidersEnum::FIRST_DATA_PROVIDER
);

// Создание запроса
$query = new TestDataQuery(['user_id' => 123], 'debug');

// Получение данных
$result = $service->fetchTestData($query);
```

### Проверка поддержки провайдера

```php
$factory = new ServiceFactory();

if ($factory->isProviderSupported(DataProvidersEnum::FIRST_DATA_PROVIDER)) {
    $service = $factory->getDebugDataServiceInstance(
        DataProvidersEnum::FIRST_DATA_PROVIDER
    );
    // Работа с сервисом
}
```

### Цепочка вызовов для запросов

```php
$result = (new TestDataQuery())
    ->setQueryType('production')
    ->setParameters(['timeout' => 30])
    ->myQueryMethod();
```

## 🏗️ Архитектурные принципы

### SOLID принципы

1. **Single Responsibility Principle (SRP)**
   - Каждый класс имеет одну ответственность
   - ServiceFactory только создает сервисы
   - Каждый сервис работает только со своим провайдером

2. **Open/Closed Principle (OCP)**
   - Система открыта для расширения (новые провайдеры)
   - Закрыта для модификации (существующий код не меняется)

3. **Liskov Substitution Principle (LSP)**
   - Все сервисы взаимозаменяемы через общий интерфейс

4. **Interface Segregation Principle (ISP)**
   - Интерфейсы разделены по функциональности

5. **Dependency Inversion Principle (DIP)**
   - Зависимость от абстракций, а не от конкретных реализаций

### Паттерны проектирования

- **Factory Method** - Создание объектов через фабрику
- **Strategy** - Различные стратегии для разных провайдеров
- **Fluent Interface** - Цепочка вызовов в TestDataQuery

## 🔧 Расширение системы

### Добавление нового провайдера

1. **Добавить в enum:**
```php
case THIRD_DATA_PROVIDER = 'third_data_provider';
```

2. **Создать реализацию сервиса:**
```php
class ThirdDebugDataService implements IDebugDataService
{
    // Реализация методов интерфейса
}
```

3. **Обновить фабрику:**
```php
DataProvidersEnum::THIRD_DATA_PROVIDER => new ThirdDebugDataService(),
```

### Добавление нового типа запроса

В методе `generateTestData()` класса `TestDataQuery` добавить новый case:

```php
case 'new_type':
    $queryData['new_type_data'] = $this->generateNewTypeData();
    break;
```

## 📊 Преимущества решения

### Гибкость
- Легкое добавление новых провайдеров
- Изменение логики без влияния на другие компоненты
- Поддержка различных протоколов аутентификации

### Надежность
- Типобезопасность через enum
- Обработка ошибок для неподдерживаемых провайдеров
- Валидация входных данных

### Поддерживаемость
- Четкое разделение ответственности
- Документированный код
- Следование принципам SOLID

### Тестируемость
- Зависимость от интерфейсов
- Возможность мокирования компонентов
- Изолированное тестирование каждого сервиса

## 🧪 Запуск демонстрации

1. Убедитесь, что у вас установлен PHP 8.1+
2. Откройте файл `index.php` в браузере
3. Изучите результаты работы различных провайдеров

## 📝 Логирование и отладка

Система включает встроенные механизмы отладки:
- Генерация уникальных ID запросов
- Временные метки
- Информация о памяти и производительности
- Детальные сообщения об ошибках

## 🔮 Возможные улучшения

1. **Кэширование результатов**
2. **Асинхронные запросы**
3. **Метрики и мониторинг**
4. **Конфигурация через файлы**
5. **Логирование в файлы**
6. **Retry механизмы**
7. **Rate limiting**

---

**Автор:** Система демонстрации паттерна Factory  
**Версия:** 1.0  
**PHP:** 8.1+  
**Лицензия:** MIT