<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>
<div class="container">
    <div class="row">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="col-md-5">
            <h2 style="margin-top:30px">Employee Name</h2>
            <hr>

            <form action="{{ route('user.store') }}" method="POST" autocomplete="off">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Employee Name </label>
                    <input type="text" class="form-control" id="name" aria-describedby="name" name="name"
                        placeholder="Enter Employe Name" value="{{ old('name') }}">
                    <div id="name" class="form-text"></div>
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>

                    <button type="submit" style="margin-top:10px"class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
</div>

</html>
