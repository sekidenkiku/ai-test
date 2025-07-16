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

    'accepted' => ':attributeを承認してください。',
    'accepted_if' => ':otherが:valueの場合、:attributeを承認してください。',
    'active_url' => ':attributeに有効なURLを指定してください。',
    'after' => ':attributeには、:dateより後の日付を指定してください。',
    'after_or_equal' => ':attributeには、:date以降の日付を指定してください。',
    'alpha' => ':attributeには、英字のみ使用できます。',
    'alpha_dash' => ':attributeには、英字・数字・ダッシュ（-）・アンダースコア（_）のみ使用できます。',
    'alpha_num' => ':attributeには、英数字のみ使用できます。',
    'array' => ':attributeには、配列を指定してください。',
    'ascii' => ':attributeには、半角英数字と記号のみ使用できます。',
    'before' => ':attributeには、:dateより前の日付を指定してください。',
    'before_or_equal' => ':attributeには、:date以前の日付を指定してください。',
    'between' => [
        'array' => ':attributeには、:min個から:max個までの項目を指定してください。',
        'file' => ':attributeには、:min KB から :max KB までのサイズのファイルを指定してください。',
        'numeric' => ':attributeには、:minから:maxまでの数値を指定してください。',
        'string' => ':attributeは:min文字から:max文字にしてください。',
    ],
    'boolean' => ':attributeには、true、またはfalseを指定してください。',
    'can' => ':attributeには許可されていない値が含まれています。',
    'confirmed' => ':attributeと確認用の入力が一致しません。',
    'contains' => ':attributeに必要な値が含まれていません。',
    'current_password' => 'パスワードが正しくありません。',
    'date' => ':attributeに正しい日付を指定してください。',
    'date_equals' => ':attributeには:dateと同じ日付を指定してください。',
    'date_format' => ':attributeの形式は:formatと一致しません。',
    'decimal' => ':attributeには小数点以下:decimal桁の数値を指定してください。',
    'declined' => ':attributeを拒否してください。',
    'declined_if' => ':otherが:valueの場合、:attributeを拒否してください。',
    'different' => ':attributeと:otherには異なった値を指定してください。',
    'digits' => ':attributeは:digits桁で指定してください。',
    'digits_between' => ':attributeは:min桁から:max桁にしてください。',
    'dimensions' => ':attributeの画像サイズが無効です。',
    'distinct' => ':attributeには重複した値を指定することはできません。',
    'doesnt_end_with' => ':attributeには:valuesのいずれかで終わる値を指定することはできません。',
    'doesnt_start_with' => ':attributeには:valuesのいずれかで始まる値を指定することはできません。',
    'email' => ':attributeに正しいメールアドレスを指定してください。',
    'ends_with' => ':attributeには:valuesのいずれかで終わる値を指定してください。',
    'enum' => '選択された:attributeは正しくありません。',
    'exists' => '選択された:attributeは正しくありません。',
    'extensions' => ':attributeには:valuesのいずれかの拡張子のファイルを指定してください。',
    'file' => ':attributeにはファイルを指定してください。',
    'filled' => ':attributeに値を指定してください。',
    'gt' => [
        'array' => ':attributeには:value個より多くの項目を指定してください。',
        'file' => ':attributeには:value KBより大きなファイルを指定してください。',
        'numeric' => ':attributeには:valueより大きな値を指定してください。',
        'string' => ':attributeは:value文字より多く入力してください。',
    ],
    'gte' => [
        'array' => ':attributeには:value個以上の項目を指定してください。',
        'file' => ':attributeには:value KB以上のファイルを指定してください。',
        'numeric' => ':attributeには:value以上の値を指定してください。',
        'string' => ':attributeは:value文字以上入力してください。',
    ],
    'hex_color' => ':attributeには有効な16進数のカラーコードを指定してください。',
    'image' => ':attributeには画像ファイルを指定してください。',
    'in' => '選択された:attributeは正しくありません。',
    'in_array' => ':attributeには:otherの値を指定してください。',
    'integer' => ':attributeには整数を指定してください。',
    'ip' => ':attributeには正しいIPアドレスを指定してください。',
    'ipv4' => ':attributeには正しいIPv4アドレスを指定してください。',
    'ipv6' => ':attributeには正しいIPv6アドレスを指定してください。',
    'json' => ':attributeには正しいJSON文字列を指定してください。',
    'list' => ':attributeにはリストを指定してください。',
    'lowercase' => ':attributeには小文字のみ使用してください。',
    'lt' => [
        'array' => ':attributeには:value個より少ない項目を指定してください。',
        'file' => ':attributeには:value KBより小さなファイルを指定してください。',
        'numeric' => ':attributeには:valueより小さな値を指定してください。',
        'string' => ':attributeは:value文字より少なく入力してください。',
    ],
    'lte' => [
        'array' => ':attributeには:value個以下の項目を指定してください。',
        'file' => ':attributeには:value KB以下のファイルを指定してください。',
        'numeric' => ':attributeには:value以下の値を指定してください。',
        'string' => ':attributeは:value文字以下で入力してください。',
    ],
    'mac_address' => ':attributeには正しいMACアドレスを指定してください。',
    'max' => [
        'array' => ':attributeには:max個以下の項目を指定してください。',
        'file' => ':attributeには:max KB以下のファイルを指定してください。',
        'numeric' => ':attributeには:max以下の数値を指定してください。',
        'string' => ':attributeは:max文字以下で入力してください。',
    ],
    'max_digits' => ':attributeには:max桁以下の数値を指定してください。',
    'mimes' => ':attributeには:valuesタイプのファイルを指定してください。',
    'mimetypes' => ':attributeには:valuesタイプのファイルを指定してください。',
    'min' => [
        'array' => ':attributeには:min個以上の項目を指定してください。',
        'file' => ':attributeには:min KB以上のファイルを指定してください。',
        'numeric' => ':attributeには:min以上の数値を指定してください。',
        'string' => ':attributeは:min文字以上で入力してください。',
    ],
    'min_digits' => ':attributeには:min桁以上の数値を指定してください。',
    'missing' => ':attributeフィールドは存在しない必要があります。',
    'missing_if' => ':otherが:valueの場合、:attributeフィールドは存在しない必要があります。',
    'missing_unless' => ':otherが:valueでない場合、:attributeフィールドは存在しない必要があります。',
    'missing_with' => ':valuesが存在する場合、:attributeフィールドは存在しない必要があります。',
    'missing_with_all' => ':valuesが存在する場合、:attributeフィールドは存在しない必要があります。',
    'multiple_of' => ':attributeには:valueの倍数を指定してください。',
    'not_in' => '選択された:attributeは正しくありません。',
    'not_regex' => ':attributeの形式が正しくありません。',
    'numeric' => ':attributeには数値を指定してください。',
    'password' => [
        'letters' => ':attributeには文字を1文字以上含めてください。',
        'mixed' => ':attributeには大文字と小文字をそれぞれ1文字以上含めてください。',
        'numbers' => ':attributeには数字を1文字以上含めてください。',
        'symbols' => ':attributeには記号を1文字以上含めてください。',
        'uncompromised' => '指定された:attributeはデータ漏洩に含まれています。別の:attributeを選択してください。',
    ],
    'present' => ':attributeフィールドが存在していません。',
    'present_if' => ':otherが:valueの場合、:attributeフィールドは存在している必要があります。',
    'present_unless' => ':otherが:valueでない場合、:attributeフィールドは存在している必要があります。',
    'present_with' => ':valuesが存在する場合、:attributeフィールドは存在している必要があります。',
    'present_with_all' => ':valuesが存在する場合、:attributeフィールドは存在している必要があります。',
    'prohibited' => ':attributeフィールドは禁止されています。',
    'prohibited_if' => ':otherが:valueの場合、:attributeフィールドは禁止されています。',
    'prohibited_unless' => ':otherが:valuesでない場合、:attributeフィールドは禁止されています。',
    'prohibits' => ':attributeフィールドは:otherが存在することを禁じています。',
    'regex' => ':attributeの形式が正しくありません。',
    'required' => ':attributeは必須項目です。',
    'required_array_keys' => ':attributeフィールドには:valuesのエントリが含まれている必要があります。',
    'required_if' => ':otherが:valueの場合、:attributeは必須項目です。',
    'required_if_accepted' => ':otherが承認された場合、:attributeは必須項目です。',
    'required_if_declined' => ':otherが拒否された場合、:attributeは必須項目です。',
    'required_unless' => ':otherが:valuesでない場合、:attributeは必須項目です。',
    'required_with' => ':valuesが指定されている場合、:attributeは必須項目です。',
    'required_with_all' => ':valuesが指定されている場合、:attributeは必須項目です。',
    'required_without' => ':valuesが指定されていない場合、:attributeは必須項目です。',
    'required_without_all' => ':valuesが指定されていない場合、:attributeは必須項目です。',
    'same' => ':attributeと:otherには同じ値を指定してください。',
    'size' => [
        'array' => ':attributeは:size個指定してください。',
        'file' => ':attributeのサイズは:sizeKBにしてください。',
        'numeric' => ':attributeには:sizeを指定してください。',
        'string' => ':attributeは:size文字で入力してください。',
    ],
    'starts_with' => ':attributeには:valuesのいずれかで始まる値を指定してください。',
    'string' => ':attributeは文字列を指定してください。',
    'timezone' => ':attributeには有効なタイムゾーンを指定してください。',
    'unique' => ':attributeの値は既に存在しています。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'uppercase' => ':attributeには大文字のみ使用してください。',
    'url' => ':attributeに正しいURLを指定してください。',
    'ulid' => ':attributeには有効なULIDを指定してください。',
    'uuid' => ':attributeには有効なUUIDを指定してください。',

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
            'rule-name' => 'カスタムメッセージ',
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
        'name' => '名前',
        'username' => 'ユーザー名',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'password_confirmation' => 'パスワード（確認）',
        'current_password' => '現在のパスワード',
        'new_password' => '新しいパスワード',
        'remember' => 'ログイン状態を保持する',
        'title' => 'タイトル',
        'content' => '内容',
        'description' => '説明',
        'date' => '日付',
        'time' => '時間',
        'available' => '利用可能',
        'size' => 'サイズ',
        'phone' => '電話番号',
        'address' => '住所',
        'age' => '年齢',
        'sex' => '性別',
        'gender' => '性別',
        'birth_date' => '生年月日',
        'photo' => '写真',
        'image' => '画像',
        'file' => 'ファイル',
        'category' => 'カテゴリ',
        'subject' => '件名',
        'message' => 'メッセージ',
        'url' => 'URL',
        'website' => 'ウェブサイト',
        'country' => '国',
        'state' => '都道府県',
        'city' => '市区町村',
        'zip' => '郵便番号',
        'postal_code' => '郵便番号',
    ],
];