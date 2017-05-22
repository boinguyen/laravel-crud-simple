@if( Session::has('flashMessage') )
<div class="alert {{ Session::get('flashMessage')['class'] }} alert-dismissible alert-message" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('flashMessage')['message'] }}
</div>
@endif