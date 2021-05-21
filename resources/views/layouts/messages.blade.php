
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                {{ $error }}
            </li>
            @endforeach
        </ul>
    </div>
@endif


@if (session('result'))
    <div class="alert alert-success">
        {{ session('result') }}
    </div>

@endif

@if (session('exception'))
    <div class="alert alert-danger">
       یک خظا رخ داد کد خطا :  {{ session('exeption') }}
    </div>

@endif
