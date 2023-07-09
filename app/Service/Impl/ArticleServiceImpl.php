<?php

namespace App\Service\Impl;

use App\Dao\Impl\ArticleDaoImpl;
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
        return $this->articleDao->getArticleList($params['cursor'], $params['pageSize'], $params['query']);

    }

    public function getArticleById()
    {
        // TODO: Implement getArticleById() method.
    }

    public function getArticleMaxId()
    {
        // TODO: Implement getArticleMaxId() method.
    }
}