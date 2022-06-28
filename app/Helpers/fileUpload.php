<?php
if (! function_exists('fileUploads')) {
  function fileUploads($request, $type) {
    $fileName = $type.'-'.time().".".$request->getClientOriginalExtension();
    $filePath = $request->storeAs('uploads', $fileName, 'public');
    return $filePath;
  }
}