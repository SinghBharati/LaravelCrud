<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Employee</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Employee Information Form') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/employee" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" >
                            </div>

                            <div class="form-group">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" >
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" >
                            </div>

                            <div class="form-group">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="is_married" class="form-label">Is Married</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="married_yes" name="is_married" value="Yes">
                                    <label class="form-check-label" for="married_yes">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="married_no" name="is_married" value="No">
                                    <label class="form-check-label" for="married_no">No</label>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="profile_image" class="form-label">Profile Image</label>
                                <input type="file" class="form-control-file" id="profile_image" name="profile_image">
                            </div>


                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="status" name="status[]" value="1">
                                <label class="form-check-label" for="status">Status</label>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
    <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
            <h1>Employee List</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Is Married</th>
                    <th>Profile Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->mobile }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->gender }}</td>
                        <td>{{ $employee->is_married }}</td>
                        <td><img src="storage/images/{{$employee->profile_image}}" alt="" height="100px" width="100px"></td>
                        <td>{{ $employee-> status}}</td>
                        <td>
                            <a href="{{url('/edit', $employee->id)}}" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{url('/delete', $employee->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
