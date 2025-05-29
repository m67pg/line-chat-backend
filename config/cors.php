<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | ここではアプリケーションのCORS設定を定義します。
    | Reactや他のフロントエンドとAPI連携する場合に必要です。
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'], // すべてのHTTPメソッドを許可（GET, POSTなど）

    'allowed_origins' => ['https://line-chat.fun', 'https://www.line-chat.fun'], // Reactの開発サーバー

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // すべてのリクエストヘッダーを許可

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true, // 認証情報（クッキーなど）を許可

];
