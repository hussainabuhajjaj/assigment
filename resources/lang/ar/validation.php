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
    'after' => ':attribute يجب ان يكون تاريخ اكبر من تاريخ اليوم',
//    'after' => 'The :attribute must be a date after :date.',
    'alpha' => ':attribute يجب ان تحتوي على حروف فقط',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => ':attribute يجب ان يحتوي على حروف و ارقام فقط.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => ':attribute يجب ان يكون بين :min و :max',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The  field must be true or false.',
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'تاكيد :attribute ليس متطابق',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => ' :attribute يجب ان يكون عنوان بريد إلكتروني صحيح',
    'ends_with' => 'The :attribute must end with one of the following: :values',
    'exists' => ':attribute المدخل خاطئ',
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
    'image' => ' :attribute يجب ان تكون صورة.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
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
        'numeric' => ':attribute لا يجب ان يكون اكبر من :max',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attribute يجب ان يكون على الاقل :min',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => ':attribute يجب ان يكون على الاقل :min حروف',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ' :attribute يجب ان يكون رقم.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => ' :attribute مطلوب',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'يرجى ادخال :attribute او :values ',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => ' :attribute يجب ان يكون نص.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => ':attribute تم استخدامه',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

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
        'name' => 'الإسم',
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة المرور',
        'username' => 'إسم المستخدم',
        'user_type' => 'نوع المستخدم',
        'gender' => 'الجنس',
        'phone_code' => 'كود الاتصال للدولة',
        'country_id' => 'الدولة',
        'field_id' => 'المجال',
        'type_id' => 'نوع التجربة',
        'price_id' => 'التكلفة',
        'city_id' => 'المدينة',
        'phone' => 'رقم الجوال',
        'mobile' => 'رقم الجوال',
        'avatar' => 'الصورة الشخصية',
        'interest_id' => 'الإهتمامات',
        'message' => 'الرسالة',
        'subject' => 'الموضوع',
        'role' => 'الصلاحيات',

        // user student

        'age' => 'العمر',
        'level' => 'المرحلة الدراسية',
        'school' => 'اسم المدرسة',
        'unversity' => 'اسم الجامعة',
        'start_year' => 'سنة البدء في الدراسة',
        'graduated_year' => 'سنة التخرج المتوقعة',

        // user consumer
        'qualification' => 'المؤهل',
        'job' => 'المهنة',


        // user government
        'company' => 'الشركة',
        'companyName' => 'اسم الشركة',
        'stablishment_data' => 'تاريخ التأسيس',
        'owners' => 'الملاك',
        'section' => 'القطاع',

        // user factory
        'activity' => 'نشاط المصنع',
        'address' => 'المكان',

        // user media
        'type' => 'نوع المجال',

        // pages

        'title_ar' => 'العنوان باللغة العربية',
        'content_ar' => 'المحتوى باللغة العربية',

        'title_en' => 'العنوان باللغة الإنجليزية ',
        'content_en' => 'المحتوى باللغة الإنجليزية',

        // faqs

        'question' => 'السؤال',
        'answer' => 'الجواب',

        // Tajarob

        'description'   => 'الوصف',
        'price'   => 'التكلفة',
        'video_link'   => 'فيديو',
        'link'   => 'رابط فيديو',

        'comment' => 'التعليق',
        'rate' => 'التقييم',


        'priceName' => 'السعر',
        'deadline' => 'تاريخ التسليم',


        // Proposal

        'tajroba_request_id' => 'طلب التجربة',
        'duration' => 'مدة التسليم',
        'price_amount' => 'قيمة العرض',
        'details' => 'تفاصيل العرض',

        // messages
        'to_user'   => 'المرسل اليه',

        'fieldName'   => 'اسم المجال',
        'icon'   => 'ايقونة المجال',


    ],

];
