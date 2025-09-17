<?php

require_once 'Interfaces.php';

/**
 * Второй сервис для работы с данными
 * 
 * Реализует специфичную логику для работы со вторым API провайдером:
 * - API-ключи для аутентификации
 * - XML формат данных
 * - Другая обработка ошибок
 */
class SecondDebugDataService implements IDebugDataService 
{
    /**
     * Получение тестовых данных от второго провайдера
     * 
     * @param ITestDataQuery $query Объект запроса
     * @return array Данные от второго провайдера
     */
    public function fetchTestData(ITestDataQuery $query): array 
    {
        // Выполняем запрос через переданный объект
        $queryResult = $query->myQueryMethod();
        
        // Специфичная логика для второго API:
        // - API-ключи для аутентификации  
        // - XML формат
        // - Другая обработка ошибок
        
        // Симуляция работы со вторым API
        $this->authenticateWithApiKey();
        $xmlData = $this->fetchXmlData($queryResult);
        $processedData = $this->handleSecondProviderErrors($xmlData);
        
        return [
            'data' => 'Данные от второго провайдера',
            'source' => 'Provider 2',
            'format' => 'XML',
            'auth_method' => 'API Key',
            'query_result' => $queryResult,
            'processed_data' => $processedData
        ];
    }
    
    /**
     * Аутентификация через API ключ
     */
    private function authenticateWithApiKey(): void
    {
        // Логика аутентификации через API ключ
        // В реальном приложении здесь была бы проверка ключа
    }
    
    /**
     * Получение данных в XML формате
     */
    private function fetchXmlData($queryResult): array
    {
        // Логика получения XML данных
        return ['xml_data' => $queryResult, 'timestamp' => time()];
    }
    
    /**
     * Обработка ошибок специфичных для второго провайдера
     */
    private function handleSecondProviderErrors(array $data): array
    {
        // Специфичная обработка ошибок для второго API
        return array_merge($data, ['error_handling' => 'Second Provider Style']);
    }
}