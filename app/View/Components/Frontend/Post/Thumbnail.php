<?php

namespace App\View\Components\Frontend\Post;

use App\Models\Post;
use Illuminate\View\Component;

class Thumbnail extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $posts;
    public function __construct()
    {
        $this->posts = POST::inRandomOrder()->limit(6)->with("image")->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.post.thumbnail');
    }
}
