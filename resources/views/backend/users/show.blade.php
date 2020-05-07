@extends('sp::layouts.backend')

@section('title', mainbar('settings','user', 'show'))

@section('content')

    @include('sp::includes.page-header', ['title' => $user->name, 'route' => 'backend.users', 'model' => $user])

    <div class="row">

        <div class="col-lg-8">

            <x-bs-card :title="__('sp::field.information')">
              <dl class="row mb-0">
                <dt class="col-sm-2">@lang('sp::field.email')</dt>
                <dd class="col-sm-10"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></dd>

                <dt class="col-sm-2">@lang('sp::field.role')</dt>
                <dd class="col-sm-10 mb-0">{{ $user->role->name }}</dd>
              </dl>
            </x-bs-card>

        </div>

        <div class="col-lg-4">
            <x-sp-historic type="user" :items="$user->tracks" />
        </div>

    </div>

@endsection
