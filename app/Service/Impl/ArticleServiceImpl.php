<?php

namespace App\Service\Impl;

use App\Dao\Impl\ArticleDaoImpl;
use App\Exception\FlyException;
use App\Model\Article;
use App\Service\ArticleService;
use Hyperf\Di\Annotation\Inject;

class ArticleServiceImpl implements ArticleService
{

    #[Inject]
    protected ArticleDaoImpl $articleDao;

    public function getArticleList(array $params)
    {
        if ($params['cursor'] == 0) {
            $params['cursor'] = $this->articleDao->getArticleMaxId()+1;
        }

        $whiteList = ['cursor', 'pageSize', 'query'];
        foreach ($params as $key => $value) {
            if (!in_array($key, $whiteList)) {
                unset($params[$key]);
            }
            if (!array_key_exists($key, $params)){
                $params[$key] = [];
            }
        }
        if (empty($params['query'])){
            $params['query'] = [];
        }

        try {
            return $this->articleDao->getArticleList($params['cursor'], $params['pageSize'], $params['query']);
        } catch (\Throwable $e) {
            throw new FlyException($e->getMessage());
        }
    }

    public function getArticleById(int $id): ?Article
    {
        return $this->articleDao->getArticleById($id);
    }

    public function getArticleMaxId()
    {
        // TODO: Implement getArticleMaxId() method.
    }
}