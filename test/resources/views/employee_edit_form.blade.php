<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Edit Employee</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employee Information Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('update', $employee->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"  value="{{$employee->name}}">
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="{{$employee->mobile}}">
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$employee->email}}">
                        </div>

                        <div class="form-group">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="male" {{$employee->gender == "male" ? 'selected' : ''}}>Male</option>
                                <option value="female" {{$employee->gender == "female" ? 'selected' : ''}}>Female</option>
                                <option value="other" {{$employee->gender == "other" ? 'selected' : ''}}>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="is_married" class="form-label">Is Married</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="married_yes" name="is_married" value="Yes" {{$employee->is_married == "Yes" ? 'checked' : ''}}>
                                <label class="form-check-label" for="married_yes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="married_no" name="is_married" value="No" {{$employee->is_married == "No" ? 'checked' : ''}}>
                                <label class="form-check-label" for="married_no">No</label>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="profile_image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control-file" id="profile_image" name="profile_image">
                        </div>



                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="status" name="status[]" value="1" {{in_array("1", explode(',' , $employee->status)) ? 'checked' : ''}}>
                            <label class="form-check-label" for="status">Status</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
