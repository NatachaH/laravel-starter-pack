<div class="col-lg-3 col-xl-2" id="sidebar">

    <div class="sidebar-header">
      <h1><span class="text-brand font-weight-normal">BACK</span><span class="text-secondary font-weight-light">END</span></h1>
      <button class="btn" type="button" id="closeSidebarBtn">
        <i class="icon-cross"></i>
      </button>
    </div>

    <div class="sidebar-body flex-fill" id="menu">

        @include('backend.partials.navigation')

    </div>

    <div class="sidebar-footer">
        V1.0 © {{ now()->year }} <a href="https://www.natachaherth.ch">Natacha Herth</a>
    </div>

</div>
