<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $books = Book::paginate(3);

        return response()->json([
            'success' => true,
            'data' => $books,
            'message' => 'Books list fatched successfully.'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'genre' => 'required|max:255',
            'isbn' => 'required|numeric',
            'publisher' => 'required|max:255',
            'published' => 'required|max:255',
            'description' => 'required|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => true,
                'data' => $validator->errors(),
                'message' => 'Validation failed!'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $book = Book::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $book,
            'message' => 'Book fatched successfully.'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        //
    }
}
