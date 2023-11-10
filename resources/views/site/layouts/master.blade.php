@include ('site.section.header')


@yield('imgHeader')

<div class="container">
    @yield('slider')
</div>


<div class="container">
    @yield('special')
</div>

<div class="container">
    @yield('new')
</div>

<div class="container">
    @yield('VideoNew')
</div>


@include ('site.section.footer')