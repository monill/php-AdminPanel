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

    'accepted'              => 'O :attribute deve ser aceitavel.',
    'active_url'            => 'O :attribute não é uma URL válida.',
    'after'                 => 'O :attribute deve ser uma data após :date.',
    'after_or_equal'        => 'O :attribute deve ser uma data posterior ou igual a :date.',
    'alpha'                 => 'O :attribute pode conter apenas letras.',
    'alpha_dash'            => 'O :attribute pode conter apenas letras, números e traços.',
    'alpha_num'             => 'O :attribute pode conter apenas letras e números.',
    'array'                 => 'O :attribute deve ser uma array.',
    'before'                => 'O :attribute deve ser uma data anterior :date.',
    'before_or_equal'       => 'O :attribute deve ser uma data anterior ou igual a :date.',
    'between' => [
        'numeric' => 'O :attribute deve estar entre :min e :max.',
        'file'    => 'O :attribute deve estar entre :min e :max kilobytes.',
        'string'  => 'O :attribute deve estar entre :min e :max caracteres.',
        'array'   => 'O :attribute deve ter entre :min e :max itens.',
    ],
    'boolean'               => 'O :attribute deve ser verdadeiro ou falso.',
    'confirmed'             => 'O :attribute de confirmação não corresponde.',
    'date'                  => 'O :attribute não é uma data válida.',
    'date_format'           => 'O :attribute não corresponde ao formato :format.',
    'different'             => 'O :attribute e :other devem ser diferente.',
    'digits'                => 'O :attribute deve ter :digits dígitos.',
    'digits_between'        => 'O :attribute deve estar entre :min e :max dígitos.',
    'dimensions'            => 'O :attribute tem dimensões de imagem inválidas.',
    'distinct'              => 'O :attribute campo tem um valor duplicado.',
    'email'                 => 'O :attribute Deve ser um endereço de e-mail válido.',
    'exists'                => 'O :attribute selecionado não é válido.',
    'file'                  => 'O :attribute deve ser um arquivo.',
    'filled'                => 'O :attribute campo é obrigatório.',
    'image'                 => 'O :attribute deve ser uma imagem.',
    'in'                    => 'O :attribute selecionado não é válido.',
    'in_array'              => 'O campo :attribute não existe em :other.',
    'integer'               => 'O :attribute deve ser um número inteiro.',
    'ip'                    => 'O :attribute deve ser um endereço IP válido.',
    'ipv4'                  => 'O :attribute deve ser um endereço IPv4 válido.',
    'ipv6'                  => 'O :attribute deve ser um endereço IPv6 válido.',
    'json'                  => 'O :attribute deve ser uma JSON válida.',
    'max' => [
        'numeric' => 'O :attribute não pode ser superior a :max.',
        'file' => 'O :attribute não pode ser superior a :max kilobytes.',
        'string' => 'O :attribute pode não ser superior a :max caracteres.',
        'array' => 'O :attribute pode não ter mais do que :max itens.',
    ],
    'mimes'                 => 'O :attribute deve ser um arquivo de type: :values.',
    'mimetypes'             => 'O :attribute deve ser um arquivo de type: :values.',
    'min' => [
        'numeric' => 'O :attribute deve ser pelo menos :min.',
        'file' => 'O :attribute deve ser pelo menos :min kilobytes.',
        'string' => 'O :attribute deve ser pelo menos :min caracteres.',
        'array' => 'O :attribute deve ter pelo menos :min itens.',
    ],
    'not_in'                => 'O :attribute selecionado é inválido.',
    'numeric'               => 'O :attribute deve ser um número.',
    'present'               => 'O :attribute o campo deve estar presente.',
    'regex'                 => 'O :attribute formato é inválido.',
    'required'              => 'O :attribute campo é obrigatório.',
    'required_if'           => 'O :attribute campo é necessário quando :other é :value.',
    'required_unless'       => 'O :attribute campo é necessário a menos que :other está em :values.',
    'required_with'         => 'O :attribute campo é necessário quando :values está presente.',
    'required_with_all'     => 'O :attribute campo é necessário quando :values está presente.',
    'required_without'      => 'O :attribute campo é necessário quando :values não está presente.',
    'required_without_all'  => 'O :attribute é necessário um campo quando nenhum dos :values estão presentes.',
    'same'                  => 'O :attribute e :other devem combinar.',
    'size' => [
        'numeric' => 'O :attribute deve ter :size.',
        'file' => 'O :attribute deve ter :size kilobytes.',
        'string' => 'O :attribute deve ter :size caracteres.',
        'array' => 'O :attribute deve conter :size itens.',
    ],
    'string'                => 'O :attribute deve ser texto.',
    'timezone'              => 'O :attribute deve ser uma zona válida.',
    'unique'                => 'O :attribute já está em uso.',
    'uploaded'              => 'O :attribute não foi possível fazer upload.',
    'url'                   => 'O :attribute formato é inválido.',

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
