# Installation

Install the package via composer:

```
composer require nh/starter-pack
```

## Preset

Install the preset:

```
php artisan preset:sp
```

Dumb the composer autoload:

```
composer dump-autoload
```

## Config

Don't forget to change in the config/app.php the locale and the timezone to be on french and have the correct times.

```
'timezone' => 'Europe/Zurich',
'locale' => 'fr',
```

## Laravel/Fortify

Install fortify via composer:

```
composer require laravel/fortify
```

Publish the vendor:

```
php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
```

Add the provider in your config/app.php

```
App\Providers\FortifyServiceProvider::class,
```

Add in boot() of app/Providers/FortifyServiceProvider.php:

```
Fortify::loginView(function () {
    return view('auth.login');
});

Fortify::requestPasswordResetLinkView(function () {
    return view('auth.forgot');
});

Fortify::resetPasswordView(function () {
    return view('auth.reset');
});

RateLimiter::for('login', function (Request $request) {
    return Limit::perMinute(5)->by($request->email.$request->ip());
});
```

## Database

[If Mysql is lower than v5.7.7](https://laravel-news.com/laravel-5-4-key-too-long-error) add in the file **app/Providers/AppServiceProvider.php**

```
use Illuminate\Support\Facades\Schema;

public function boot()
{
    Schema::defaultStringLength(255);
}
```

And in the config/database.php change to UTF8

```
'mysql' => [
  ...
  'charset' => 'utf8',
  'collation' => 'utf8_unicode_ci',
  ...
]
```

Migrate the basic databases and seed the default roles/permissions:

```
php artisan migrate
php artisan db:seed
```

## Design

Add the NPM packages in your package.json:

```
"@popperjs/core": "^2.6.0",
"bootstrap" : "^5.1.0",
"flatpickr" : "^4.6.7",
"@tiptap/core": "*",
"@tiptap/starter-kit": "*",
"@tiptap/extension-text-style": "*",
"@tiptap/extension-underline": "*",
"@tiptap/extension-link": "*",
"@tiptap/extension-table": "*",
"@tiptap/extension-table-cell": "*",
"@tiptap/extension-table-header": "*",
"@tiptap/extension-table-row": "*",
"sortablejs": "^1.10.2",
"resolve-url-loader": "^4.0.0",
"sass": "^1.38.1",
"sass-loader": "^12.1.0",
```


Install the NPM packages and run the default js/scss:

```
npm install
npm run dev
```

# Commandes

## Maintenance

You can put the website in maintenance mode

```
php artisan down --render="errors.maintenance"
```

## Users

You can create a new user:

```
php artisan user:new
```

## Contents

You can create a new content:

```
php artisan content:new
```

The commande will copy the default files that you needed. You can change them and then do:

```
php artisan migrate
```

Don't forget to add the name of your model in:

- The translation file : **backend.php**
- The translation file : **notification.php**

And enjoy !

# Rules

## Lowercase

Check that the field is lowercase.

```
use Nh\StarterPack\Rules\Lowercase;

public function rules()
{
    return [
      'my_field'  => [new Lowercase]
    ];
}
```

## WithoutSpace

Check that the field is without space.

```
use Nh\StarterPack\Rules\WithoutSpace;

public function rules()
{
    return [
      'my_field'  => [new WithoutSpace]
    ];
}
```

## Phone

Check that the field is a valid phone number (can start with +, can contain numbers dash and white space and must have a length of 9 minimum ).

```
use Nh\StarterPack\Rules\Phone;

public function rules()
{
    return [
      'my_field'  => [new Phone]
    ];
}
```

## Slug

Check that the field is lowercase, without space and without accent.

```
use Nh\StarterPack\Rules\Slug;

public function rules()
{
    return [
      'my_field'  => [new Slug]
    ];
}
```

# Components

## History

Get the history (App\Track) global, for a model or for a user.

| Attribute | Type | Default |
| --------- | ---- | ------- |
| title     | string | null  |
| type      | string | 'global' |    
| items     | array  | null  |    
| value     | string | null  |           

*The type can be: global, model or user.*
*If there is no value and there is multiple items, the value will be the first item time.*

```
<x-sp-history title="My history" type="global" :items="$tracks" />
```

## Listing

Get a listing of collection with pagination and default layout.

| Attribute | Type | Default |
| --------- | ---- | ------- |
| model     | string |       |    
| route     | string |       |     
| header    | string |       |   
| items     | array |        |         
| show-id    | boolean | false |    
| show-dates | string | null |   
| folder    | string | null  |            


*If there is no folder it will take the route attribute.*
*In show-dates you can pass the dates to display: created|updated|deleted.*

```
<x-sp-listing model="App\Post" route="backend.posts" header="title|published" :items="$posts" show-id />
```

## Media Dynamic

More settings on package nh/bs-component !

| Attribute | Type | Default |
| --------- | ---- | ------- |
| formats   | string | null |   
| size      | string | null |   
| width      | string | null |      
| height      | string | null |      
| weight      | string | null |      
| has-name  | boolean | false |   
| has-preview | boolean | false |   
| has-download | boolean | false |

```
<x-sp-media-dynamic class="dynamic-media" legend="Pictures" formats="jpg,png" has-name has-preview has-download />
```

## Media Listing

Get a listing of the media from the package nh/mediable.

| Attribute | Type | Default |
| --------- | ---- | ------- |
| items     | array |        |         
| show-dates | boolean | false |   
| has-preview | boolean | false |   
| has-download | boolean | false |   
| sortable  | boolean | false |   


```
<x-sp-media-listing :items="$medias" show-dates has-preview has-download sortable/>
```

## Search

Display a search bar using the package nh/searchable.

| Attribute | Type | Default |
| --------- | ---- | ------- |
| key       | string |       |         
| model     | string |       |         
| route     | string |       |   
| folder    | string | null  |   
| is-advanced | boolean | false |   
| sortable | string | null |   
| sortable-order | string | asc |   
| collapse-id | string | collapseSearch |   

*If there is no folder it will take the route attribute.*
*You can separate the sortable fields with pipes.*


```
<x-sp-search key="posts" route="backend.posts" is-advanced />
```

## Statistic

Display a statistic block.

| Attribute | Type | Default |
| --------- | ---- | ------- |
| title     | string |       |         
| value     | string | null  |   
| unit      | string | null  |   
| icon      | string | icon-rocket |   
| color     | string | primary |   

```
<x-sp-statistic title="Exemple" value="3" unit="hours" icon="icon-clock" color="danger"/>
```

## Toast

Display a toast notification.

| Attribute | Type | Default |
| --------- | ---- | ------- |
| message   | string |       |      
| color     | string | success |   
| icon      | string | null |   
| delay     | int    | 10000 |

*The default icon is defined by the color.*

```
<x-sp-toast message="Hey i am a toast !" color="success" />
```

# Helpers

The package come with some helpers.

## Nofification

Return a translated sentence for notification:
*Exemple: Page has been added with success !*

```
notification('added','page')
```

## RequestClean

Return a clean request value.
*Exemple:  [0 => 'foo',1 => false,2 => -1,3 => null,4 => '',5 => '0', 6 => 0] will return [0 => 'foo',2 => -1]*

```
requestClean('test')
```

## Sync

Check if a sync is clean or dirty, and get the event.

```
$sync = $model->items()->sync($array);

syncIsClean(sync); // Check if the sync is clean

syncIsDirty(sync); // Check if the sync is dirty

getSyncEvent(sync); // Return the event as updated/created/deleted
```
