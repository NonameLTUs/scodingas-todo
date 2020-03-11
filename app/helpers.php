<?php

if ( ! function_exists('formatResponse')) {
    function formatResponse($data = null, $errors = null)
    {
        return response()->json([
            'data'   => $data,
            'errors' => $errors
        ]);
    }
}
