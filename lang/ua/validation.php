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

    'accepted' => 'Поле :attribute має бути прийнято.',
    'accepted_if' => 'Поле :attribute має бути прийняте, якщо :other є :value.',
    'active_url' => 'Поле :attribute має бути дійсною URL-адресою.',
    'after' => 'Поле :attribute має бути датою після :date.',
    'after_or_equal' => 'Поле :attribute має бути датою після :date або дорівнювати їй.',
    'alpha' => 'Поле :attribute має містити лише літери.',
    'alpha_dash' => 'Поле :attribute може містити лише літери, цифри, тире та підкреслення.',
    'alpha_num' => 'Поле :attribute має містити лише літери та цифри.',
    'array' => 'Поле :attribute має бути масивом.',
    'ascii' => 'Поле :attribute має містити лише однобайтові алфавітно-цифрові знаки та символи.',
    'before' => 'Поле :attribute має бути датою перед :date.',
    'before_or_equal' => 'Поле :attribute має бути датою, що передує або дорівнює :date.',
    'between' => [
        'array' => 'Поле :attribute повинно містити від :min до :max.',
        'file' => 'Поле атрибуту :має бути в межах від :min до :max кілобайт.',
        'numeric' => 'Поле атрибуту :має бути в межах від :min до :max.',
        'string' => 'Поле :attribute повинно містити від :min до :max символів.',
    ],
    'boolean' => 'Поле :attribute повинно мати значення true або false.',
    'can' => 'Поле :attribute містить недозволене значення.',
    'confirmed' => 'Підтвердження поля :attribute не збігається.',
    'current_password' => 'Неправильний пароль.',
    'date' => 'Поле :attribute має бути дійсною датою.',
    'date_equals' => 'У полі :attribute має бути дата, що дорівнює :date.',
    'date_format' => 'Поле :attribute має відповідати формату :format.',
    'decimal' => 'Поле :attribute повинно мати :десяткових знаків після коми.',
    'declined' => 'Поле :attribute має бути відхилено.',
    'declined_if' => 'Поле :attribute має бути відхилено, якщо :other є :value.',
    'different' => 'Поля :attribute та :other повинні відрізнятися.',
    'digits' => 'Поле :attribute повинно мати значення :digits цифр.',
    'digits_between' => 'Поле :attribute повинно містити від :min до :max цифр.',
    'dimensions' => 'У полі :attribute вказано невірні розміри зображення.',
    'distinct' => 'Поле :attribute має подвійне значення.',
    'doesnt_end_with' => 'Поле :attribute не повинно закінчуватися одним з наступних значень: :values.',
    'doesnt_start_with' => 'Поле :attribute не повинно починатися з одного з наступних значень: :values.',
    'email' => 'Поле :attribute має бути дійсною адресою електронної пошти.',
    'ends_with' => 'Поле :attribute має закінчуватися одним з наступних значень: :values.',
    'enum' => 'Вибраний атрибут :є недійсним.',
    'exists' => 'Вибраний атрибут :є недійсним.',
    'file' => 'Поле :attribute має бути файлом.',
    'filled' => 'Поле :attribute повинно мати значення.',
    'gt' => [
        'array' => 'Поле :attribute повинно мати більше елементів :value.',
        'file' => 'Поле :attribute має бути більшим за :value kilobytes.',
        'numeric' => 'Поле :attribute має бути більшим за :value.',
        'string' => 'Символів поля :attribute має бути більше, ніж символів поля :value.',
    ],
    'gte' => [
        'array' => 'Поле :attribute повинно мати не менше елементів :value.',
        'file' => 'Поле :attribute має бути більшим або рівним :value kilobytes.',
        'numeric' => 'Поле :attribute має бути більшим або дорівнювати :value.',
        'string' => 'Поле :attribute має бути більшим або дорівнювати символам :value.',
    ],
    'image' => 'Поле :attribute має бути зображенням.',
    'in' => 'Вибраний атрибут :є недійсним.',
    'in_array' => 'Поле :attribute повинно існувати в :other.',
    'integer' => 'Поле :attribute має бути цілим числом.',
    'ip' => 'Поле :attribute повинно містити дійсну IP-адресу.',
    'ipv4' => 'Поле :attribute має бути дійсною IPv4-адресою.',
    'ipv6' => 'Поле :attribute має бути дійсною IPv6-адресою.',
    'json' => 'Поле :attribute має бути коректним JSON-рядком.',
    'lowercase' => 'Поле :attribute має бути нижнього регістру.',
    'lt' => [
        'array' => 'Поле :attribute повинно мати менше елементів, ніж :value.',
        'file' => 'Поле :attribute має бути меншим за :value kilobytes.',
        'numeric' => 'Поле :attribute має бути меншим за :value.',
        'string' => 'Поле :attribute повинно містити менше символів, ніж :value.',
    ],
    'lte' => [
        'array' => 'Поле :attribute не повинно містити більше елементів :value.',
        'file' => 'Поле :attribute має бути меншим або рівним :value kilobytes.',
        'numeric' => 'Поле :attribute має бути меншим або рівним :value.',
        'string' => 'Поле :attribute має бути меншим або дорівнювати символам :value.',
    ],
    'mac_address' => 'Поле :attribute повинно містити дійсну MAC-адресу.',
    'max' => [
        'array' => 'Поле :attribute не повинно містити більше ніж :max елементів.',
        'file' => 'Поле :attribute не повинно бути більшим за :max kilobytes.',
        'numeric' => 'Поле :attribute не повинно бути більшим за :max.',
        'string' => 'Поле :attribute не повинно містити більше символів, ніж :max.',
    ],
    'max_digits' => 'Поле :attribute не повинно містити більше ніж :max цифр.',
    'mimes' => 'Поле :attribute має бути файлом типу: :values.',
    'mimetypes' => 'Поле :attribute має бути файлом типу: :values.',
    'min' => [
        'array' => 'Поле :attribute повинно містити щонайменше :min елементів.',
        'file' => 'Поле :attribute має бути щонайменше :min кілобайт.',
        'numeric' => 'Поле :attribute має бути не менше :min.',
        'string' => 'Поле :attribute має містити щонайменше :min символів.',
    ],
    'min_digits' => 'Поле :attribute має містити щонайменше :min цифр.',
    'missing' => 'Поле :attribute має бути відсутнє.',
    'missing_if' => 'Поле :attribute має бути відсутнім, якщо :other є :value.',
    'missing_unless' => 'Поле :attribute має бути відсутнім, якщо тільки :other не є :value.',
    'missing_with' => 'Поле :attribute має бути відсутнім, якщо присутнє поле :values.',
    'missing_with_all' => 'Поле :attribute має бути відсутнім, якщо присутні значення :values.',
    'multiple_of' => 'Поле :attribute має бути кратним :value.',
    'not_in' => 'Вибраний :attribute є недійсним.',
    'not_regex' => 'Вибраний :attribute є недійсним.',
    'numeric' => 'Поле :attribute має бути числом.',
    'password' => [
        'letters' => 'Поле :attribute має містити принаймні одну літеру.',
        'mixed' => 'Поле :attribute має містити принаймні одну велику та одну малу літеру.',
        'numbers' => 'Поле :attribute має містити принаймні одне число.',
        'symbols' => 'Поле :attribute має містити принаймні один символ.',
        'uncompromised' => 'Даний :attribute з`явився у витоку даних. Будь ласка, виберіть інший :атрибут.',
    ],
    'present' => 'Поле :attribute повинно бути присутнім.',
    'prohibited' => 'Поле :attribute заборонено.',
    'prohibited_if' => 'Поле :attribute заборонено, якщо :other є :value.',
    'prohibited_unless' => 'Поле :attribute заборонено, якщо в :values не вказано :other.',
    'prohibits' => 'Поле :attribute забороняє присутність :other.',
    'regex' => 'Формат поля :attribute є невірним.',
    'required' => 'Поле :attribute є обов`язковим.',
    'required_array_keys' => 'Поле :attribute повинно містити записи для: :values.',
    'required_if' => 'Поле :attribute є обов`язковим, якщо :other є :value.',
    'required_if_accepted' => 'Поле :attribute є обов`язковим, якщо прийнято :other.',
    'required_unless' => 'Поле :attribute є обов`язковим, якщо в :values не вказано :other.',
    'required_with' => 'Поле :attribute є обов`язковим, якщо присутнє поле :values.',
    'required_with_all' => 'Поле :attribute є обов`язковим, якщо присутні значення :values.',
    'required_without' => 'Поле :attribute є обов`язковим, якщо відсутнє поле :values.',
    'required_without_all' => 'Поле :attribute є обов`язковим, якщо жодне зі значень :не присутнє.',
    'same' => 'Поле :attribute має збігатися з :other.',
    'size' => [
        'array' => 'Поле :attribute повинно містити елементи :size.',
        'file' => 'Поле :attribute має бути :size кілобайтів.',
        'numeric' => 'Поле :attribute повинно мати значення :size.',
        'string' => 'Поле :attribute повинно містити символи :size.',
    ],
    'starts_with' => 'Поле :attribute має починатися з одного з наступних значень: :values.',
    'string' => 'Поле :attribute має бути рядком.',
    'timezone' => 'Поле :attribute повинно містити дійсний часовий пояс.',
    'unique' => ':attribute вже зайнято.',
    'uploaded' => ':attribute не вдалося завантажити.',
    'uppercase' => 'Поле :attribute має бути верхнім регістром.',
    'url' => 'Поле :attribute має бути дійсною URL-адресою.',
    'ulid' => 'Поле :attribute має бути дійсним ULID.',
    'uuid' => 'Поле :attribute має бути дійсним UUID.',

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

    'attributes' => [],

];
