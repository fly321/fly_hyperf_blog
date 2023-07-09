<?php

namespace App\Controller\Article;

use App\Controller\AbstractController;
use App\Service\ArticleService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

#[AutoController(prefix: "/article.index")]
class IndexController extends AbstractController
{
    #[Inject]
    protected ArticleService $articleService;
    public function index()
    {
        $this->articleService->getArticleList($this->request->all());
    }
}