@if ($errors->any())
    <div class="alert alert-{{ $type ?? 'danger' }} alert-dismissible fade show" role="alert">
        <ul style="margin-bottom: 0;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif