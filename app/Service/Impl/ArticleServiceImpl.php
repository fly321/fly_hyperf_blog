<?php

namespace App\Service\Impl;

use App\Dao\ArticleDao;
use Hyperf\Di\Annotation\Inject;

class ArticleServiceImpl implements \App\Service\ArticleService
{

    #[Inject]
    protected ArticleDao $articleDao;

    public function getArticleList(array $params)
    {
        if ($params['cursor'] == 'max') {
            $params['cursor'] = $this->articleDao->getArticleMaxId();
        }

        $whiteList = ['cursor', 'pageSize', 'query'];
        foreach ($params as $key => $value) {
            if (!in_array($key, $whiteList)) {
                unset($params[$key]);
            }
            if (!array_key_exists($key, $params)){
                $params[$key] = '';
            }
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