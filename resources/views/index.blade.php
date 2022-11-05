<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<div class="container1">
    <div class="tab">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Numer konta</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($accounts as $account )
                <tr>
                    <th scope="row">{{ $account->id }}</th>
                    <td>{{ $account->card }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="container2">
    <form method="POST" action="{{ route('index') }}">
        @csrf
        <fieldset>
            <legend>Nr konta bankowego</legend>
            <div>
                {{-- <input id="card" name="card" type="text" required/> --}}
                <input id="card" type="text" maxlength="500" class="form-control @error('card') is-invalid @enderror" name="card" value="{{ old('card') }}" required autocomplete="card" autofocus>
                @error('card')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button type="submit" class="btn btn-primary">Wyślij</button>
            </div>
            Nr konta: {{ $numb }}
        </fieldset>
    </form>
</div>

<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>
</html>
