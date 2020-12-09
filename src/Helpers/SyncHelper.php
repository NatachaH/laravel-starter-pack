<?php

/**
 * Return a boolean of if the sync no result
 * @param  array $sync
 * @return boolean
 */
function syncIsClean($sync)
{
    // Clean the array
    $sync = array_filter($sync);

    // If empty = clean
    return empty($sync);
}

/**
 * Return a boolean of if the sync as any result
 * @param  array $sync
 * @return boolean
 */
function syncIsDirty($sync)
{
    // Clean the array
    $sync = array_filter($sync);

    // If empty = clean
    return !empty($sync);
}

/**
 * Return an event name of the sync array result
 * @param  array $sync
 * @return string
 */
function getSyncEvent($sync)
{
    $event = null;

    // Clean the array
    $sync = array_filter($sync);

    // Has attached
    $hasAttached = array_key_exists('attached',$sync);
    // Has detached
    $hasDetached = array_key_exists('detached',$sync);
    // Has updates
    $hasUpdated = array_key_exists('updates',$sync);

    if($hasUpdated || ($hasAttached && $hasDetached))
    {
      $event = 'updated';
    } else if($hasAttached) {
      $event = 'created';
    } else if($hasDetached) {
      $event = 'deleted';
    }

    return  $event;
}
