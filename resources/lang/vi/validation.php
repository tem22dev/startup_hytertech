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

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => ':Attribute có định dạng :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => ':Attribute phải có :digits chữ số.',
    'digits_between' => ':Attribute phải từ :min đến :max chữ số.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => ':Attribute không đúng định dạng.',
    'exists' => ':Attribute không tồn tại.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => ':Attribute định dạng là ảnh.',
    'in' => ':Attribute không nằm trong phạm vi cho phép.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => ':Attribute có định dạng là các chữ số.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':Attribute không được quá :max.',
        'file' => ':Attribute có dung lượng không quá :max kilobytes.',
        'string' => ':Attribute tối đa :max ký tự.',
        'array' => 'Chỉ cho phép tối đa :max :attribute.',
    ],
    'mimes' => ':Attribute thuộc dạng định dạng: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':Attribute tối thiểu :min.',
        'file' => ':Attribute có dung lượng tối thiểu :min kilobytes.',
        'string' => ':Attribute tối thiểu :min ký tự.',
        'array' => 'Chỉ cho phép tối thiểu :min :attribute.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ':Attribute có định dạng các chữ số.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => ':Attribute không được bỏ trống.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => ':Attribute không được bỏ trống.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => ':Attribute và :other không khớp nhau.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => ':Attribute đã tồn tại.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => ':Attribute không đúng định dạng.',
    'uuid' => 'The :attribute must be a valid UUID.',
    'not_correct' => ':Attribute không chính xác.',

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
            'rule-name' => 'custom-message',
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

    'attributes' => [
        'email' => 'địa chỉ email',
        'user_identifier' => 'mã đăng nhập',
        'password' => 'mật khẩu',
        'avatar' => 'ảnh đại diện',
        'image_360' => 'ảnh 360 độ',
        'images' => 'các hình ảnh',
        'title' => 'tiêu đề',
        'short_description' => 'mô tả ngắn',
        'price' => 'giá',
        'category_id' => 'id phân loại',
        'used_type_id' => 'id loại sử dụng',
        'product_type' => 'loại giàn thuỷ canh',
        'status' => 'trạng thái',
        'tel' => 'số điện thoại',
        'full_name' => 'họ tên',
        'date' => 'ngày',
        'district' => 'quận huyện',
        'city' => 'tỉnh thành',
        'ward' => 'xã phường thị trấn',
        'district_id' => 'mã quận huyện',
        'city_id' => 'mã tỉnh thành',
        'ward_id' => 'mã xã phường thị trấn',
        'address' => 'địa chỉ',
        'column_num' => 'số cột',
        'acreage_num' => 'diện tích',
        'description' => 'mô tả',
        'video_embed' => 'thẻ nhúng video',
        'map_embed' => 'thẻ nhúng bản đồ',
        'old_password' => 'mật khẩu cũ',
        'new_password' => 'mật khẩu mới',
        're_password' => 'xác nhận mật khẩu',
        'name' => 'tên',
        'image' => 'hình ảnh',
        'type' => 'loại'
    ],
];
