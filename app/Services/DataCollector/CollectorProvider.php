<?php

namespace App\Services\DataCollector;

use App\Repositories\Feeds\FeedRepository;
use App\Repositories\Users\UserRepository;
use App\Services\DataCollector\Contracts\SelectNodeContract;
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
        $this->app->singleton(SelectNodeContract::class, function ($app) {
            return new SelectNodeCallback(
                $this->app->make(FeedRepository::class),
                $this->app->make(UserRepository::class),
            );
        });

        $selectNodeCallback = $this->app->make(SelectNodeContract::class);

        /*
         * FMKorea
         * */
        $this->app->singleton(Platform\FMKorea\FMKorea::class, function ($app) use($selectNodeCallback) {
            return new Platform\FMKorea\FMKorea($selectNodeCallback);
        });
        $this->app->singleton(Platform\FMKorea\Humor::class, function ($app) use($selectNodeCallback) {
            return new Platform\FMKorea\Humor($selectNodeCallback);
        });
        $this->app->singleton(Platform\FMKorea\Gif::class, function ($app) use($selectNodeCallback) {
            return new Platform\FMKorea\Gif($selectNodeCallback);
        });

        $this->app->bind(DataCollectorService::class, function ($app) {
            return new DataCollectorService([
                $app->make(Platform\FMKorea\Humor::class),
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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {}
}