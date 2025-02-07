<?php
/*Handle file uploads*/

function handleUpload($inputName, $model = null)
{
    try {
        if (request()->hasFile($inputName)) {

            //Check if it has the value and after check if the file exists or not in the path
            if ($model && \File::exists(public_path($model->{$inputName}))) {
                \File::delete(public_path($model->{$inputName}));
            }
            $file = request()->file($inputName);
            $fileName = rand() . $file->getClientOriginalName();
            $file->move(public_path('/uploads'), $fileName);
            $filePath = "/uploads/" . $fileName;

            return $filePath;
        }
    } catch (\Exception $e) {
        throw $e;
    }

}
