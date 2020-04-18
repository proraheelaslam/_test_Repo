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

    'accepted' => 'The :attribute must be accepted. he',
    'active_url' => 'The :attribute is not a valid URL. he',
    'after' => 'The :attribute must be a date after :date. he',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date. he',
    'alpha' => 'The :attribute may only contain letters. he',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores. he',
    'alpha_num' => 'The :attribute may only contain letters and numbers. he',
    'array' => 'The :attribute must be an array. he',
    'before' => 'The :attribute must be a date before :date. he',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date. he',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max. he',
        'file' => 'The :attribute must be between :min and :max kilobytes. he',
        'string' => 'The :attribute must be between :min and :max characters. he',
        'array' => 'The :attribute must have between :min and :max items. he',
    ],
    'boolean' => 'The :attribute field must be true or false. he',
    'confirmed' => 'The :attribute confirmation does not match. he',
    'date' => 'The :attribute is not a valid date. he',
    'date_equals' => 'The :attribute must be a date equal to :date. he',
    'date_format' => 'The :attribute does not match the format :format. he',
    'different' => 'The :attribute and :other must be different. he',
    'digits' => 'The :attribute must be :digits digits. he',
    'digits_between' => 'The :attribute must be between :min and :max digits. he',
    'dimensions' => 'The :attribute has invalid image dimensions. he',
    'distinct' => 'The :attribute field has a duplicate value. he',
    'email' => 'The :attribute must be a valid email address. he',
    'ends_with' => 'The :attribute must end with one of the following: :values he',
    'exists' => 'The selected :attribute is invalid. he',
    'file' => 'The :attribute must be a file. he',
    'filled' => 'The :attribute field must have a value. he',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value. he',
        'file' => 'The :attribute must be greater than :value kilobytes. he',
        'string' => 'The :attribute must be greater than :value characters. he',
        'array' => 'The :attribute must have more than :value items. he',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value. he',
        'file' => 'The :attribute must be greater than or equal :value kilobytes. he',
        'string' => 'The :attribute must be greater than or equal :value characters. he',
        'array' => 'The :attribute must have :value items or more. he',
    ],
    'image' => 'The :attribute must be an image. he',
    'in' => 'The selected :attribute is invalid. he',
    'in_array' => 'The :attribute field does not exist in :other. he',
    'integer' => 'The :attribute must be an integer. he',
    'ip' => 'The :attribute must be a valid IP address. he',
    'ipv4' => 'The :attribute must be a valid IPv4 address. he',
    'ipv6' => 'The :attribute must be a valid IPv6 address. he',
    'json' => 'The :attribute must be a valid JSON string. he',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value. he',
        'file' => 'The :attribute must be less than :value kilobytes. he',
        'string' => 'The :attribute must be less than :value characters. he',
        'array' => 'The :attribute must have less than :value items. he',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value. he',
        'file' => 'The :attribute must be less than or equal :value kilobytes. he',
        'string' => 'The :attribute must be less than or equal :value characters. he',
        'array' => 'The :attribute must not have more than :value items. he',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max. he',
        'file' => 'The :attribute may not be greater than :max kilobytes. he',
        'string' => 'The :attribute may not be greater than :max characters. he',
        'array' => 'The :attribute may not have more than :max items. he',
    ],
    'mimes' => 'The :attribute must be a file of type: :values. he',
    'mimetypes' => 'The :attribute must be a file of type: :values. he',
    'min' => [
        'numeric' => 'The :attribute must be at least :min. he',
        'file' => 'The :attribute must be at least :min kilobytes. he',
        'string' => 'The :attribute must be at least :min characters. he',
        'array' => 'The :attribute must have at least :min items. he',
    ],
    'not_in' => 'The selected :attribute is invalid. he',
    'not_regex' => 'The :attribute format is invalid. he',
    'numeric' => 'The :attribute must be a number. he',
    'present' => 'The :attribute field must be present. he',
    'regex' => 'The :attribute format is invalid. he',
    'required' => 'The :attribute field is required. he',
    'required_if' => 'The :attribute field is required when :other is :value. he',
    'required_unless' => 'The :attribute field is required unless :other is in :values. he',
    'required_with' => 'The :attribute field is required when :values is present. he',
    'required_with_all' => 'The :attribute field is required when :values are present. he',
    'required_without' => 'The :attribute field is required when :values is not present. he',
    'required_without_all' => 'The :attribute field is required when none of :values are present. he',
    'same' => 'The :attribute and :other must match. he',
    'size' => [
        'numeric' => 'The :attribute must be :size. he',
        'file' => 'The :attribute must be :size kilobytes. he',
        'string' => 'The :attribute must be :size characters. he',
        'array' => 'The :attribute must contain :size items. he',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values he',
    'string' => 'The :attribute must be a string. he',
    'timezone' => 'The :attribute must be a valid zone. he',
    'unique' => 'The :attribute has already been taken. he',
    'uploaded' => 'The :attribute failed to upload. he',
    'url' => 'The :attribute format is invalid. he',
    'uuid' => 'The :attribute must be a valid UUID. he',

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
            'rule-name' => 'custom-message he',
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
