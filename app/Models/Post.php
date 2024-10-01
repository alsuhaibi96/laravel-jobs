<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{

    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public  function  __construct($title, $excerpt, $date, $body,$slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;

    }

    public  static function find($slug)
    {
      return static::all()->firstWhere('slug', $slug);
    }

    public  static  function  all()
    {
        return cache()->rememberForever('posts' ,function (){
            $files=\Illuminate\Support\Facades\File::files(resource_path('posts'));

            $posts=collect($files)
                ->map(function ($file){
                    $document=\Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);
                    return new Post(
                        $document->title,
                        $document->date,
                        $document->excerpt,
                        $document->body(),
                        $document->slug,
                    );
                })->sortBy ('date');
            return $posts;
        });

    }

}
