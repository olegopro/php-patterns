<?php

/**
 * Демонстрация паттерна "Абстрактная фабрика"
 * 
 * Показывает создание СЕМЕЙСТВ связанных объектов
 * и разницу с обычным фабричным методом
 */

require_once 'Interfaces/FurnitureFactoryInterface.php';
require_once 'Modern/ModernFurnitureFactory.php';
require_once 'Classic/ClassicFurnitureFactory.php';

echo "🏠 Паттерн \"Абстрактная фабрика\" - Семейства мебели\n";
echo str_repeat("=", 70) . "\n\n";

echo "💡 КЛЮЧЕВАЯ ИДЕЯ: Абстрактная фабрика создает СЕМЕЙСТВА связанных объектов!\n\n";

// Демонстрация создания семейств мебели
echo "🎯 Создание семейств мебели:\n";
echo str_repeat("-", 50) . "\n\n";

// Создаем фабрики для разных стилей
$modernFactory = new ModernFurnitureFactory();
$classicFactory = new ClassicFurnitureFactory();

echo "1️⃣ Модерновое семейство:\n";
echo "Фабрика: " . $modernFactory->getStyleName() . "\n";

$modernTable = $modernFactory->createTable();
$modernChair = $modernFactory->createChair();

echo $modernTable->render();
echo $modernChair->render();

echo "2️⃣ Классическое семейство:\n";
echo "Фабрика: " . $classicFactory->getStyleName() . "\n";

$classicTable = $classicFactory->createTable();
$classicChair = $classicFactory->createChair();

echo $classicTable->render();
echo $classicChair->render();

// Демонстрация связности семейства
echo "🔗 СВЯЗНОСТЬ СЕМЕЙСТВА - ключевое преимущество:\n";
echo str_repeat("-", 50) . "\n";

function showFamilyCompatibility(FurnitureFactoryInterface $factory)
{
    $table = $factory->createTable();
    $chair = $factory->createChair();
    
    echo "Фабрика: {$factory->getStyleName()}\n";
    echo "Стол: {$table->getStyle()} - {$table->getMaterial()}\n";
    echo "Стул: {$chair->getStyle()} - {$chair->getMaterial()}\n";
    echo "✅ Совместимость: " . ($table->getStyle() === $chair->getStyle() ? "ИДЕАЛЬНАЯ" : "НЕТ") . "\n\n";
}

showFamilyCompatibility($modernFactory);
showFamilyCompatibility($classicFactory);

// Демонстрация полиморфизма
echo "🔄 ПОЛИМОРФИЗМ - легкая замена семейств:\n";
echo str_repeat("-", 50) . "\n";

function createRoom(FurnitureFactoryInterface $factory, string $roomName)
{
    echo "Обустройство комнаты '{$roomName}' в стиле {$factory->getStyleName()}:\n";
    
    $table = $factory->createTable();
    $chair1 = $factory->createChair();
    $chair2 = $factory->createChair();
    
    echo "  📦 Добавлен: {$table->getStyle()} стол\n";
    echo "  📦 Добавлен: {$chair1->getStyle()} стул #1\n";
    echo "  📦 Добавлен: {$chair2->getStyle()} стул #2\n";
    echo "  ✨ Итог: Все предметы в едином стиле!\n\n";
}

// Одна функция - разные стили!
createRoom($modernFactory, "Гостиная");
createRoom($classicFactory, "Кабинет");

// Демонстрация создания полных наборов
echo "📦 СОЗДАНИЕ ПОЛНЫХ НАБОРОВ МЕБЕЛИ:\n";
echo str_repeat("-", 50) . "\n";

$modernSet = $modernFactory->createDiningSet(6);
echo "Модерновый набор:\n";
echo "📝 {$modernSet['description']}\n";
echo "🎨 Стиль: {$modernSet['style']}\n";
echo "📊 Всего предметов: {$modernSet['total_items']}\n";
echo "🪑 Количество стульев: " . count($modernSet['chairs']) . "\n\n";

$classicSet = $classicFactory->createDiningSet(4);
echo "Классический набор:\n";
echo "📝 {$classicSet['description']}\n";
echo "🎨 Стиль: {$classicSet['style']}\n";
echo "📊 Всего предметов: {$classicSet['total_items']}\n";
echo "🪑 Количество стульев: " . count($classicSet['chairs']) . "\n\n";

// Сравнение с фабричным методом
echo "⚖️ СРАВНЕНИЕ ПАТТЕРНОВ:\n";
echo str_repeat("-", 50) . "\n";

echo "🔸 Фабричный метод (из примера уведомлений):\n";
echo "   \$notification = \$factory->create('email'); // ОДИН объект\n";
echo "   Результат: EmailNotification\n\n";

echo "🔸 Абстрактная фабрика (мебель):\n";
echo "   \$table = \$factory->createTable(); // СЕМЕЙСТВО\n";
echo "   \$chair = \$factory->createChair(); // объектов\n";
echo "   Результат: ModernTable + ModernChair (сочетаются!)\n\n";

// Практический пример использования
echo "🛠️ ПРАКТИЧЕСКОЕ ПРИМЕНЕНИЕ:\n";
echo str_repeat("-", 50) . "\n";

function furnishOffice(FurnitureFactoryInterface $factory, string $officeType)
{
    echo "Обустройство офиса '{$officeType}':\n";
    
    // Переговорная
    $meetingSet = $factory->createDiningSet(8);
    echo "  📋 Переговорная: {$meetingSet['total_items']} предметов в стиле {$factory->getStyleName()}\n";
    
    // Рабочие места
    for ($i = 1; $i <= 3; $i++) {
        $workTable = $factory->createTable();
        $workChair = $factory->createChair();
        echo "  💼 Рабочее место #{$i}: {$workTable->getStyle()} стол + {$workChair->getStyle()} стул\n";
    }
    
    echo "  ✅ Весь офис в едином стиле {$factory->getStyleName()}!\n\n";
}

furnishOffice($modernFactory, "IT-компания");
furnishOffice($classicFactory, "Юридическая фирма");

echo str_repeat("=", 70) . "\n";
echo "📊 ИТОГИ ДЕМОНСТРАЦИИ:\n";
echo "✅ Абстрактная фабрика создает СЕМЕЙСТВА объектов\n";
echo "✅ Все объекты семейства гарантированно совместимы\n";
echo "✅ Легко переключаться между семействами (модерн ↔ классика)\n";
echo "✅ Единый интерфейс для создания разных семейств\n";
echo "✅ Расширяемость: легко добавить новые стили (лофт, прованс)\n\n";

echo "🎯 Абстрактная фабрика = Factory Method + семейства связанных объектов!\n";

?>
