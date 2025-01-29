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

    'accepted'             => 'Debe ser aceptado.',
    'active_url'           => 'No es una URL válida.',
    'after'                => 'Debe ser una fecha posterior a :date.',
    'after_or_equal'       => 'Debe ser una fecha posterior o igual a :date.',
    'alpha'                => 'Sólo puede contener letras.',
    'alpha_dash'           => 'Sólo puede contener letras, números y guiones (a-z, 0-9, -_).',
    'alpha_num'            => 'Sólo puede contener letras y números.',
    'alpha_spaces'         => 'Sólo puede contener letras y espacios.',
    'alpha_spaces_num'     => 'Sólo puede contener letras, números y espacios.',
    'alpha_nombres'        => 'Sólo puede contener letras, espacios y caracter apóstrofo (\') ',
    'array'                => 'Debe ser un arreglo con elementos válidos.',
    'before'               => 'Debe ser una fecha anterior a :date.',
    'before_or_equal'      => 'Debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => 'Debe ser un valor entre :min y :max.',
        'file'    => 'El archivo debe pesar entre :min y :max kilobytes.',
        'string'  => 'Debe contener entre :min y :max caracteres.',
        'array'   => 'Debe contener entre :min y :max elementos.',
    ],
    'boolean'              => 'Debe ser verdadero o falso.',
    'confirmed'            => 'El campo confirmación de no coincide.',
    'captcha'              => 'Por favor, complete el captcha.',
    'current_password'     => 'Las contraseñas no coinciden.',
    'date'                 => 'No corresponde con una fecha válida.',
    'date_format'          => 'No corresponde con el formato de fecha :format.',
    'different'            => 'Los campos y :other deben ser diferentes.',
    'digits'               => 'Debe ser un número de :digits dígitos.',
    'digits_between'       => 'Debe contener entre :min y :max dígitos.',
    'dimensions'           => 'El campo tiene dimensiones inválidas.',
    'distinct'             => 'El campo tiene un valor duplicado.',
    'email'                => 'Debe ser una dirección de correo válida.',
    'notificacion'         => 'El correo electrónico ingresado debe pertenecer a un dominio institucional ',
    'exists'               => 'Seleccione un elemento de la lista.',
    'file'                 => 'Debe ser un archivo.',
    'filled'               => 'Debe tener algún valor.',
    'indisposable' => 'El correo definido se encuentra en lista negra.',
    'image'                => 'Debe ser una imagen.',
    'in'                   => 'El campo es inválido.',
    'in_array'             => 'No existe en :other.',
    'integer'              => 'Debe ser un número entero.',
    'ip'                   => 'Debe ser una dirección IP válida.',
    'ipv4'                 => 'Debe ser una dirección IPv4 válida.',
    'ipv6'                 => 'Debe ser una dirección IPv6 válida.',
    'json'                 => 'Debe ser una cadena de texto JSON válida.',
    'max'                  => [
        'numeric' => 'No debe ser mayor a :max.',
        'file'    => 'El archivo no debe pesar más de :max kilobytes.',
        'string'  => 'No debe contener más de :max caracteres.',
        'array'   => 'No debe contener más de :max.',
    ],
    'mimes'                => 'Debe ser un archivo de tipo :values.',
    'mimetypes'            => 'Debe ser un archivo de tipo :values.',
    'min'                  => [
        'numeric' => 'Debe tener al menos :min.',
        'file'    => 'El archivo debe pesar al menos :min kilobytes.',
        'string'  => 'Debe contener al menos :min caracteres.',
        'array'   => 'Debe contener al menos :min elementos.',
    ],
    'not_in'               => 'Seleccionado es inválido.',
    'not_regex'            => 'El formato del campo es inválido.',
    'numeric'              => 'Debe ser un número.',
    'numerics'             => 'Debe tener :min y :min digitos.',
    'present'              => 'Debe estar presente.',
    'password' => [
        'throttled' => 'You have requested password reset recently, please check your email.',
        'mixed' => 'Debe contener simbolos, una minúscula, una mayúscula y números',
        'uncompromised' => 'Por favor indique una contraseña que no sea fácil de comprometer al aplicativo',
    ],
    'password_string'      => 'Debe tener al menos 2 mayúsculas, 2 minúsculas, 2 números, 2 carácteres especiales y una longitud mínima de 12 carácteres',
    'phone'                => 'Debe ser un número teléfonico válido',
    'recaptcha'            => 'El :attribute es incorrecto.',
    'regex'                => 'El formato del campo es inválido.',
    'required'             => 'El campo es Requerido.',
    'required_if'          => 'Requerido cuando el campo :other es :value.',
    'required_unless'      => 'El campo es requerido a menos que :other se encuentre en :values.',
    'required_with'        => 'Requerido cuando :values está presente.',
    'required_with_all'    => 'Requerido cuando :values está presente.',
    'required_without'     => 'Requerido cuando :values no está presente.',
    'required_without_all' => 'Requerido cuando ninguno de los campo :attributes :values está presente.',
    'same'                 => 'Los campos :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'Debe ser :size.',
        'file'    => 'El archivo debe pesar :size kilobytes.',
        'string'  => 'Debe contener :size caracteres.',
        'array'   => 'Debe contener :size elementos.',
    ],
    'string'               => 'Debe ser una cadena de caracteres.',
    'string_alpha'         => 'Debe ser una cadena de caracteres con letras, números y especiales como , y .',
    'string_user'         => 'Debe ser una cadena de caracteres con letras minúculas, números y especiales como _ y .',
    'timezone'             => 'Debe contener una zona válida.',
    'unique'               => 'El valor del campo ya está en uso.',
    'uploaded'             => 'Hubo un falló al subir el archivo.',
    'url'                  => 'El formato  url del campo :attribute es inválido.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
