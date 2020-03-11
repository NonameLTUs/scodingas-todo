<?php

if ( ! function_exists('formatResponse')) {
    function formatResponse($data = null, $errors = null)
    {
        return json_encode([
            'data'   => $data,
            'errors' => $errors
        ]);
    }
}
