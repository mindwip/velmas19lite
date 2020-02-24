@include('admin.partials.head')

@include('admin.partials.spinner')

@include('admin.partials.header')

<main role="main" class="container-fluid">

	@yield('content')

</main>

@include('admin.partials.footer')