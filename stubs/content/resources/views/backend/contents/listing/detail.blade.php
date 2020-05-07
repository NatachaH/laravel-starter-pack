<td><b>{{ $item->title }}</b></td>
<td>
  @if($item->published)
    <span class="badge bg-success text-white"><i class="icon-checkmark"></i> @lang('sp::field.published')</span>
  @else
    <span class="badge bg-danger text-white"><i class="icon-cross"></i> @lang('sp::field.not-published')</span>
  @endif
</td>
