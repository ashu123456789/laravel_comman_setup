@extends('../admin/layout.base')

@section('body')

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    @yield('content')

    @include('admin.layout.core-js')

    @stack('scripts')
</body>

@endsection