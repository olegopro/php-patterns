<?php

/**
 * Перечисление типов провайдеров данных
 * 
 * Обеспечивает типобезопасность при выборе провайдера
 * и предотвращает ошибки с неправильными строковыми значениями
 */
enum DataProvidersEnum: string
{
    case FIRST_DATA_PROVIDER = 'firstDataProvider';
    case SECOND_DATA_PROVIDER = 'secondDataProvider';
    case NOT_SUPPORTED_DATA_PROVIDER = 'notSupportedDataProvider';
}