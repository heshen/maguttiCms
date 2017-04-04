<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute 必须接受.',
    'active_url'           => ':attribute 是非法 URL.',
    'after'                => ':attribute 时间必须晚于 :date.',
    'alpha'                => ':attribute 只允许字母.',
    'alpha_dash'           => ':attribute 只允许字母，数字，下划线.',
    'alpha_num'            => ':attribute 只允许字母，数字.',
    'array'                => ':attribute 必须是一个 array.',
    'before'               => ':attribute 时间必须早于 :date.',
    'between'              => [
        'numeric' => ':attribute 必须在 :min 和 :max 之间.',
        'file'    => ':attribute 必须在 :min 和 :max kilobytes 之间.',
        'string'  => ':attribute 必须在 :min 和 :max characters 之间.',
        'array'   => ':attribute 必须在 :min 和 :max 项目中.',
    ],
    'boolean'              => ':attribute 字段必须为 true 或 false.',
    'confirmed'            => ':attribute 确认信息不匹配.',
    'date'                 => ':attribute 不是合法日期.',
    'date_format'          => ':attribute 不匹配这个格式 :format.',
    'different'            => ':attribute 和 :other 必须不同.',
    'digits'               => ':attribute 必须为 :digits 数值.',
    'digits_between'       => ':attribute 必须在 :min 和 :max 数值之间.',
    'email'                => ':attribute 必须为合法的邮件地址.',
    'exists'               => '选择的 :attribute 不合法.',
    'filled'               => ':attribute 字段必填.',
    'image'                => ':attribute 必须为一张图片.',
    'in'                   => '选择 :attribute 非法.',
    'integer'              => ':attribute 必须为一个整数.',
    'ip'                   => ':attribute 必须是一个合法的 IP 地址.',
    'json'                 => ':attribute 必须是一个合法的 JSON 字符串.',
    'max'                  => [
        'numeric' => ':attribute 不能大于 :max.',
        'file'    => ':attribute 不能大于 :max KB.',
        'string'  => ':attribute 不能大于 than :max 字符.',
        'array'   => ':attribute 不能多于 :max 项.',
    ],
    'mimes'                => ':attribute 文件类型必须为: :values.',
    'min'                  => [
        'numeric' => ':attribute 必须大于等于 :min.',
        'file'    => ':attribute 必须大于等于 :min KB.',
        'string'  => ':attribute 必须大于等于 :min 字符.',
        'array'   => ':attribute 必须大于等于 :min 项.',
    ],
    'not_in'               => '选择 :attribute 非法.',
    'numeric'              => ':attribute 必须为数值.',
    'regex'                => ':attribute 格式不匹配.',
    'required'             => ':attribute 字段必填.',
    'required_if'          => ':attribute 字段必填, 当 :other 为 :value.',
    'required_with'        => ':attribute 字段必填, 当 :values 为当前值时.',
    'required_with_all'    => ':attribute 字段必填, 当 :values 为当前值时.',
    'required_without'     => ':attribute 字段必填, 当 :values 不为当前值时.',
    'required_without_all' => ':attribute 字段必填, 当任何一个 :values 不为当前值时.',
    'same'                 => ':attribute 和 :other 必须匹配.',
    'size'                 => [
        'numeric' => ':attribute 必须为 :size.',
        'file'    => ':attribute 必须为 :size KB.',
        'string'  => ':attribute 必须为 :size 字符.',
        'array'   => ':attribute 必须包含 :size 项.',
    ],
    'string'               => ':attribute 必须为字符串.',
    'timezone'             => ':attribute 必须为合法时区.',
    'unique'               => ':attribute 已经存在.',
    'url'                  => ':attribute 格式错误.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => '自定义消息',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
