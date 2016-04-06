<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class ApplicationTest extends TestCase
{

    /**
     * Базовый тест работы приложения.
     */
    public function testApplication()
    {
        // Прверка работы основных страниц
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());

        $response = $this->call('GET', '/about');
        $this->assertEquals(200, $response->status());

        $response = $this->call('GET', '/contacts');
        $this->assertEquals(200, $response->status());
    }

    /**
     * Тест поиска.
     */
    public function testSearch()
    {
        // Прверка работы основных страниц
        $response = $this->call('GET', '/search/index/1');
        $this->assertEquals(200, $response->status());

        $insertDateFrom = '';
        $insertDateTo = '';
        $publicationDateFrom = '';
        $publicationDateTo = '';
        $publicationNumber = '';
        $datasetStatus = '';

        // Поиск с пустыми полями
        $this->get("search/index/1?insert_date_from={$insertDateFrom}" .
            "&insert_date_to={$insertDateTo}" .
            "&publication_date_from={$publicationDateFrom}" .
            "&publication_date_to={$publicationDateTo}" .
            "&publication_number={$publicationNumber}" .
            "&dataset_status={$datasetStatus}")
             ->see('Помилка валідації!');

        // Поиск с заполенными полями
        $insertDateFrom = '01.04.2016';
        $insertDateTo = '01.04.2016';
        $publicationNumber = '72058';
        $this->get("search/index/1?insert_date_from={$insertDateFrom}" .
            "&insert_date_to={$insertDateTo}" .
            "&publication_date_from={$publicationDateFrom}" .
            "&publication_date_to={$publicationDateTo}" .
            "&publication_number={$publicationNumber}" .
            "&dataset_status={$datasetStatus}")
            ->dontSee('Помилка валідації!')
            ->see('Кількість: <strong>1</strong>');
    }

    /**
     * Assert that a given string is seen on the page.
     *
     * @param  string  $text
     * @param  bool  $negate
     * @return $this
     */
    protected function see($text, $negate = false)
    {
        $method = $negate ? 'assertNotRegExp' : 'assertRegExp';

        $rawPattern = preg_quote($text, '/');

        $escapedPattern = preg_quote(e($text), '/');

        $pattern = $rawPattern == $escapedPattern
            ? $rawPattern : "({$rawPattern}|{$escapedPattern})";

        $this->$method("/$pattern/i", $this->response->getContent());

        return $this;
    }

    /**
     * Assert that a given string is not seen on the page.
     *
     * @param  string  $text
     * @return $this
     */
    protected function dontSee($text)
    {
        return $this->see($text, true);
    }
}
