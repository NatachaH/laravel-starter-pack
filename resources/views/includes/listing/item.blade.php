<tr class="{{ empty($lvl) ? '' : 'collapse' }}" data-id="{{ $item->id }}" data-lvl="{{ $lvl ?? 0 }}" data-parent="{{ $item->parent_id ?? 0 }}">

    @if($isSortable())
        <td class="td-fit"><i class="icon-move drag"></i></td>
    @endif

    @if($withChildren)
      <td class="td-fit @if(count($item->children)) toggle-children @endif">
        @if(count($item->children))
          <i class="icon-chevron-right"></i>
        @endif
      </td>
    @endif

    @if($showId)
        <td class="td-fit">{{ $item->id }}</td>
    @endif

    @includeFirst([$folder.'.includes.listing-detail', 'sp::includes.listing.detail'])

    @if($showDates('created'))
      <td class="td-fit d-none d-lg-table-cell">{{ $item->created_at ? $item->created_at->format('d.m.Y H:i') : '-' }}</td>
    @endif

    @if($showDates('updated'))
      <td class="td-fit d-none d-lg-table-cell">{{ $item->updated_at ? $item->updated_at->format('d.m.Y H:i') : '-' }}</td>
    @endif

    @if($showDates('deleted') && $hasSoftDelete())
      <td class="td-fit d-none d-lg-table-cell">{{ empty($item->deleted_at) ? '-' : $item->deleted_at->format('d.m.Y H:i') }}</td>
    @endif

    <td class="td-fit">

        @includeIf($folder.'.includes.listing-button')

        @if(Route::has($route.'.show') && Auth::user()->can('view', $item))
            <a href="{{ route($route.'.show', $item->id) }}" class="btn btn-gray rounded-circle" aria-label="@lang('sp::action.preview')" title="@lang('sp::action.preview')"><i class="icon icon-preview"></i></a>
        @endif

        @if(Route::has($route.'.edit') && Auth::user()->can('update', $item))
            <a href="{{ route($route.'.edit', $item->id) }}" class="btn btn-gray rounded-circle" aria-label="@lang('sp::action.edit')" title="@lang('sp::action.edit')"><i class="icon icon-pencil"></i></a>
        @endif

        @if(Route::has($route.'.destroy') && Auth::user()->can('delete', $item))
            <button type="button" data-bs-toggle="modal" data-action="{{ route($route.'.destroy', $item->id) }}" data-bs-target="#{{ Route::has($route.'.forceDelete') ? 'softDeleteConfirm' : 'deleteConfirm' }}" class="btn btn-gray rounded-circle" aria-label="@lang('sp::action.delete')" title="@lang('sp::action.delete')"><i class="icon icon-trash"></i></button>
        @endif

        @if(Route::has($route.'.restore') && Auth::user()->can('restore', $item))
            <button type="button" data-bs-toggle="modal" data-action="{{ route($route.'.restore', $item->id) }}" data-bs-target="#restoreConfirm" class="btn btn-gray rounded-circle" aria-label="@lang('sp::action.restore')" title="@lang('sp::action.restore')"><i class="icon icon-time-reverse"></i></button>
        @endif

        @if(Route::has($route.'.forceDelete') && Auth::user()->can('forceDelete', $item))
            <button type="button" data-bs-toggle="modal" data-action="{{ route($route.'.forceDelete', $item->id) }}" data-bs-target="#deleteConfirm" class="btn btn-gray rounded-circle" aria-label="@lang('sp::action.force-delete')" title="@lang('sp::action.force-delete')"><i class="icon icon-trash"></i></button>
        @endif

    </td>
</tr>

@if($withChildren && count($item->children))
  @foreach ($item->children as $child)
      @includeIf('sp::includes.listing.item', ['item' => $child, 'lvl' => ($lvl ?? 0)+1])
  @endforeach
@endif
