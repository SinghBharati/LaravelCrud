<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportEmployee implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Extract data, including the image path, from the Excel row
        $name = $row['name'];
        $mobile = $row['mobile'];
        $email = $row['email'];
        $gender = $row['gender'];
        $is_married = $row['is_married'];
        $profile_image = $row['profile_image'];
        $status = $row['status'];

        // You can now handle the image (e.g., move it to a specific folder)
        $newImagePath = public_path('storage/images/').time().basename($profile_image);
        if (file_exists($profile_image)) {
            copy($profile_image, $newImagePath);
        }

        return new Employee([
            'name' => $name,
            'mobile' => $mobile,
            'email' => $email,
            'gender' => $gender,
            'is_married' => $is_married,
            'profile_image' => basename($newImagePath),
            'status' => $status,
        ]);

    }
}
