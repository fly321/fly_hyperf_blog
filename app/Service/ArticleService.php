<?php

namespace App\Service;

interface ArticleService
{
    public function getArticleList(array $params);

    public function getArticleById();

    public function getArticleMaxId();
}