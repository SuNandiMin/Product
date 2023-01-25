<?php
     function imageUpload($file){

        $filenameWithExt = $file->getClientOriginalName();
        // Get Filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just Extension
        $extension = $file->getClientOriginalExtension();
        // Filename To store
        $fileNameToStore = $filename. '.'. time().'.'.$extension;
        // Upload Image
        $file->move(public_path('images'), $fileNameToStore);

        return $fileNameToStore;
    }
?>
