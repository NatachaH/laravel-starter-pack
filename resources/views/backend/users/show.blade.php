@extends('sp::layouts.backend')

@section('title', trans_choice('backend.model.user',2))

@section('content')

    @include('sp::includes.page-header', ['title' => $user->name, 'route' => 'backend.users', 'model' => $user])

    <div class="row">

        <div class="col-xl-8">

            <x-bs-card :title="__('sp::field.information')">
              <dl class="row mb-0">
                <dt class="col-sm-2">@lang('sp::field.email')</dt>
                <dd class="col-sm-10"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></dd>

                <dt class="col-sm-2">@lang('sp::field.role')</dt>
                <dd class="col-sm-10 mb-0">{{ $user->role->name }}</dd>

              </dl>

              <p class="font-italic text-muted mt-3">
                @lang('trackable.track', ['event' => $user->last_track->name, 'time' => $user->last_track->time, 'by' => $user->last_track->username])
              </p>

            </x-bs-card>

        </div>

        <div class="col-lg-4">
            <x-sp-history type="user" :items="$user->activityTracks" />
        </div>


    </div>

@endsection
