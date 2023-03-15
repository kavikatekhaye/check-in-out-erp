<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
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
    <div class="mb-3 col-md-6" style="margin-top:30px">
        <label class="form-label" for="user_id">Employee Name<span class="text-danger">
                *</span></label>
        <form action="{{ route('employee.search') }}" method="POST">
            @csrf
            <select class="form-control" name="user_id">
                <option selected="" disabled="">Employee Name</option>
                @foreach ($data as $u)
                    <option value="{{ $u['id'] }}">{{ $u['name'] }}</option>
                    {{-- <li><a href="{{ route('view', $c->id) }}">{{ $c->title }}</a></li> --}}
                @endforeach

            </select>
            <button type="submit" class="btn btn-info" style="margin-top:10px">Search</button>
        </form>
        <span class="invalid-feedback">
            Please Choose Employee Name
        </span>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 style="margin-top:20px">Employee Dashboard</h2>
            <hr>
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-success">{{ Session::get('error') }}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                        <th>Total</th>
                        <th>For Checkout</th>

                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($data); --}}
                    @foreach ($user as $d)
                        <?php
                        $datetime1 = new DateTime(date($d->checkin));
                        $datetime2 = new DateTime(date($d->checkout));

                        // $datetime2 = $user->checkout;
                        $interval = $datetime1->diff($datetime2);
                        // $diffInDays = $user->checkin->diff($user->checkout);
                        // dd($interval->format('%h')." Hours ".$interval->format('%i')." Minutes");
                        ?>
                        <tr>
                            {{-- @dd($d->checkout) --}}
                            <td>{{ $d->user->name }}
                            </td>
                            <td>{{ date('d-m-Y', strtotime($d->checkin)) }}
                            </td>
                            <td>
                                {{ Carbon\Carbon::parse($d->checkin)->format('H:i:s') }}
                            </td>
                            @if (empty($d->checkout))
                                <td>
                                    Null

                                </td>
                            @else
                                <td>
                                    {{ Carbon\Carbon::parse($d->checkout)->format('H:i:s') }}

                                </td>
                            @endif

                            </td>
                            @if (empty($d->checkout) || empty($d->checkin))
                                <td>
                                    0
                                </td>
                            @else
                                <td>
                                    {{ $interval->format('%h') . ' Hours ' . $interval->format('%i') . ' Minutes' }}
                                </td>
                            @endif
                            <td>
                                <a href="{{ route('employee.checkout', $d->id) }}"> <button type="submit"
                                        class="btn btn-success"> Checkout</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</html>
