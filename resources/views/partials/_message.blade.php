<div class="message-container">
    @if (Session::has('success'))
    <br>
    <div class="alert alert-success" role="alert">
        <strong>
            Success:
        </strong>
        {{Session::get('success')}}
    </div>
    @endif
    @if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <strong>
            Error:
        </strong>
        <ul>
            @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
