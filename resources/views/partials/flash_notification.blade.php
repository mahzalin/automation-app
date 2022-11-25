@if(!empty($error))
    <div class="alert alert-{{ $error_type }} alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ $error }}
    </div>
@endif
