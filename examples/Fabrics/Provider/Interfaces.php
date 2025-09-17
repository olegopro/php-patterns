<?php

/**
 * Контракт для запросов к API провайдерам
 * 
 * Определяет общий интерфейс для всех типов запросов,
 * обеспечивая единообразие в работе с разными провайдерами
 */
interface ITestDataQuery 
{
    /**
     * Основной метод для выполнения запроса
     * 
     * @return mixed Результат запроса в зависимости от реализации
     */
    public function myQueryMethod(): mixed;
}

/**
 * Контракт для сервисов работы с данными
 * 
 * Определяет единый интерфейс для всех сервисов,
 * работающих с различными API провайдерами
 */
interface IDebugDataService 
{
    /**
     * Получение тестовых данных от провайдера
     * 
     * @param ITestDataQuery $query Объект запроса
     * @return array Массив данных от провайдера
     */
    public function fetchTestData(ITestDataQuery $query): array;
}

/**
 * Контракт для фабрики сервисов
 * 
 * Определяет интерфейс для создания экземпляров сервисов
 * на основе типа провайдера
 */
interface IServiceFactory 
{
    /**
     * Получение экземпляра сервиса для работы с данными
     * 
     * @param DataProvidersEnum $enum Тип провайдера
     * @return IDebugDataService Экземпляр сервиса
     * @throws Exception При неподдерживаемом провайдере
     */
    public function getDebugDataServiceInstance(DataProvidersEnum $enum): IDebugDataService;
}