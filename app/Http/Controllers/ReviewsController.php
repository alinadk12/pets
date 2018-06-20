<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ReviewRequest;
use App\Review;
use App\User;

class ReviewsController extends Controller
{
    public function show($id = null)
    {
        $reviews = Review::latest('created_at')->published()->paginate(5);
        foreach ($reviews as $review) {
            $review->user_login = $review->user_id;
            $review->format_date = $review->created_at;
        }
        $user = User::find($id);

        return view('reviews.show', compact('reviews', 'user'));
    }

    public function showAll($id = null)
    {
        $reviews = Review::latest('created_at')->paginate(5);
        foreach ($reviews as $review) {
            $review->user_login = $review->user_id;
            $review->format_date = $review->created_at;
        }
        $user = User::find($id);

        return view('reviews.showAll', compact('reviews', 'user'));
    }

    public function store(ReviewRequest $request)
    {
        $review = new Review();

        $review->user_id = $request->user_id;
        $review->text = $request->text;

        $review->save();

        return back()->with('message', __('reviews.messages.review_sent'));
    }

    public function publish($id, Request $request)
    {
        $review = Review::find($id);
        $input = $request->all();
        $input['published'] = 1;
        $review->update($input);

        return back();
    }

    public function delete($id)
    {
        $review = Review::find($id)->delete();

        return back();
    }

    public function showDeleted()
    {
        $reviews = Review::latest('deleted_at')->onlyTrashed()->paginate(5);
        foreach ($reviews as $review) {
            $review->user_login = $review->user_id;
            $review->format_date = $review->created_at;
        }

        return view('reviews.showDeleted', ['reviews' => $reviews]);
    }

    public function restore($id)
    {
        $review = Review::onlyTrashed()->find($id)->restore();

        return back();
    }

    public function forceDelete($id)
    {
        $review = Review::onlyTrashed()->find($id)->forceDelete();

        return back();
    }

    public function edit($id)
    {
        $review = Review::find($id);

        return view('reviews.edit', compact('review'));
    }

    public function update(ReviewRequest $request)
    {
        $review = Review::find($request->id);
        $review->text = $request->text;
        $review->save();

        return redirect('/reviews/'.\Auth::id());
    }
}
