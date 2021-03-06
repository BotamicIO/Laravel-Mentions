<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Mentions.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Mentions\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    /**
     * @param $type
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, $type): JsonResponse
    {
        try {
            $query = $request->get('q');
            $column = $request->get('c');
            $model = app()->make(config('laravel-mentions.'.$type));

            $records = $model->where($column, 'LIKE', "%$query%")
                             ->get([$column]);

            foreach ($records as $record) {
                $resultColumns[] = $record->$column;
            }

            return response()->json($resultColumns);
        } catch (\ReflectionException $e) {
            return response()->json('Not Found', 404);
        }
    }
}
