<div class="col-md-4 col-lg-3 col-xl-2" id="sidebar">

    <div class="sidebar-header">
      <h1><span class="text-primary font-weight-normal">BACK</span><span class="text-secondary font-weight-light">END</span></h1>
      <button class="btn" type="button" id="closeSidebarBtn">
        <i class="icon-cross"></i>
      </button>
    </div>

    <div class="sidebar-body flex-fill" id="menu">

        @include('sp::partials.navigation')

    </div>

    <div class="sidebar-footer">
        © {{ now()->year }} <a href="https://www.natachaherth.ch">Natacha Herth</a>
    </div>

</div>
