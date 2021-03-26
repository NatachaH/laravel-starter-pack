@if($hasBreadcrumb)
  <x-bs-breadcrumb id="breadcrumb" :items="$crumbs">
    @yield('extraBreadcrumb')
  </x-bs-breadcrumb>
@endif
