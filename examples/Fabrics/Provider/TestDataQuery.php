<?php

require_once 'Interfaces.php';

/**
 * Конкретная реализация запроса к API провайдерам
 * 
 * Реализует интерфейс ITestDataQuery и инкапсулирует
 * логику формирования запросов к различным провайдерам данных
 */
class TestDataQuery implements ITestDataQuery 
{
    /**
     * Параметры запроса
     */
    private array $queryParameters;
    
    /**
     * Тип запроса
     */
    private string $queryType;
    
    /**
     * Конструктор класса
     * 
     * @param array $parameters Параметры для запроса
     * @param string $type Тип запроса (по умолчанию 'test')
     */
    public function __construct(array $parameters = [], string $type = 'test')
    {
        $this->queryParameters = $parameters;
        $this->queryType = $type;
    }
    
    /**
     * Основной метод для выполнения запроса
     * 
     * Реализует интерфейс ITestDataQuery и возвращает
     * структурированные данные запроса
     * 
     * @return mixed Результат запроса
     */
    public function myQueryMethod(): mixed
    {
        // Формируем базовую структуру запроса
        $queryData = [
            'query_id' => $this->generateQueryId(),
            'query_type' => $this->queryType,
            'parameters' => $this->queryParameters,
            'timestamp' => time(),
            'formatted_time' => date('Y-m-d H:i:s')
        ];
        
        // Добавляем специфичные данные в зависимости от типа запроса
        switch ($this->queryType) {
            case 'test':
                $queryData['test_data'] = $this->generateTestData();
                break;
            case 'debug':
                $queryData['debug_info'] = $this->generateDebugInfo();
                break;
            case 'production':
                $queryData['production_params'] = $this->generateProductionParams();
                break;
            default:
                $queryData['default_data'] = 'Стандартный запрос';
        }
        
        return $queryData;
    }
    
    /**
     * Генерация уникального ID запроса
     * 
     * @return string Уникальный идентификатор
     */
    private function generateQueryId(): string
    {
        return 'query_' . uniqid() . '_' . mt_rand(1000, 9999);
    }
    
    /**
     * Генерация тестовых данных
     * 
     * @return array Массив тестовых данных
     */
    private function generateTestData(): array
    {
        return [
            'test_param_1' => 'Тестовое значение 1',
            'test_param_2' => mt_rand(1, 100),
            'test_param_3' => ['nested' => 'data', 'array' => [1, 2, 3]]
        ];
    }
    
    /**
     * Генерация отладочной информации
     * 
     * @return array Массив отладочных данных
     */
    private function generateDebugInfo(): array
    {
        return [
            'debug_level' => 'INFO',
            'memory_usage' => memory_get_usage(true),
            'execution_time' => microtime(true),
            'php_version' => PHP_VERSION
        ];
    }
    
    /**
     * Генерация параметров для продакшена
     * 
     * @return array Массив продакшен параметров
     */
    private function generateProductionParams(): array
    {
        return [
            'environment' => 'production',
            'cache_enabled' => true,
            'logging_level' => 'ERROR',
            'timeout' => 30
        ];
    }
    
    /**
     * Установка параметров запроса
     * 
     * @param array $parameters Новые параметры
     * @return self Для цепочки вызовов
     */
    public function setParameters(array $parameters): self
    {
        $this->queryParameters = $parameters;
        return $this;
    }
    
    /**
     * Установка типа запроса
     * 
     * @param string $type Тип запроса
     * @return self Для цепочки вызовов
     */
    public function setQueryType(string $type): self
    {
        $this->queryType = $type;
        return $this;
    }
    
    /**
     * Получение текущих параметров запроса
     * 
     * @return array Массив параметров
     */
    public function getParameters(): array
    {
        return $this->queryParameters;
    }
    
    /**
     * Получение типа запроса
     * 
     * @return string Тип запроса
     */
    public function getQueryType(): string
    {
        return $this->queryType;
    }
}