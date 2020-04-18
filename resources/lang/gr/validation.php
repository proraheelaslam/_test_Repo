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

    'accepted' => 'The :attribute must be accepted. gr',
    'active_url' => 'The :attribute is not a valid URL. gr',
    'after' => 'The :attribute must be a date after :date. gr',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date. gr',
    'alpha' => 'The :attribute may only contain letters. gr',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores. gr',
    'alpha_num' => 'The :attribute may only contain letters and numbers. gr',
    'array' => 'The :attribute must be an array. gr',
    'before' => 'The :attribute must be a date before :date. gr',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date. gr',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max. gr',
        'file' => 'The :attribute must be between :min and :max kilobytes. gr',
        'string' => 'The :attribute must be between :min and :max characters. gr',
        'array' => 'The :attribute must have between :min and :max items. gr',
    ],
    'boolean' => 'The :attribute field must be true or false. gr',
    'confirmed' => 'The :attribute confirmation does not match. gr',
    'date' => 'The :attribute is not a valid date. gr',
    'date_equals' => 'The :attribute must be a date equal to :date. gr',
    'date_format' => 'The :attribute does not match the format :format. gr',
    'different' => 'The :attribute and :other must be different. gr',
    'digits' => 'The :attribute must be :digits digits. gr',
    'digits_between' => 'The :attribute must be between :min and :max digits. gr',
    'dimensions' => 'The :attribute has invalid image dimensions. gr',
    'distinct' => 'The :attribute field has a duplicate value. gr',
    'email' => 'The :attribute must be a valid email address. gr',
    'ends_with' => 'The :attribute must end with one of the following: :values gr',
    'exists' => 'The selected :attribute is invalid. gr',
    'file' => 'The :attribute must be a file. gr',
    'filled' => 'The :attribute field must have a value. gr',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value. gr',
        'file' => 'The :attribute must be greater than :value kilobytes. gr',
        'string' => 'The :attribute must be greater than :value characters. gr',
        'array' => 'The :attribute must have more than :value items. gr',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value. gr',
        'file' => 'The :attribute must be greater than or equal :value kilobytes. gr',
        'string' => 'The :attribute must be greater than or equal :value characters. gr',
        'array' => 'The :attribute must have :value items or more. gr',
    ],
    'image' => 'The :attribute must be an image. gr',
    'in' => 'The selected :attribute is invalid. gr',
    'in_array' => 'The :attribute field does not exist in :other. gr',
    'integer' => 'The :attribute must be an integer. gr',
    'ip' => 'The :attribute must be a valid IP address. gr',
    'ipv4' => 'The :attribute must be a valid IPv4 address. gr',
    'ipv6' => 'The :attribute must be a valid IPv6 address. gr',
    'json' => 'The :attribute must be a valid JSON string. gr',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value. gr',
        'file' => 'The :attribute must be less than :value kilobytes. gr',
        'string' => 'The :attribute must be less than :value characters. gr',
        'array' => 'The :attribute must have less than :value items. gr',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value. gr',
        'file' => 'The :attribute must be less than or equal :value kilobytes. gr',
        'string' => 'The :attribute must be less than or equal :value characters. gr',
        'array' => 'The :attribute must not have more than :value items. gr',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max. gr',
        'file' => 'The :attribute may not be greater than :max kilobytes. gr',
        'string' => 'The :attribute may not be greater than :max characters. gr',
        'array' => 'The :attribute may not have more than :max items. gr',
    ],
    'mimes' => 'The :attribute must be a file of type: :values. gr',
    'mimetypes' => 'The :attribute must be a file of type: :values. gr',
    'min' => [
        'numeric' => 'The :attribute must be at least :min. gr',
        'file' => 'The :attribute must be at least :min kilobytes. gr',
        'string' => 'The :attribute must be at least :min characters. gr',
        'array' => 'The :attribute must have at least :min items. gr',
    ],
    'not_in' => 'The selected :attribute is invalid. gr',
    'not_regex' => 'The :attribute format is invalid. gr',
    'numeric' => 'The :attribute must be a number. gr',
    'present' => 'The :attribute field must be present. gr',
    'regex' => 'The :attribute format is invalid. gr',
    'required' => 'The :attribute field is required. gr',
    'required_if' => 'The :attribute field is required when :other is :value. gr',
    'required_unless' => 'The :attribute field is required unless :other is in :values. gr',
    'required_with' => 'The :attribute field is required when :values is present. gr',
    'required_with_all' => 'The :attribute field is required when :values are present. gr',
    'required_without' => 'The :attribute field is required when :values is not present. gr',
    'required_without_all' => 'The :attribute field is required when none of :values are present. gr',
    'same' => 'The :attribute and :other must match. gr',
    'size' => [
        'numeric' => 'The :attribute must be :size. gr',
        'file' => 'The :attribute must be :size kilobytes. gr',
        'string' => 'The :attribute must be :size characters. gr',
        'array' => 'The :attribute must contain :size items. gr',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values gr',
    'string' => 'The :attribute must be a string. gr',
    'timezone' => 'The :attribute must be a valid zone. gr',
    'unique' => 'The :attribute has already been taken. gr',
    'uploaded' => 'The :attribute failed to upload. gr',
    'url' => 'The :attribute format is invalid. gr',
    'uuid' => 'The :attribute must be a valid UUID. gr',

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
            'rule-name' => 'custom-message gr',
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
