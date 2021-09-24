<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
class TagController extends Controller
{
    public function tagList(Tag $tag){
        return view ('tag.show_article', compact('tag'));
    }
}
