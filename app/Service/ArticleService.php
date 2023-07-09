<?php

namespace App\Service;

use App\Model\Article;

interface ArticleService
{
    public function getArticleList(array $params);

    public function getArticleById(int $id): Article;

    public function getArticleMaxId();
}