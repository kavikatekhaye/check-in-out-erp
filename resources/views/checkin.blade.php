<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check-In</title>
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
        <div class="col-md-5">
            <h2 style="margin-top:30px">Check In System</h2>
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            <form action="{{ route('employee.checkin.store') }}" method="POST" autocomplete="off">
                @csrf


                <div class="mb-3 col-md-12">
                    <label class="form-label" for="user_id">Employee Name<span class="text-danger">
                            *</span></label>
                    <select class="form-control" name="user_id">
                        <option selected="" disabled="">Employee Name</option>
                        @foreach ($user as $u)
                            <option value="{{ $u['id'] }}">{{ $u['name'] }}</option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback">
                        Please Choose Employee Name
                    </span>
                </div>


                <div class="form-check" >
                    <input class="form-check-input" type="radio" name="check" value="1" id="flexRadioDefault1" style="margin-top:10px">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Check-In
                    </label>

                  </div>
                  {{-- <div class="form-check">
                    <input class="form-check-input" type="radio" name="check" value="0" id="flexRadioDefault2" >
                    <label class="form-check-label" for="flexRadioDefault2">
                        Check Out
                    </label>
                  </div> --}}


                <button type="submit" class="btn btn-primary" style="margin-top:15px">Submit</button>

            </form>
        </div>
    </div>
</div>

</html>
