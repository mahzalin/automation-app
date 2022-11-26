@if(!empty($message))
    <div class="alert alert-info alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ $message }}
    </div>
@endif
