<?php

if (! function_exists('add_action')) {
    function add_action($hook, $callback, $priority = 10, $accepted_args = 1)
    {
        global $publishpress_dompdf_test_hooks;
        $publishpress_dompdf_test_hooks[$hook][$priority][] = $callback;
    }
}

if (! function_exists('do_action')) {
    function do_action($hook)
    {
        global $publishpress_dompdf_test_hooks, $publishpress_dompdf_test_actions;
        $publishpress_dompdf_test_actions[$hook] = ($publishpress_dompdf_test_actions[$hook] ?? 0) + 1;

        if (empty($publishpress_dompdf_test_hooks[$hook])) {
            return;
        }

        ksort($publishpress_dompdf_test_hooks[$hook]);
        foreach ($publishpress_dompdf_test_hooks[$hook] as $callbacks) {
            foreach ($callbacks as $callback) {
                call_user_func($callback);
            }
        }
    }
}

if (! function_exists('did_action')) {
    function did_action($hook)
    {
        global $publishpress_dompdf_test_actions;
        return $publishpress_dompdf_test_actions[$hook] ?? 0;
    }
}

if (! function_exists('__return_null')) {
    function __return_null()
    {
        return null;
    }
}
