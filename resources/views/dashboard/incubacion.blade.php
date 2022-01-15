@if((new \Jenssegers\Agent\Agent())->isMobile())
    @include('dashboard.incub_tablet')
@endif