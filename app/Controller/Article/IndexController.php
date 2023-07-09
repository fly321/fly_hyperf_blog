<?php

namespace App\Controller\Article;

use App\Controller\AbstractController;
use App\Service\ArticleService;
use App\Service\Impl\ArticleServiceImpl;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Annotation\RequestMapping;

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

    public function detail()
    {
        $res = $this->articleService->getArticleById($this->request->input('id', 1));
        return [
            'code' => 200,
            'data' => $res
        ];
    }

}