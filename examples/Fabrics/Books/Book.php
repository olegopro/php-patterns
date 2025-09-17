<?php

require_once 'ProductInterface.php';

/**
 * Класс книги, реализующий интерфейс ProductInterface
 */
class Book implements ProductInterface
{
    private string $title;
    private string $author;
    private float $price;
    
    public function __construct(string $title, string $author, float $price = 25.99)
    {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }
    
    /**
     * Получить информацию о книге
     */
    public function getInfo(): string
    {
        return "Книга: '{$this->title}' автор: {$this->author}";
    }
    
    /**
     * Получить цену книги
     */
    public function getPrice(): float
    {
        return $this->price;
    }
    
    /**
     * Получить тип товара
     */
    public function getType(): string
    {
        return 'book';
    }
    
    /**
     * Получить название книги
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    
    /**
     * Получить автора книги
     */
    public function getAuthor(): string
    {
        return $this->author;
    }
}