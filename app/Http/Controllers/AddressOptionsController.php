<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressOptionsStoreRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AddressOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Address/Add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressOptionsStoreRequest $request)
    {
        try {
            $address = new Address;

            $address->user_id = auth()->user()->id;
            $address->addr1 = $request->get('addr1');
            $address->addr2 = $request->get('addr2');
            $address->city = $request->get('city');
            $address->postcode = $request->get('postcode');
            $address->country = $request->get('country');

            $address->save();

            return redirect()->route('address.index');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $address = Address::find($id);
            $address->delete();
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
