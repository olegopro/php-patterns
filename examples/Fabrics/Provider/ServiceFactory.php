<?php

require_once 'DataProvidersEnum.php';
require_once 'Interfaces.php';
require_once 'FirstDebugDataService.php';
require_once 'SecondDebugDataService.php';

/**
 * Фабрика сервисов для работы с различными API провайдерами
 * 
 * Основной класс, реализующий паттерн Factory Method.
 * Инкапсулирует логику создания экземпляров сервисов
 * на основе типа провайдера данных.
 */
class ServiceFactory implements IServiceFactory 
{
    /**
     * Получение экземпляра сервиса для работы с данными
     * 
     * Использует современный PHP синтаксис match для выбора
     * подходящего сервиса на основе переданного enum'а
     * 
     * @param DataProvidersEnum $enum Тип провайдера данных
     * @return IDebugDataService Экземпляр сервиса для работы с данными
     * @throws Exception При передаче неподдерживаемого провайдера
     */
    public function getDebugDataServiceInstance(DataProvidersEnum $enum): IDebugDataService 
    {
        return match ($enum) {
            DataProvidersEnum::FIRST_DATA_PROVIDER  => $this->getFirstDebugDataService(),
            DataProvidersEnum::SECOND_DATA_PROVIDER => $this->getSecondDebugDataService(),
            default => throw new Exception("Неподдерживаемый провайдер данных: {$enum->value}"),
        };
    }

    /**
     * Создание экземпляра первого сервиса
     * 
     * Инкапсулирует логику создания и настройки
     * сервиса для работы с первым API провайдером
     * 
     * @return IDebugDataService Экземпляр первого сервиса
     */
    protected function getFirstDebugDataService(): IDebugDataService 
    {
        // В реальном приложении здесь могла бы быть дополнительная
        // логика инициализации, например:
        // - настройка конфигурации
        // - инъекция зависимостей
        // - установка параметров подключения
        
        return new FirstDebugDataService();
    }

    /**
     * Создание экземпляра второго сервиса
     * 
     * Инкапсулирует логику создания и настройки
     * сервиса для работы со вторым API провайдером
     * 
     * @return IDebugDataService Экземпляр второго сервиса
     */
    protected function getSecondDebugDataService(): IDebugDataService 
    {
        // Аналогично первому сервису, здесь могла бы быть
        // специфичная логика инициализации для второго провайдера
        
        return new SecondDebugDataService();
    }
    
    /**
     * Получение списка поддерживаемых провайдеров
     * 
     * Вспомогательный метод для получения информации
     * о всех доступных провайдерах данных
     * 
     * @return array Массив поддерживаемых провайдеров
     */
    public function getSupportedProviders(): array
    {
        return [
            DataProvidersEnum::FIRST_DATA_PROVIDER,
            DataProvidersEnum::SECOND_DATA_PROVIDER
        ];
    }
    
    /**
     * Проверка поддержки провайдера
     * 
     * @param DataProvidersEnum $enum Тип провайдера
     * @return bool True если провайдер поддерживается
     */
    public function isProviderSupported(DataProvidersEnum $enum): bool
    {
        return in_array($enum, [
            DataProvidersEnum::FIRST_DATA_PROVIDER,
            DataProvidersEnum::SECOND_DATA_PROVIDER
        ]);
    }
}