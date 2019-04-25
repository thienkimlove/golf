<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{

    public function index()
    {
        return OrganizationResource::collection(Organization::paginate(25));
    }


    public function show(Organization $book)
    {
        return new OrganizationResource($book);
    }

    public function destroy(Organization $book)
    {

        if (auth('api')->user()->hasRole('system')) {
            $book->delete();

            return response()->json(null, 204);
        } else {
            return response()->json(['error' => 'Do not have permission'], 403);
        }


    }


}
