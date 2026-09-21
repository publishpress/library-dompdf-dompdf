<?php

require_once __DIR__ . '/_hooks.php';

// Composer loads the library before these WordPress hook stubs exist. Load it
// again so the version loader can register in this lightweight test runtime.
include dirname(__DIR__, 2) . '/lib/include.php';
do_action('plugins_loaded');
