@if ( $errors->any() )
    <div class="alert alert-danger my-3" role="alert" id="alert">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-unstyled">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
