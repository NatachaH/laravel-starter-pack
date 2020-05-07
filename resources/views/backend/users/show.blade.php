@extends('sp::layouts.backend')

@section('title', mainbar('settings','user', 'show'))

@section('content')

    @include('sp::includes.page-header', ['title' => $user->name, 'route' => 'backend.users', 'model' => $user])

    <div class="row">

        <div class="col-lg-8">

            <x-bs-card :title="__('sp::field.information')">
              <dl class="row">
                <dt class="col-sm-3">@lang('sp::field.email')</dt>
                <dd class="col-sm-9">{{ $user->email }}</dd>

                <dt class="col-sm-3">@lang('sp::field.role')</dt>
                <dd class="col-sm-9">{{ $user->role->name }}</dd>
              </dl>
            </x-bs-card>

        </div>

        <div class="col-lg-4">
            <x-sp-historic type="user" :items="$user->tracks" />
        </div>

    </div>

@endsection
