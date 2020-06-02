# Installation

Install the package via composer:

```
composer require nh/starter-pack
```

Install the ui:

```
php artisan ui sp
```

Dumb the composer autoload:

```
composer dump-autoload
```

Migrate the basic databases and seed the default roles/permissions:

```
php artisan migrate
php artisan db:seed
```

Install the NPM packages and run the default js/scss:

```
npm install
npm run dev
```

# Commandes

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
| title     | string |       |
| model     | string |       |    
| route     | string |       |     
| header    | string |       |   
| items     | array |        |         
| show-id    | boolean | false |    
| show-dates | boolean | false |   
| folder    | string | null  |            


*If there is no folder it will take the route attribute.*

```
<x-sp-listing title="My list" model="App\Post" route="backend.posts" header="title|published" :items="$posts" show-id />
```

## Media Dynamic

More settings on package nh/bs-component !

| Attribute | Type | Default |
| --------- | ---- | ------- |
| formats   | string | null |      
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

## Modal Confirm

Get a modal who send a confirmation form. Exemple for delete confirmation.

| Attribute | Type | Default |
| --------- | ---- | ------- |
| color     | string | primary |         
| icon      | string | icon-rocket |   
| name      | string | confirmModal |   
| title     | string |       |   
| message   | string |       |   
| action    | string | #     |   
| method    | string | POST  |   

```
<x-sp-modal-confirm color="danger" icon="icon-trash" name="deleteConfirm" title="Delete something" message="Are you sure ?" method="DELETE"/>
```

## Search

Display a search bar using the package nh/searchable.

| Attribute | Type | Default |
| --------- | ---- | ------- |
| key       | string |       |         
| route     | string |       |   
| folder    | string | null  |   
| is-advanced | boolean | false |   
| collapse-id | string | collapseSearch |   

*If there is no folder it will take the route attribute.*

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
