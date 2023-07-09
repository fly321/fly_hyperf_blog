<?php

namespace App\Dao\Impl;

use App\Dao\ArticleDao;
use App\Model\Article;
use Hyperf\Database\Model\Builder;

class ArticleDaoImpl implements ArticleDao
{

    public function getArticleList(int $cursor, int $pageSize, ?array $where = [])
    {
        $res = Article::where("id","<", $cursor)->limit($pageSize);
        if (isset($where)) {
            if (array_key_exists('search', $where)) {
                $res->where(function(Builder $query) use ($where){
                    $query->where('title', 'like', '%'.$where['search'].'%')
                        ->orWhere('describe', 'like', '%'.$where['search'].'%');
                });
            }

            if (array_key_exists('category_id', $where)) {
                $res->where('category_id', "=", $where['category_id']);
            }
        }
        return $res->orderBy("id", "desc")->get();
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