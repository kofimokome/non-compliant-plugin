<?php

defined( 'ABSPATH' ) || exit;

add_action( 'admin_init', function () {

    // Only runs in a browser admin request
    if ( ! is_admin() ) {
        return;
    }

    // Only runs if this query param is present
    if ( empty( $_GET['trigger_runtime_error'] ) ) {
        return;
    }

    // ❌ Runtime-only fatal error
    undefined_function_called_at_runtime();
});