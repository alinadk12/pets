<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Breed;
use App\PuppyRequest;
use App\Http\Requests\RequestForPuppy;



class RequestController extends Controller
{
    public function create($id)
    {
        $user = User::findOrFail($id);
        $breeds = Breed::all();

        return view('requests.request', compact('user', 'breeds'));
    }

    public function store(RequestForPuppy $request)
    {
        $puppyRequest = new PuppyRequest();

        $puppyRequest->user_id = $request->user_id;
        $puppyRequest->breed_id = $request->breed_id;
        $puppyRequest->gender = $request->gender;
        $puppyRequest->age_month = $request->age_month ? $request->age_month : null;
        $puppyRequest->max_price = $request->max_price ? $request->max_price : null;
        $puppyRequest->comments = $request->comments ? $request->comments : null;

        $puppyRequest->save();

        return redirect('/profile/' . $request->user_id)->with('message', __('requests.messages.request_sent'));
    }

    //дополнительные аттрибуты для вывода заявок в таблице
    protected function addAttributes($data)
    {
        $rank = 0;
        foreach ($data as $item) {
            $item->breed_name = $item->breed_id;
            $item->format_date = $item->created_at;
            $item->user_login = $item->user_id;
            $item->rank = ++$rank;
        }

        return $data;
    }

    public function showAll()
    {
        $requests = PuppyRequest::paginate(10);
        $requests = $this->addAttributes($requests);

        return view('requests.show', ['requests' => $requests]);
    }

    public function showNoReply()
    {
        $requests = PuppyRequest::noReply()->paginate(10);
        $requests = $this->addAttributes($requests);

        return view('requests.show', ['requests' => $requests]);
    }

    public function showReply()
    {
        $requests = PuppyRequest::reply()->paginate(10);
        $requests = $this->addAttributes($requests);

        return view('requests.show', ['requests' => $requests]);
    }

    public function reply($id = null)
    {
        $request = PuppyRequest::findOrFail($id);
        $request->reply = 1;
        $request->save();

        return back();
    }
}
