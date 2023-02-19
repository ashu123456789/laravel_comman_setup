@extends('../admin/layout.sidemenu')

@section('subcontent')
<h2>Success</h2>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
<a href=""></a>
@endsection