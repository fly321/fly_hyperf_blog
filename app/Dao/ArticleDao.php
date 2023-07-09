<?php

namespace App\Dao;

use App\Model\Article;

interface ArticleDao
{
    public function getArticleList(int $curser, int $pageSize, ?array $where = []);

    public function getArticleById(int $id) : Article;

    public function getArticleMaxId() : int;
}