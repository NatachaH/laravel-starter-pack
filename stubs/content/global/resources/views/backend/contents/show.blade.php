@extends('sp::layouts.backend')

@section('title', mainbar('settings','{{ NAME }}', 'show'))

@section('content')

    <div class="page-header">
      <h2>{{ ${{ NAME }}->title }}</h2>
      @if(Route::has('backend.{{ PNAME }}.edit') && Auth::user()->can('update', ${{ NAME }}))
          <a href="{{ route('backend.{{ PNAME }}.edit', ${{ NAME }}->id) }}" class="btn btn-outline-primary rounded-pill" aria-label="@lang('sp::action.edit')"><i class="icon icon-pencil"></i> @lang('sp::action.edit')</a>
      @endif
    </div>

    <x-bs-card :title="__('sp::field.information')">
      <p class="lead">{{ ${{ NAME }}->subtitle }}</p>
      {!!${{ NAME }}->description!!}
    </x-bs-card>

    @if(${{ NAME }}->hasMedia())

      <x-bs-card :title="trans_choice('sp::media.media',2)">
        @foreach (${{ NAME }}->media->where('type','pictures') as $media)
          <img class="img-thumbnail" src="{{ $media->thumbnail }}"/>
        @endforeach
      </x-bs-card>

      <x-bs-card :title="trans_choice('sp::media.media',2)">
        <x-slot name="before">
          <ul class="list-group list-group-flush">
            @foreach (${{ NAME }}->media as $media)
              <li class="list-group-item d-flex align-items-center">
                <span clasS="mr-auto"><i class="icon-file-{{ $media->format }}"></i> {{ $media->name ?? $media->filename }} @isset($media->name) <small class="text-muted font-italic">{{ $media->filename }}</small> @endisset</span>
                <small class="text-muted font-italic mr-4">{{ $media->created_at }}</small>
                <a href="{{ $media->url }}" class="btn btn-sm btn-gray rounded-circle " download target="_blank"><i class="icon-download"></i></a>
              </li>
            @endforeach
          </ul>
        </x-slot>
      </x-bs-card>

    @endif

@endsection
