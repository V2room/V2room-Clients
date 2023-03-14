<?php

namespace App\Services\DataCollector;

use App\Repositories\Feeds\FeedRepository;
use App\Repositories\Users\UserRepository;
use App\Services\DataCollector\Platform\Community\Contacts\Community;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class CollectorProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registCommunity();
        $this->newsCommunity();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {}

    private function registCommunity()
    {
        $selectNodeCallback = new Platform\Community\SelectNodeCallback(
            $this->app->make(FeedRepository::class),
            $this->app->make(UserRepository::class),
        );

        $this->app->when([
            Platform\Community\HttpCaller::class,
            Platform\Community\FMKorea\FMKorea::class,
            Platform\Community\FMKorea\Humor::class,
            Platform\Community\FMKorea\Gif::class,
        ])
                  ->needs(Contracts\SelectNodeContract::class)
                  ->give(function () use ($selectNodeCallback) {
                      return $selectNodeCallback;
                  });

        /*
         * FMKorea
         * */
        $this->app->singleton(Platform\Community\CollectorService::class, function (Application $app) {
            return new Platform\Community\CollectorService([
                $app->make(Platform\Community\FMKorea\Humor::class),
                // $app->make(Platform\FMKorea\FMKorea::class),
                //                $app->make(\App\Services\DataCollector\Platform\Naver::class),
                //                $app->make(\App\Services\DataCollector\Platform\Daum::class),
                //                $app->make(\App\Services\DataCollector\Platform\Tistory::class),
                //                $app->make(\App\Services\DataCollector\Platform\Youtube::class),
                //                $app->make(\App\Services\DataCollector\Platform\Twitter::class),
                //                $app->make(\App\Services\DataCollector\Platform\Instagram::class),
                //                $app->make(\App\Services\DataCollector\Platform\TikTok::class),
                //                $app->make(\App\Services\DataCollector\Platform\Reddit::class),
                //                $app->make(\App\Services\DataCollector\Platform\Twitch::class),
                //                $app->make(\App\Services\DataCollector\Platform\Discord::class),
                //                $app->make(\App\Services\DataCollector\Platform\Github::class),
                //                $app->make(\App\Services\DataCollector\Platform\StackOverflow::class),
                //                $app->make(\App\Services\DataCollector\Platform\Medium::class),
                //                $app->make(\App\Services\DataCollector\Platform\Slack::class),
                //                $app->make(\App\Services\DataCollector\Platform\Telegram::class),
                //                $app->make(\App\Services\DataCollector\Platform\Line::class),
                //                $app->make(\App\Services\DataCollector\Platform\Kakao::class),
                //                $app->make(\App\Services\DataCollector\Platform\NaverBlog::class),
                //                $app->make(\App\Services\DataCollector\Platform\NaverCafe::class),
                //                $app->make(\App\Services\DataCollector\Platform\NaverPost::class),
                //                $app->make(\App\Services\DataCollector\Platform\NaverNews::class),
                //                $app->make(\App\Services\DataCollector\Platform\NaverShopping::class),
                //                $app->make(\App\Services\DataCollector\Platform\NaverBook::class),
                //                $app->make(\App\Services\DataCollector\Platform\NaverEncyclopedia::class),
                //                $app->make(\App\Services\DataCollector\Platform\NaverDictionary::class),
            ]);
        });
    }

    private function newsCommunity()
    {
        $selectNodeCallback = new Platform\News\SelectNodeCallback(
            $this->app->make(FeedRepository::class),
            $this->app->make(UserRepository::class),
        );

        $this->app->instance(Platform\News\SelectNodeCallback::class, $selectNodeCallback);

        $this->app->when([
            Platform\News\HttpCaller::class,
            Platform\News\BigKinds::class,
        ])
                  ->needs(Contracts\SelectNodeContract::class)
                  ->give(function () {
                      return $this->app->make(Platform\News\SelectNodeCallback::class);
                  });

        $this->app->singleton(Platform\News\CollectorService::class, function (Application $app) {
            return new Platform\News\CollectorService([
                $app->make(Platform\News\BigKinds::class),
            ]);
        });
    }
}