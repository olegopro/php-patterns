<?php

/**
 * Демонстрация работы фабрики сервисов для API провайдеров
 * 
 * Этот файл показывает практическое использование паттерна Factory
 * для работы с различными API провайдерами данных
 */

// Подключаем все необходимые файлы
require_once 'DataProvidersEnum.php';
require_once 'Interfaces.php';
require_once 'FirstDebugDataService.php';
require_once 'SecondDebugDataService.php';
require_once 'ServiceFactory.php';
require_once 'TestDataQuery.php';

echo "🔧 Сложный пример с разбором - Фабрика сервисов для работы с разными API провайдерами\n";
echo str_repeat("=", 80) . "\n";

// Создаем фабрику сервисов
$serviceFactory = new ServiceFactory();

echo "\n📋 Доступные провайдеры:\n";
$supportedProviders = $serviceFactory->getSupportedProviders();
foreach ($supportedProviders as $provider) {
    echo "- {$provider->name}\n";
}
echo "\n";

// Создаем тестовый запрос
$testQuery = new TestDataQuery(
    ['user_id' => 123, 'data_type' => 'debug'], 
    'test'
);

echo "🔍 Тестовый запрос:\n";
print_r($testQuery->myQueryMethod());
echo "\n";

echo "🚀 Демонстрация работы с разными провайдерами:\n";
echo str_repeat("-", 50) . "\n";

// Пример 1: Работа с первым провайдером
echo "\n📡 Первый провайдер (OAuth + JSON):\n";
try {
    $firstService = $serviceFactory->getDebugDataServiceInstance(
        DataProvidersEnum::FIRST_DATA_PROVIDER
    );
    
    echo "Сервис создан: " . get_class($firstService) . "\n";
    
    $firstResult = $firstService->fetchTestData($testQuery);
    echo "Результат:\n";
    print_r($firstResult);
    echo "\n";
    
} catch (Exception $e) {
    echo "❌ Ошибка: " . $e->getMessage() . "\n";
}

// Пример 2: Работа со вторым провайдером
echo "\n🔑 Второй провайдер (API Key + XML):\n";
try {
    $secondService = $serviceFactory->getDebugDataServiceInstance(
        DataProvidersEnum::SECOND_DATA_PROVIDER
    );
    
    echo "Сервис создан: " . get_class($secondService) . "\n";
    
    $secondResult = $secondService->fetchTestData($testQuery);
    echo "Результат:\n";
    print_r($secondResult);
    echo "\n";
    
} catch (Exception $e) {
    echo "❌ Ошибка: " . $e->getMessage() . "\n";
}

// Пример 3: Попытка использовать неподдерживаемый провайдер
echo "\n❌ Неподдерживаемый провайдер:\n";
try {
    $unsupportedService = $serviceFactory->getDebugDataServiceInstance(
        DataProvidersEnum::NOT_SUPPORTED_DATA_PROVIDER
    );
} catch (Exception $e) {
    echo "⚠️ Ожидаемая ошибка: " . $e->getMessage() . "\n";
}

// Пример 4: Проверка поддержки провайдеров
echo "\n✅ Проверка поддержки провайдеров:\n";
$providersToCheck = [
    DataProvidersEnum::FIRST_DATA_PROVIDER,
    DataProvidersEnum::SECOND_DATA_PROVIDER,
    DataProvidersEnum::NOT_SUPPORTED_DATA_PROVIDER
];

foreach ($providersToCheck as $provider) {
    $isSupported = $serviceFactory->isProviderSupported($provider);
    $status = $isSupported ? '✅ Поддерживается' : '❌ Не поддерживается';
    echo $provider->name . ": " . $status . "\n";
}

// Пример 5: Работа с разными типами запросов
echo "\n🔄 Разные типы запросов:\n";
$queryTypes = ['test', 'debug', 'production'];

foreach ($queryTypes as $type) {
    echo "\nТип запроса: " . $type . "\n";
    echo str_repeat("-", 20) . "\n";
    
    $query = new TestDataQuery(['param' => 'value_' . $type], $type);
    $result = $query->myQueryMethod();
    
    print_r($result);
    echo "\n";
}

// Пример 6: Цепочка вызовов для TestDataQuery
echo "\n🔗 Цепочка вызовов TestDataQuery:\n";
$chainQuery = (new TestDataQuery())
    ->setQueryType('debug')
    ->setParameters(['chain' => true, 'step' => 1]);

echo "Параметры: ";
print_r($chainQuery->getParameters());
echo "Тип: " . $chainQuery->getQueryType() . "\n";
echo "Результат:\n";
print_r($chainQuery->myQueryMethod());
echo "\n";

echo str_repeat("=", 80) . "\n";
echo "📊 Итоги демонстрации:\n";
echo "- ✅ Фабрика успешно создает сервисы для поддерживаемых провайдеров\n";
echo "- ✅ Каждый сервис имеет свою специфичную реализацию\n";
echo "- ✅ Обработка ошибок для неподдерживаемых провайдеров\n";
echo "- ✅ Гибкая система запросов с разными типами\n";
echo "- ✅ Проверка поддержки провайдеров\n";
echo "- ✅ Цепочка вызовов для удобства использования\n";
echo "\n🎯 Паттерн Factory успешно реализован и продемонстрирован!\n";

?>