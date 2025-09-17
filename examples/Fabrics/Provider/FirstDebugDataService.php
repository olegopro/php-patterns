<?php

require_once 'Interfaces.php';

/**
 * Первый сервис для работы с данными
 *
 * Реализует специфичную логику для работы с первым API провайдером:
 * - OAuth аутентификация
 * - JSON формат данных
 * - Уникальная обработка ошибок
 */
class FirstDebugDataService implements IDebugDataService
{
    /**
     * Получение тестовых данных от первого провайдера
     *
     * @param ITestDataQuery $query Объект запроса
     * @return array Данные от первого провайдера
     */
    public function fetchTestData(ITestDataQuery $query): array
    {
        // Выполняем запрос через переданный объект
        $queryResult = $query->myQueryMethod();

        // Специфичная логика для первого API:
        // - OAuth аутентификация
        // - JSON формат
        // - Уникальная обработка ошибок

        // Симуляция работы с первым API
        $this->authenticateWithOAuth();
        $jsonData = $this->fetchJsonData($queryResult);
        $processedData = $this->handleFirstProviderErrors($jsonData);

        return [
            'data'           => 'Данные от первого провайдера',
            'source'         => 'Provider 1',
            'format'         => 'JSON',
            'auth_method'    => 'OAuth',
            'query_result'   => $queryResult,
            'processed_data' => $processedData
        ];
    }

    /**
     * Аутентификация через OAuth
     */
    private function authenticateWithOAuth(): void
    {
        // Логика OAuth аутентификации
        // В реальном приложении здесь был бы код для получения токена
    }

    /**
     * Получение данных в JSON формате
     */
    private function fetchJsonData($queryResult): array
    {
        // Логика получения JSON данных
        return ['json_data' => $queryResult, 'timestamp' => time()];
    }

    /**
     * Обработка ошибок специфичных для первого провайдера
     */
    private function handleFirstProviderErrors(array $data): array
    {
        // Специфичная обработка ошибок для первого API
        return array_merge($data, ['error_handling' => 'First Provider Style']);
    }
}
