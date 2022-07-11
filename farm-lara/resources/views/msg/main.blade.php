@if(session('success'))
<div class="alert-success">
    {{session('success')}}
</div>
@endif

@if(session('deleted'))
<div class="alert-deleted">
    {{session('deleted')}}
</div>
@endif
