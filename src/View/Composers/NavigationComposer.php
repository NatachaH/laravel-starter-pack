<?php

namespace Nh\StarterPack\View\Composers;

use Illuminate\View\View;
use Auth;

class NavigationComposer
{

    /**
     * Array of links
     * @var array
     */
    protected $links = [];

    /**
     * Construct the navigation
     * @return void
     */
    public function __construct()
    {

          foreach (config('backend.sidebar') as $key => $value)
          {

            // If it is a single link
            if(isset($value['link']) &&  is_null($value['items']))
            {
                $this->links[$key] = $value;
            }

            // If there are sublinks, check all permission
            if(!is_null($value['items']))
            {
                // Define the sublinks
                $sublinks = null;
                foreach ($value['items'] as $keyItem => $item)
                {
                    if(Auth::user()->can($item['action'] ?? 'viewAny', $item['model']))
                    {
                        $sublinks[$keyItem] = $item;
                    }
                }

                // Display menu only if there is a sublink
                if(!is_null($sublinks))
                {
                    $value['items'] = $sublinks;
                    $this->links[$key] = $value;
                }
            }
          }


    }

    /**
    * Bind data to the view.
    *
    * @param  \Illuminate\View\View  $view
    * @return void
    */
    public function compose(View $view)
    {
        $view->with(['links'=> $this->links]);
    }

}
