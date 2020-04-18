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

    'accepted' => 'The :attribute must be accepted. ru',
    'active_url' => 'The :attribute is not a valid URL. ru',
    'after' => 'The :attribute must be a date after :date. ru',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date. ru',
    'alpha' => 'The :attribute may only contain letters. ru',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores. ru',
    'alpha_num' => 'The :attribute may only contain letters and numbers. ru',
    'array' => 'The :attribute must be an array. ru',
    'before' => 'The :attribute must be a date before :date. ru',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date. ru',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max. ru',
        'file' => 'The :attribute must be between :min and :max kilobytes. ru',
        'string' => 'The :attribute must be between :min and :max characters. ru',
        'array' => 'The :attribute must have between :min and :max items. ru',
    ],
    'boolean' => 'The :attribute field must be true or false. ru',
    'confirmed' => 'The :attribute confirmation does not match. ru',
    'date' => 'The :attribute is not a valid date. ru',
    'date_equals' => 'The :attribute must be a date equal to :date. ru',
    'date_format' => 'The :attribute does not match the format :format. ru',
    'different' => 'The :attribute and :other must be different. ru',
    'digits' => 'The :attribute must be :digits digits. ru',
    'digits_between' => 'The :attribute must be between :min and :max digits. ru',
    'dimensions' => 'The :attribute has invalid image dimensions. ru',
    'distinct' => 'The :attribute field has a duplicate value. ru',
    'email' => 'The :attribute must be a valid email address. ru',
    'ends_with' => 'The :attribute must end with one of the following: :values ru',
    'exists' => 'The selected :attribute is invalid. ru',
    'file' => 'The :attribute must be a file. ru',
    'filled' => 'The :attribute field must have a value. ru',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value. ru',
        'file' => 'The :attribute must be greater than :value kilobytes. ru',
        'string' => 'The :attribute must be greater than :value characters. ru',
        'array' => 'The :attribute must have more than :value items. ru',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value. ru',
        'file' => 'The :attribute must be greater than or equal :value kilobytes. ru',
        'string' => 'The :attribute must be greater than or equal :value characters. ru',
        'array' => 'The :attribute must have :value items or more. ru',
    ],
    'image' => 'The :attribute must be an image. ru',
    'in' => 'The selected :attribute is invalid. ru',
    'in_array' => 'The :attribute field does not exist in :other. ru',
    'integer' => 'The :attribute must be an integer. ru',
    'ip' => 'The :attribute must be a valid IP address. ru',
    'ipv4' => 'The :attribute must be a valid IPv4 address. ru',
    'ipv6' => 'The :attribute must be a valid IPv6 address. ru',
    'json' => 'The :attribute must be a valid JSON string. ru',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value. ru',
        'file' => 'The :attribute must be less than :value kilobytes. ru',
        'string' => 'The :attribute must be less than :value characters. ru',
        'array' => 'The :attribute must have less than :value items. ru',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value. ru',
        'file' => 'The :attribute must be less than or equal :value kilobytes. ru',
        'string' => 'The :attribute must be less than or equal :value characters. ru',
        'array' => 'The :attribute must not have more than :value items. ru',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max. ru',
        'file' => 'The :attribute may not be greater than :max kilobytes. ru',
        'string' => 'The :attribute may not be greater than :max characters. ru',
        'array' => 'The :attribute may not have more than :max items. ru',
    ],
    'mimes' => 'The :attribute must be a file of type: :values. ru',
    'mimetypes' => 'The :attribute must be a file of type: :values. ru',
    'min' => [
        'numeric' => 'The :attribute must be at least :min. ru',
        'file' => 'The :attribute must be at least :min kilobytes. ru',
        'string' => 'The :attribute must be at least :min characters. ru',
        'array' => 'The :attribute must have at least :min items. ru',
    ],
    'not_in' => 'The selected :attribute is invalid. ru',
    'not_regex' => 'The :attribute format is invalid. ru',
    'numeric' => 'The :attribute must be a number. ru',
    'present' => 'The :attribute field must be present. ru',
    'regex' => 'The :attribute format is invalid. ru',
    'required' => 'The :attribute field is required. ru',
    'required_if' => 'The :attribute field is required when :other is :value. ru',
    'required_unless' => 'The :attribute field is required unless :other is in :values. ru',
    'required_with' => 'The :attribute field is required when :values is present. ru',
    'required_with_all' => 'The :attribute field is required when :values are present. ru',
    'required_without' => 'The :attribute field is required when :values is not present. ru',
    'required_without_all' => 'The :attribute field is required when none of :values are present. ru',
    'same' => 'The :attribute and :other must match. ru',
    'size' => [
        'numeric' => 'The :attribute must be :size. ru',
        'file' => 'The :attribute must be :size kilobytes. ru',
        'string' => 'The :attribute must be :size characters. ru',
        'array' => 'The :attribute must contain :size items. ru',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values ru',
    'string' => 'The :attribute must be a string. ru',
    'timezone' => 'The :attribute must be a valid zone. ru',
    'unique' => 'The :attribute has already been taken. ru',
    'uploaded' => 'The :attribute failed to upload. ru',
    'url' => 'The :attribute format is invalid. ru',
    'uuid' => 'The :attribute must be a valid UUID. ru',

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
            'rule-name' => 'custom-message ru',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
