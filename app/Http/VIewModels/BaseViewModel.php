<?php

namespace App\Http\VIewModels;

class BaseViewModel extends \LaravelSupports\ViewModels\BaseViewModel
{
    protected array $exceptErrors = ['title'];
    protected array $catchErrors = ['title', 'category'];
    protected string $messageBack = 'default';

    /**
     * @return bool
     * @author  WilsonParker
     * @added   2023/03/01
     * @updated 2023/03/01
     */
    public function hasErrors(): bool
    {
        return request()->session()->has('errors');
    }

    public function hasFilteredErrors(): bool
    {
        if ($this->hasErrors()) {
            dump($this->getFilteredKeys());
            return $this->getFilteredKeys()->count() > 0;
        } else {
            return false;
        }
    }

    /**
     * @return \Illuminate\Support\ViewErrorBag|null
     * @author  WilsonParker
     * @added   2023/03/01
     * @updated 2023/03/01
     */
    public function getErrors(): \Illuminate\Support\ViewErrorBag|null
    {
        return request()->session()->get('errors');
    }

    /**
     * @return \Illuminate\Support\Collection
     * @author  WilsonParker
     * @added   2023/03/01
     * @updated 2023/03/01
     */
    public function getFilteredKeys(): \Illuminate\Support\Collection
    {
        if ($this->hasErrors()) {
            $errors = $this->getErrors();
            $messages = $errors->getBag($this->messageBack)->getMessages();
            $keys = array_keys($messages);
            return $keys->forget($this->exceptErrors)->intersect($this->catchErrors);
        }
        return collect();
    }
}