<?php

/**
 * Демонстрация паттерна "Абстрактная фабрика" для UI компонентов
 * 
 * Этот файл показывает ключевую особенность абстрактной фабрики:
 * создание СЕМЕЙСТВ связанных объектов, которые совместимы между собой
 */

// Подключаем все необходимые файлы
require_once 'Interfaces/UIFactoryInterface.php';
require_once 'Windows/WindowsUIFactory.php';
require_once 'Mac/MacUIFactory.php';

echo "🎨 Демонстрация паттерна \"Абстрактная фабрика\" для UI компонентов\n";
echo str_repeat("=", 80) . "\n\n";

/**
 * Функция для демонстрации работы фабрики
 * 
 * Принимает любую фабрику, реализующую UIFactoryInterface,
 * и создает с ее помощью набор компонентов
 */
function demonstrateUIFactory(UIFactoryInterface $factory, string $description): void
{
    echo "🖥️ {$description}\n";
    echo str_repeat("-", 50) . "\n";
    
    // Информация о фабрике
    echo "Платформа: {$factory->getPlatformName()}\n";
    echo "Версия UI: {$factory->getUIVersion()}\n";
    echo "Поддерживаемые компоненты: " . implode(', ', $factory->getSupportedComponents()) . "\n\n";
    
    // Создаем отдельные компоненты
    echo "📦 Создание отдельных компонентов:\n";
    
    $button = $factory->createButton('Нажми меня');
    echo "✓ Кнопка: {$button->render()}\n";
    echo "  Клик: {$button->onClick()}\n";
    echo "  Стиль: {$button->getStyle()}\n\n";
    
    $checkbox = $factory->createCheckbox('Включить уведомления', true);
    echo "✓ Чекбокс: {$checkbox->render()}\n";
    echo "  Переключение: {$checkbox->toggle()}\n";
    echo "  Стиль: {$checkbox->getStyle()}\n\n";
    
    // Создаем семейство компонентов для формы
    echo "📋 Создание семейства компонентов для формы:\n";
    $formComponents = $factory->createFormComponents([
        'submit_text' => 'Сохранить',
        'cancel_text' => 'Отмена',
        'agree_text' => 'Согласен с правилами',
        'agree_checked' => false,
        'newsletter_text' => 'Хочу получать новости',
        'newsletter_checked' => true
    ]);
    
    foreach ($formComponents as $name => $component) {
        echo "  - {$name}: {$component->render()}\n";
    }
    
    echo "\n" . str_repeat("═", 80) . "\n\n";
}

// Демонстрация 1: Windows UI Factory
echo "🔷 ДЕМОНСТРАЦИЯ 1: Windows UI компоненты\n\n";
$windowsFactory = new WindowsUIFactory('11.0');
demonstrateUIFactory($windowsFactory, "Создание Windows UI компонентов");

// Демонстрация 2: Mac UI Factory
echo "🔶 ДЕМОНСТРАЦИЯ 2: Mac UI компоненты\n\n";
$macFactory = new MacUIFactory('13.0');
demonstrateUIFactory($macFactory, "Создание Mac UI компонентов");

// Демонстрация 3: Сравнение результатов
echo "⚖️ ДЕМОНСТРАЦИЯ 3: Сравнение платформ\n";
echo str_repeat("-", 50) . "\n";

echo "Создаем одинаковые компоненты на разных платформах:\n\n";

$factories = [
    'Windows' => $windowsFactory,
    'Mac' => $macFactory
];

foreach ($factories as $platform => $factory) {
    echo "🖥️ {$platform}:\n";
    
    $btn = $factory->createButton('Тест');
    $chk = $factory->createCheckbox('Опция', false);
    
    echo "  Кнопка: {$btn->render()}\n";
    echo "  Чекбокс: {$chk->render()}\n\n";
}

// Демонстрация 4: Полиморфизм - работа с фабриками через общий интерфейс
echo "🔄 ДЕМОНСТРАЦИЯ 4: Полиморфизм и взаимозаменяемость\n";
echo str_repeat("-", 50) . "\n";

/**
 * Функция, которая работает с любой фабрикой
 * Демонстрирует полиморфизм - можно легко переключаться между платформами
 */
function createLoginForm(UIFactoryInterface $factory): array
{
    return [
        'username_label' => 'Имя пользователя',
        'password_label' => 'Пароль',
        'login_button' => $factory->createButton('Войти'),
        'cancel_button' => $factory->createButton('Отмена'),
        'remember_checkbox' => $factory->createCheckbox('Запомнить меня', false),
        'agree_checkbox' => $factory->createCheckbox('Согласен с условиями', false)
    ];
}

echo "Создаем форму входа для разных платформ:\n\n";

foreach ($factories as $platform => $factory) {
    echo "📱 Форма входа для {$platform}:\n";
    $loginForm = createLoginForm($factory);
    
    echo "  🔘 {$loginForm['login_button']->render()}\n";
    echo "  🔘 {$loginForm['cancel_button']->render()}\n";
    echo "  ☑️ {$loginForm['remember_checkbox']->render()}\n";
    echo "  ☑️ {$loginForm['agree_checkbox']->render()}\n\n";
}

// Демонстрация 5: Особенности каждой платформы
echo "🎯 ДЕМОНСТРАЦИЯ 5: Платформо-специфичные особенности\n";
echo str_repeat("-", 50) . "\n";

echo "Windows фабрика:\n";
print_r($windowsFactory->getWindowsFactoryInfo());
echo "\n";

echo "Mac фабрика:\n";
print_r($macFactory->getMacFactoryInfo());
echo "\n";

// Итоги
echo str_repeat("=", 80) . "\n";
echo "📊 ИТОГИ ДЕМОНСТРАЦИИ:\n";
echo "\n";
echo "🎯 Ключевые особенности паттерна \"Абстрактная фабрика\":\n";
echo "\n";
echo "1. ✅ СЕМЕЙСТВА ОБЪЕКТОВ:\n";
echo "   Каждая фабрика создает ВЕСЬ набор связанных компонентов\n";
echo "   (Button + Checkbox + другие для одной платформы)\n";
echo "\n";
echo "2. ✅ СОВМЕСТИМОСТЬ:\n";
echo "   Все компоненты, созданные одной фабрикой, совместимы между собой\n";
echo "   (все имеют единый стиль и поведение платформы)\n";
echo "\n";
echo "3. ✅ ВЗАИМОЗАМЕНЯЕМОСТЬ:\n";
echo "   Легко переключаться между платформами без изменения кода\n";
echo "   (достаточно заменить фабрику)\n";
echo "\n";
echo "4. ✅ РАСШИРЯЕМОСТЬ:\n";
echo "   Легко добавить новую платформу (Linux, Android, iOS)\n";
echo "   без изменения существующего кода\n";
echo "\n";
echo "🆚 ОТЛИЧИЯ ОТ ДРУГИХ ФАБРИК:\n";
echo "\n";
echo "📌 Простая фабрика: создает ОДИН объект\n";
echo "📌 Фабричный метод: создает ОДИН объект (но гибче)\n";
echo "📌 Абстрактная фабрика: создает СЕМЕЙСТВО объектов\n";
echo "\n";
echo "🎉 Паттерн \"Абстрактная фабрика\" успешно продемонстрирован!\n";

?>
