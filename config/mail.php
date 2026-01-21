<?php
return [
    'worker_enabled' => getenv('MAIL_WORKER_ENABLED') ?: false,
];
