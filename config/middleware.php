<?php
// 中间件配置
return [
    // 别名或分组
    'alias'    => [
        'user'=>app\middleware\User::class,
        'student'=>app\middleware\Student::class
    ],
    // 优先级设置，此数组中的中间件会按照数组中的顺序优先执行
    'priority' => [],
];
