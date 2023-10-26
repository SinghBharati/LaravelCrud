<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit form</title>

        {{--bootstrap css link--}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-6">
                    <form action="" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$student->name}}">
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{$student->city}}">
                        </div>

                        <div class="mb-3">
                            <label for="marks" class="form-label">Marks</label>
                            <input type="number" class="form-control" id="marks" name="marks" value="{{$student->marks}}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    @if(session()->has('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{--bootstrap js link--}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
    </body>
</html>
