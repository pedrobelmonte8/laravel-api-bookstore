<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $books = Book::with('category')->get();
        return response()->json([
            'success' => true,
            'data' => BookResource::collection($books),
            'message' => 'Books retrieved successfully.',
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $book = Book::create($request->validated());

        return response()->json([
            'success' => true,
            'data' => new BookResource($book),
            'message' => 'Book created successfully.',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::with('category')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new BookResource($book),
            'message' => 'Book retrieved successfully.',
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, string $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => new BookResource($book),
            'message' => 'Book updated successfully.',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json([
            'success' => true,
            'message' => 'Book deleted successfully.',
        ], 200);
    }
}
