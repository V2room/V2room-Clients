<?php

namespace App\Http\Requests\Feed;

use App\Http\Requests\BaseFormRequest;

class FeedRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'contents' => 'required|string',
            'tags' => 'required|array',
            'files' => 'nullable|file',
        ];
    }
}