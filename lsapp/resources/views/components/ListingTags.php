<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListingTags extends Component
{
    public $tagsCsv;

    public function __construct($tagsCsv)
    {
        $this->tagsCsv = $tagsCsv;
    }

    public function render()
    {
        return view('components.listing-tags');
    }
}
