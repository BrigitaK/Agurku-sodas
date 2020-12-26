<?php

file_put_contents('data.json', json_encode(
    [
        ['name' => 'Jonas', 'email' => 'jon@ukas.lt', 'pass' => md5('123')],
        ['name' => 'Monikute', 'email' => 'mon@ikute.lt', 'pass' => md5('123')]
]
));