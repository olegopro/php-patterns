# 🏠 Простой пример - Абстрактная фабрика мебели

Простое и понятное объяснение паттерна **Abstract Factory** на примере создания семейств мебели.

## 🎯 Главная идея паттерна

**Абстрактная фабрика создает СЕМЕЙСТВА связанных объектов**, а не отдельные объекты.

### 📊 Сравнение с фабричным методом:

| Фабричный метод | Абстрактная фабрика |
|-----------------|---------------------|
| `create('email')` → EmailNotification | `createTable() + createChair()` → семейство мебели |
| **ОДИН объект** | **СЕМЕЙСТВО объектов** |
| Выбор типа | Выбор семейства + связность |

## 📁 Структура примера

```
Furniture/
├── Interfaces/
│   ├── TableInterface.php              # Интерфейс стола
│   ├── ChairInterface.php              # Интерфейс стула
│   └── FurnitureFactoryInterface.php   # Абстрактная фабрика
├── Modern/
│   ├── ModernTable.php                 # Модерновый стол
│   ├── ModernChair.php                 # Модерновый стул
│   └── ModernFurnitureFactory.php      # Фабрика модерна
├── Classic/
│   ├── ClassicTable.php                # Классический стол
│   ├── ClassicChair.php                # Классический стул
│   └── ClassicFurnitureFactory.php     # Фабрика классики
├── index.php                           # Демонстрация
└── README.md                           # Этот файл
```

## 🔑 Ключевые концепции

### 1. Семейства объектов
Каждая фабрика создает **полный набор** мебели в едином стиле:
- Модерн: стеклянный стол + пластиковый стул (сочетаются!)
- Классика: дубовый стол + кожаный стул (сочетаются!)

### 2. Гарантированная совместимость
Объекты из одной фабрики **всегда сочетаются**:
```php
$modernFactory = new ModernFurnitureFactory();
$table = $modernFactory->createTable(); // Стекло + хром
$chair = $modernFactory->createChair(); // Пластик + алюминий
// ✅ Гарантированно сочетаются в стиле "модерн"
```

### 3. Легкая замена семейств
Меняем одну строчку - меняется весь стиль:
```php
// $factory = new ModernFurnitureFactory();  // Было
$factory = new ClassicFurnitureFactory();    // Стало

// Остальной код остается тем же!
$table = $factory->createTable();
$chair = $factory->createChair();
```

## 🚀 Простое использование

### Базовый пример:
```php
// Создаем фабрику
$factory = new ModernFurnitureFactory();

// Создаем семейство мебели
$table = $factory->createTable();
$chair = $factory->createChair();

// Отображаем результат
echo $table->render();
echo $chair->render();
```

### Полиморфизм:
```php
function furnishRoom(FurnitureFactoryInterface $factory) {
    return [
        'table' => $factory->createTable(),
        'chairs' => [
            $factory->createChair(),
            $factory->createChair()
        ]
    ];
}

// Работает с любой фабрикой!
$modernRoom = furnishRoom(new ModernFurnitureFactory());
$classicRoom = furnishRoom(new ClassicFurnitureFactory());
```

### Создание наборов:
```php
$factory = new ModernFurnitureFactory();
$diningSet = $factory->createDiningSet(6); // 1 стол + 6 стульев

echo $diningSet['description']; // "Современный набор мебели..."
```

## ✅ Когда использовать абстрактную фабрику?

### 🟢 Используйте когда:
- Нужно создавать **семейства связанных объектов**
- Важна **совместимость** объектов между собой
- Планируется **несколько вариантов** семейств (темы, платформы)
- Нужна возможность **легко переключаться** между вариантами

### 🔴 НЕ используйте когда:
- Нужен только **один тип объекта** (используйте Factory Method)
- Объекты **не связаны** между собой
- Система простая и **не планируется расширение**

## 🎨 Практические примеры

### UI-темы:
```php
$darkTheme = new DarkUIFactory();
$button = $darkTheme->createButton();    // Темная кнопка
$input = $darkTheme->createInput();      // Темное поле ввода
// Гарантированно в едином стиле!
```

### Игровые персонажи:
```php
$orcFactory = new OrcFactory();
$warrior = $orcFactory->createWarrior();  // Орк-воин
$weapon = $orcFactory->createWeapon();    // Орочье оружие
// Подходят друг другу!
```

### Форматы документов:
```php
$pdfFactory = new PDFFactory();
$document = $pdfFactory->createDocument(); // PDF документ
$image = $pdfFactory->createImage();       // PDF-совместимое изображение
```

## 🔧 Добавление нового семейства

Чтобы добавить стиль "Лофт":

### Шаг 1: Создать компоненты
```php
class LoftTable implements TableInterface {
    public function getMaterial(): string {
        return 'Металл и необработанное дерево';
    }
    // ...
}

class LoftChair implements ChairInterface {
    public function getMaterial(): string {
        return 'Металл и грубая ткань';
    }
    // ...
}
```

### Шаг 2: Создать фабрику
```php
class LoftFurnitureFactory implements FurnitureFactoryInterface {
    public function createTable(): TableInterface {
        return new LoftTable();
    }
    
    public function createChair(): ChairInterface {
        return new LoftChair();
    }
    
    public function getStyleName(): string {
        return 'Лофт';
    }
}
```

### Шаг 3: Использовать
```php
$loftFactory = new LoftFurnitureFactory();
$room = furnishRoom($loftFactory); // Готово!
```

## 🧪 Запуск демонстрации

```bash
php index.php
```

## 📚 Сравнение паттернов фабрик

| Паттерн | Что создает | Пример использования |
|---------|-------------|---------------------|
| **Simple Factory** | Один объект по типу | `ProductFactory::create('book')` |
| **Factory Method** | Один объект гибко | `NotificationFactory->create('email')` |
| **Abstract Factory** | Семейство объектов | `ModernFactory->createTable() + createChair()` |

## 💡 Ключевые преимущества

1. **Связность семейства** - объекты гарантированно сочетаются
2. **Легкая замена** - меняем фабрику = меняем весь стиль  
3. **Расширяемость** - новое семейство = новая папка
4. **Полиморфизм** - один код работает с разными семействами
5. **Инкапсуляция** - детали создания скрыты от клиента

## 🎓 Что изучается

- **Abstract Factory** - создание семейств объектов
- **Полиморфизм** - взаимозаменяемость фабрик
- **Инкапсуляция** - скрытие деталей создания
- **Связность** - совместимость объектов семейства
- **SOLID принципы** - открытость для расширения

---

**Abstract Factory** - мощный паттерн для создания согласованных семейств объектов! 

**Автор:** Система демонстрации паттернов проектирования  
**Версия:** 1.0  
**PHP:** 8.0+  
**Сложность:** Средняя ⭐⭐
