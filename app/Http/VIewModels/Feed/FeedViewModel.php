<?php

namespace App\Http\VIewModels\Feed;

use App\Http\VIewModels\BaseViewModel;

class FeedViewModel extends BaseViewModel
{
    protected array $exceptErrors = ['title', 'content'];
}