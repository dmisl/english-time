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

    'accepted' => 'Pole :attribute musi zostać zaakceptowane.',
    'accepted_if' => 'Pole :attribute musi być akceptowane, gdy :other jest :value.',
    'active_url' => 'Pole :attribute musi być prawidłowym adresem URL.',
    'after' => 'Pole :attribute musi być datą po :date.',
    'after_or_equal' => 'Pole :attribute musi być datą po lub równą :date.',
    'alpha' => 'Pole :attribute może zawierać tylko litery.',
    'alpha_dash' => 'Pole :attribute może zawierać tylko litery, cyfry, myślniki i podkreślniki.',
    'alpha_num' => 'Pole :attribute może zawierać tylko litery i cyfry.',
    'array' => 'Pole :attribute musi być tablicą.',
    'ascii' => 'Pole :attribute może zawierać tylko jednobajtowe znaki alfanumeryczne i symbole.',
    'before' => 'Pole :attribute musi być datą przed :date.',
    'before_or_equal' => 'Pole :attribute musi być datą wcześniejszą lub równą :date.',
    'between' => [
        'array' => 'Pole :attribute musi mieć od :min do :max elementów.',
        'file' => 'Pole :attribute musi zawierać się w przedziale od :min do :max kilobajtów.',
        'numeric' => 'Pole :attribute musi zawierać się w przedziale od :min do :max.',
        'string' => 'Pole :attribute musi zawierać od :min do :max znaków.',
    ],
    'boolean' => 'Pole :attribute musi mieć wartość true lub false.',
    'can' => 'Pole :attribute zawiera niedozwoloną wartość.',
    'confirmed' => 'Potwierdzenie pola :attribute nie jest zgodne.',
    'current_password' => 'Hasło jest nieprawidłowe.',
    'date' => 'Pole :attribute musi być prawidłową datą.',
    'date_equals' => 'Pole :attribute musi być datą równą :date.',
    'date_format' => 'Pole :attribute musi być zgodne z formatem :format.',
    'decimal' => 'Pole :attribute musi mieć :decimal miejsca dziesiętne.',
    'declined' => 'Pole :attribute musi zostać odrzucone.',
    'declined_if' => 'Pole :attribute musi zostać odrzucone, gdy :other jest :value.',
    'different' => 'Pola :attribute i :other muszą być różne.',
    'digits' => 'Pole :attribute musi mieć postać :digits cyfry.',
    'digits_between' => 'Pole :attribute musi zawierać się w przedziale od :min do :max cyfr.',
    'dimensions' => 'Pole :attribute ma nieprawidłowe wymiary obrazu.',
    'distinct' => 'Pole :attribute ma zduplikowaną wartość.',
    'doesnt_end_with' => 'Pole :attribute nie może kończyć się jednym z poniższych znaków: :values.',
    'doesnt_start_with' => 'Pole :attribute nie może zaczynać się od jednego z poniższych: :values.',
    'email' => 'Pole :attribute musi być prawidłowym adresem e-mail.',
    'ends_with' => 'Pole :attribute musi kończyć się jednym z poniższych znaków: :values.',
    'enum' => 'Wybrany :atrybut jest nieprawidłowy.',
    'exists' => 'Wybrany :atrybut jest nieprawidłowy.',
    'file' => 'Pole :attribute musi być plikiem.',
    'filled' => 'Pole :attribute musi mieć wartość.',
    'gt' => [
        'array' => 'Pole :attribute musi mieć więcej niż :value elementów.',
        'file' => 'Pole :attribute musi być większe niż :value kilobajtów.',
        'numeric' => 'Pole :attribute musi być większe niż :value.',
        'string' => 'Pole :attribute musi być większe niż :value znaków.',
    ],
    'gte' => [
        'array' => 'Pole :attribute musi mieć co najmniej :value items.',
        'file' => 'Pole :attribute musi być większe lub równe :value kilobajtów.',
        'numeric' => 'Pole :attribute musi być większe lub równe :value.',
        'string' => 'Pole :attribute musi być większe lub równe znakom :value.',
    ],
    'image' => 'Pole :attribute musi być obrazem.',
    'in' => 'Wybrany :atrybut jest nieprawidłowy.',
    'in_array' => 'Pole :attribute musi istnieć w :other.',
    'integer' => 'Pole :attribute musi być liczbą całkowitą.',
    'ip' => 'Pole :attribute musi być prawidłowym adresem IP.',
    'ipv4' => 'Pole :attribute musi być prawidłowym adresem IPv4.',
    'ipv6' => 'Pole :attribute musi być prawidłowym adresem IPv6.',
    'json' => 'Pole :attribute musi być prawidłowym ciągiem JSON.',
    'lowercase' => 'Pole :attribute musi być pisane małymi literami.',
    'lt' => [
        'array' => 'Pole :attribute musi mieć mniej niż :value elementów.',
        'file' => 'Pole :attribute musi być mniejsze niż :value kilobajtów.',
        'numeric' => 'Pole :attribute musi być mniejsze niż :value.',
        'string' => 'Pole :attribute musi być mniejsze niż :value znaków.',
    ],
    'lte' => [
        'array' => 'Pole :attribute nie może mieć więcej niż :value elementów.',
        'file' => 'Pole :attribute musi być mniejsze lub równe :value kilobajtów.',
        'numeric' => 'Pole :attribute musi być mniejsze lub równe :value.',
        'string' => 'Pole :attribute musi być mniejsze lub równe znakom :value.',
    ],
    'mac_address' => 'Pole :attribute musi być prawidłowym adresem MAC',
    'max' => [
        'array' => "Pole :attribute nie może mieć więcej niż :max elementów.",
        'file' => 'Pole :attribute nie może być większe niż :max kilobajtów',
        'numeric' => 'Pole :attribute nie może być większe niż :max.',
        'string' => 'Pole :attribute nie może być większe niż :max znaków',
    ],
    'max_digits' => 'Pole :attribute nie może mieć więcej niż :max cyfr',
    'mimes' => 'Pole :attribute musi być plikiem typu: :values.',
    'mimetypes' => 'Pole :attribute musi być plikiem typu: :values.',
    'min' => [
        'array' => "Pole :attribute musi mieć co najmniej :min elementów.",
        'file' => 'Pole :attribute musi mieć rozmiar co najmniej :min kilobajtów',
        'numeric' => 'Pole :attribute musi mieć rozmiar co najmniej :min.',
        'string' => 'Pole :attribute musi mieć co najmniej :min znaków',
    ],
    'min_digits' => 'Pole :attribute musi mieć co najmniej :min cyfr.',
    'missing' => "Pole :attribute musi być brakujące.",
    'missing_if' => "Pole :attribute musi być brakujące, gdy :other jest :value.",
    'missing_unless' => 'Musi brakować pola :attribute, chyba że :other jest :value.',
    'missing_with' => 'Musi brakować pola :attribute, gdy :values jest obecne.',
    'missing_with_all' => 'Pola :attribute musi brakować, gdy :values jest obecne.',
    'multiple_of' => "Pole :attribute musi być wielokrotnością pola :value.",
    'not_in' => 'Wybrany :attribute jest nieprawidłowy.',
    'not_regex' => "Format pola :attribute jest nieprawidłowy.",
    'numeric' => 'Pole :attribute musi być liczbą',
    'password' => [
        'letters' => 'Pole :attribute musi zawierać co najmniej jedną literę.',
        'mixed' => 'Pole :attribute musi zawierać co najmniej jedną wielką i jedną małą literę.',
        'numbers' => 'Pole :attribute musi zawierać co najmniej jedną liczbę.',
        'symbols' => 'Pole :attribute musi zawierać co najmniej jeden symbol',
        'uncompromised' => "Podany :attribute pojawił się w wycieku danych. Wybierz inny :attribute.",
    ],
    'present' => 'Pole :attribute musi być obecne.',
    'prohibited' => "Pole :attribute jest zabronione.",
    'prohibited_if' => "Pole :attribute jest zabronione, gdy :other jest :value.",
    'prohibited_unless' => "Pole :attribute jest zabronione, chyba że :other jest w :values.",
    'prohibits' => 'Pole :attribute zabrania obecności :other',
    'regex' => 'Format pola :attribute jest nieprawidłowy.',
    'required' => 'Pole :attribute jest wymagane',
    'required_array_keys' => "Pole :attribute musi zawierać wpisy dla: :values.",
    'required_if' => 'Pole :attribute jest wymagane, gdy :other jest :value.',
    'required_if_accepted' => 'Pole :attribute jest wymagane, gdy :other jest zaakceptowane',
    'required_unless' => 'Pole :attribute jest wymagane, chyba że :other jest w :values.',
    'required_with' => 'Pole :attribute jest wymagane, gdy :values jest obecne.',
    'required_with_all' => 'Pole :attribute jest wymagane, gdy :values jest obecne.',
    'required_without' => 'Pole :attribute jest wymagane, gdy :values nie jest obecne.',
    'required_without_all' => 'Pole :attribute jest wymagane, gdy żadna z :values nie jest obecna',
    'same' => "Pole :attribute musi być zgodne z :other.",
    'size' => [
        'array' => 'Pole :attribute musi zawierać elementy :size',
        'file' => 'Pole :attribute musi mieć rozmiar :size kilobajtów.',
        'numeric' => 'Pole :attribute musi mieć wartość :size',
        'string' => 'Pole :attribute musi mieć rozmiar :size characters.',
    ],
    'starts_with' => 'Pole :attribute musi zaczynać się od jednego z poniższych: :values.',
    'string' => 'Pole :attribute musi być ciągiem znaków',
    'timezone' => "Pole :attribute musi być prawidłową strefą czasową.",
    'unique' => "Atrybut :attribute został już pobrany.",
    'uploaded' => 'Nie udało się przesłać :attribute.',
    'uppercase' => 'Pole :attribute musi być pisane wielkimi literami',
    'url' => 'Pole :attribute musi być prawidłowym adresem URL.',
    'ulid' => 'Pole :attribute musi być poprawnym identyfikatorem ULID',
    'uuid' => 'Pole :attribute musi być poprawnym identyfikatorem UUID',

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
