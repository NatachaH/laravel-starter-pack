<div id="sidebar">

    <div class="sidebar-header">
      <h1>My App</h1>
      <button class="btn toggle-sidebar" type="button" aria-label="Menu"></button>
    </div>

    <div class="sidebar-body flex-fill" id="menu">

        @include('sp::layouts.partials.navigation')

    </div>

    <div class="sidebar-footer">
        V2.0 © {{ now()->year }} <a href="https://www.natachaherth.ch">Natacha Herth</a>
    </div>

</div>
