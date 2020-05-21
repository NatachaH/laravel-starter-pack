<?php

namespace Nh\StarterPack\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class MediaListing extends Component
{
    /**
     * The media list.
     *
     * @var Illuminate\Database\Eloquent\Collection
     */
    public $items;

    /**
     * Display the creation date.
     *
     * @var boolean
     */
    public $showDates;

    /**
     * Enable the preview button.
     *
     * @var boolean
     */
    public $hasPreview;

    /**
     * Enable the download button.
     *
     * @var boolean
     */
    public $hasDownload;

    /**
     * Enable the sortable.
     *
     * @var boolean
     */
    public $sortable;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($items, $showDates = false, $hasPreview = false, $hasDownload = false, $sortable = false)
    {
        $this->items        = $items;
        $this->showDates    = $showDates;
        $this->hasPreview   = $hasPreview;
        $this->hasDownload  = $hasDownload;
        $this->sortable     = $sortable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('sp::components.media-listing');
    }
}
