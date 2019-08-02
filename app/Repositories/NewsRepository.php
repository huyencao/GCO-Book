<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\News;

class NewsRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\News::class;
    }

    public function listNewsHot()
    {
        $news_hot = News::where('hot', 1)->limit(config('app.news_hot'))->orderBy('id', 'DESC' )->get();

        return $news_hot;
    }

    public function listNews()
    {
        $list_news = News::where('hot', 1)->paginate(config('app.paginate_news'));

        return $list_news;
    }

    public function detailNews($slug)
    {
        $data = News::where('slug', $slug)->get();

        return $data;
    }
}
