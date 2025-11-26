<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiDocsController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'API Documentation',
            'endpoints' => [

                // Auth
                'POST /api/auth/register' => [
                    'description' => 'Register a new user',
                    'body' => [
                        'name' => 'string, required',
                        'email' => 'string, required, unique',
                        'password' => 'string, required, min:6'
                    ],
                    'response' => [
                        'token' => 'string'
                    ]
                ],
                'POST /api/auth/login' => [
                    'description' => 'Login user',
                    'body' => [
                        'email' => 'string, required',
                        'password' => 'string, required'
                    ],
                    'response' => [
                        'token' => 'string'
                    ]
                ],

                // Categories
                'GET /api/categories' => [
                    'description' => 'List all categories',
                    'headers' => [
                        'Authorization' => 'Bearer {token}'
                    ],
                    'response' => [
                        '[ { "id": 1, "name": "Electronics", "slug": "electronics" }, ... ]'
                    ]
                ],

                // Items
                'GET /api/categories/{category:slug}/items' => [
                    'description' => 'List items in a category',
                    'headers' => [
                        'Authorization' => 'Bearer {token}'
                    ],
                    'query_params' => [
                        'page' => 'integer, optional, default 1',
                        'per_page' => 'integer, optional, default 10, max 50',
                        'q' => 'string, optional, search in item name',
                        'min_price' => 'number, optional',
                        'max_price' => 'number, optional',
                        'sort' => 'string, optional, one of price_asc|price_desc|name_asc|name_desc'
                    ],
                    'response' => [
                        'paginated items with metadata'
                    ]
                ],

            ]
        ]);
    }
}
