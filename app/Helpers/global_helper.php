<?php

use App\Models\project;
use App\Models\metadata;


 function get_meta_value($meta_key)
 {
    $data = metadata::where('meta_key', $meta_key)->first();
    if ($data) {
        # code...
        return $data->meta_value;
    }
 }
 function get_file_name($fileproject)
 {
     $project = project::where('fileproject', $fileproject)->first();

     if ($project) {
         return $project->fileproject;
     }


 }
