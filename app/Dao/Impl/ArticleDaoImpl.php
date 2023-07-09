<?php

namespace App\Dao;

use App\Model\Article;

class ArticleDaoImpl implements ArticleDao
{


    public function getArticleList(int $cursor, int $pageSize, array $where = [])
    {
        $res = Article::offset($cursor)->limit($pageSize);
        if (isset($where)) {
            if (array_key_exists('title', $where)) {
                $res->where('title', 'like', '%' . $where['query']['title'] . '%');
            }
            if (array_key_exists('describe', $where)) {
                $res->where('describe', 'like', '%' . $where['query']['describe'] . '%');
            }
            if (array_key_exists('category_id', $where)) {
                $res->where('category_id', "=", $where['category_id']);
            }
        }
        return $res->get();
    }

    public function getArticleById(int $id): Article
    {
        // TODO: Implement getArticleById() method.
        return Article::find($id);
    }

    public function getArticleMaxId(): int
    {
        return Article::max('id');
    }
}