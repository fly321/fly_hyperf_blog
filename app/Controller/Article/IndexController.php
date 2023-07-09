<?php

namespace App\Controller\Article;

use App\Controller\AbstractController;
use App\Service\ArticleService;
use App\Service\Impl\ArticleServiceImpl;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

#[AutoController(prefix: "/article.index")]
class IndexController extends AbstractController
{
    #[Inject]
    protected ArticleServiceImpl $articleService;
    public function index()
    {
        $res = $this->articleService->getArticleList($this->request->all());
        return [
            'code' => 200,
            'data' => $res
        ];
    }
}