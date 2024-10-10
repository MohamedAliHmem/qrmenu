<?php

$path = '/www/abc';

chdir($path);

passthru('php artisan schedule:run');
