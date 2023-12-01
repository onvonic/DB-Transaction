<?php

# IMPLEMENTATION IN LARAVEL CONTROLLER 

DB::beginTransaction();

try {

    #1 DB::table() ... ... 
    #2 DB::table() ... ... 

    DB::commit();

    $output = [
        'status' => true,
        'message' => "Success"
    ];

    return response()->json($output, 200);
    
} catch (\Exception $e) {

    DB::rollback();
    $output = [
        'status' => false,
        'message' => 'System error: ',
        'error' => $e->getMessage()
    ];
    return response()->json($output, 200);
}
