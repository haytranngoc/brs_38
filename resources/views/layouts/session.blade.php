@if (Session::has('success'))
<div class="alert alert-info">
    <a class="close" data-dismiss="alert">×</a>
    <strong>{!! Session::get('success') !!}</strong> 
</div>
@endif
@if (Session::has('fails'))
<div class="alert alert-info">
    <a class="close" data-dismiss="alert">×</a>
    <strong>{!! Session::get('fails') !!}</strong> 
</div>
@endif
