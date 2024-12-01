@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="border-none list-group-item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
