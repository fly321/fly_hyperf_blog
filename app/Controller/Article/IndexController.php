<?php

namespace App\Controller\Article;

use App\Controller\BaseController;
use App\Service\Impl\ArticleServiceImpl;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

#[AutoController(prefix: "/article.index")]
class IndexController extends BaseController
{
    #[Inject]
    protected ArticleServiceImpl $articleService;

    public function index()
    {
        try {
            $res = $this->articleService->getArticleList($this->request->all());
        } catch (\Throwable $e) {
            return $this->error($e->getMessage());
        }
        return $this->success($res);
    }

    public function detail()
    {
        try {
            $id = $this->request->input('id', 1);
            $res = $this->articleService->getArticleById(intval($id));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
        if (empty($res)) {
            return $this->error('文章不存在');
        }
        return $this->success($res);
    }

}