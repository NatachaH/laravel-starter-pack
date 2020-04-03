<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Searchable
{

  /**
   * Search keyword in columns
   * @param  Builder $query
   * @param  string  $keyword   Keyword to search
   * @param  string  $allMatch  Keyword to search
   * @param  string  $operator  Operatar to use for search
   * @return Builder
   */
  public function scopeSearch(Builder $query, $keyword, $operator = 'contains', $allMatch = false)
  {
      // Get columns where to search
      $columns = $this->searchable;

      // Define the operator to use
      switch ($operator) {
        case 'start':
          $valueToSearch = $keyword.'%';
          break;

        case 'end':
          $valueToSearch = '%'.$keyword;
          break;

        default:
          $valueToSearch = '%'.$keyword.'%';
          break;
      }

      // Make the search query
      return static::where(function ($query) use ($columns, $valueToSearch, $allMatch) {

          foreach($columns as $column)
          {
              if($allMatch)
              {
                  $query->where($column,'LIKE', $valueToSearch);
              } else {
                  $query->orWhere($column,'LIKE', $valueToSearch);
              }
          }

      });

  }


}
