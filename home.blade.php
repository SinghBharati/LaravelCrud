<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Student Form (CRUD using Eloquent ORM )</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-6">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>

                        <div class="mb-3">
                            <label for="marks" class="form-label">Marks</label>
                            <input type="number" class="form-control" id="marks" name="marks">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @if(session()->has('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
                </div>


                <div class="col-sm-6">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">City</th>
                                <th scope="col">Marks</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <th>{{$student->id}}</th>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->city}}</td>
                                    <td>{{$student->marks}}</td>
                                    <td>
                                        <a href="{{url('/edit', $student->id)}}" class="btn btn-info btn-sm">Edit</a>
                                        <a href="{{url('/delete', $student->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <br>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
