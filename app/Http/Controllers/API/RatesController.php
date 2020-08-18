<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Rate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function index(Request $request)
    {
        return response()->json(Rate::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return bool|Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        return Rate::insert($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse|Response
     */
    public function show($id)
    {
        return response()->json(Rate::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return bool|Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();

        return Rate::findOrFail($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return bool|Response
     * @throws Exception
     */
    public function destroy($id)
    {
        return Rate::findOrFail($id)->delete();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'USD' => ['required', 'numeric', 'between:0,99999.99999'],
            'EUR' => ['required', 'numeric', 'between:0,99999.99999'],
            'CZK' => ['required', 'numeric', 'between:0,99999.99999'],
            'KZT' => ['required', 'numeric', 'between:0,99999.99999'],
        ]);
    }
}
