<?php

namespace App\Http\VIewModels;

use Illuminate\Support\Collection;

class BaseViewModel extends \LaravelSupports\ViewModels\BaseViewModel
{
    protected array $exceptErrors = [];
    protected array $catchErrors = [];
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
     * @return string
     * @author  WilsonParker
     * @added   2023/03/02
     * @updated 2023/03/02
     */
    public function getFilteredErrorMessage(): string
    {
        if ($this->hasFilteredErrors()) {
            $errors = $this->getErrors();
            return $errors->getBag($this->messageBack)->getMessages()[$this->getFilteredKeys()->first()][0];
        }
        return '';
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
            $keys = collect($messages)->keys();
            return $keys->exclude($this->exceptErrors)->when(sizeof($this->catchErrors) > 0, function (
                Collection $collection
            ) {
                return $collection->intersect($this->catchErrors);
            });
        }
        return collect();
    }
}