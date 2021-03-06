<?php

namespace Exit11\Article\Http\Resources;

use Mpcs\Core\Facades\Core;

use Illuminate\Http\Resources\Json\JsonResource;
use Mpcs\Core\Traits\ResourceTrait;

class ArticleFile extends JsonResource
{
    use ResourceTrait;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'article_id' => $this->article_id,
            'caption' => $this->caption,
            'name' => $this->name,
            'mime' => $this->mime,
            'size' => $this->size,
            'download_count' => $this->download_count,
            'download_url' => route(Core::getRouteName('article_files.download'), ['article_file' => $this->id]),
            'article' => $this->whenLoaded('article', function () {
                return new ArticleCollection($this->article);
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
