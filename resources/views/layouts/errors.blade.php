@if(count($errors))
<div class="form-group">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            <br> @endforeach
        </ul>
    </div>
</div>
@endif
