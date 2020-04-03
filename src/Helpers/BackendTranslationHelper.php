<?php

/**
 * Return a translation.
 * @param  string  $name
 * @param  boolean $plural
 * @return string
 */
function getBackendTranslation(string $name, bool $plural = false)
{
    $plural = $plural ? 2 : 1;
    return \Lang::has($name) ? trans_choice($name,$plural) : $name;
}

/**
 * Return a toast message-
 * @param  string $message
 * @param  string $model
 * @return string
 */
function toast(string $message, string $model)
{
    $msgTrans   = 'backend.toast.'.$message;

    if(\Lang::has($msgTrans))
    {
        return __($msgTrans, ['model' => getBackendTranslation('backend.model.'.$model)]);
    } else {
        return $message;
    }
}

/**
 * Return the mainbar title.
 * @param  string $section
 * @param  string $model
 * @param  string $action
 * @return string
 */
function mainbar(string $section, string $model = null, string $action = null)
{

    $title = getBackendTranslation('backend.sidebar.'.$section);

    if(!is_null($model))
    {
      $title .= ' : '.getBackendTranslation('backend.model.'.$model, true);
    }

    if(!is_null($action))
    {
      $title .= ' : '.getBackendTranslation('backend.action.'.$action);
    }

    return $title;
}
