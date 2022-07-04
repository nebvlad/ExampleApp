<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreRequest;
use App\Models\Links;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LinksController extends Controller
{

    public function show(Request $request, string $link_id)
    {
        $link = Links::query()
            ->where('uuid', $link_id)
            ->where('expired_at', '>=', Carbon::now())
            ->get()
            ->first();

        if (!$link) {
            abort(404, 'Link not found or expired.');
        } elseif (!$link->enter_limit || $link->enter_count < $link->enter_limit) {
            $link->increment('enter_count');
            $link->save();
            return Redirect::to($link->link);
        }

        abort(404, 'Link not found or expired.');
    }

    public function create()
    {
        return view('links.create', [
        ]);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all();

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $link = Links::query()->create([
            'uuid' => substr(str_shuffle($permitted_chars), 0, 8),
            'link' => $data['link'],
            'enter_limit' => $data['enter_limit'],
            'expired_at' => Carbon::now()->addHours($data['expired_at'])
        ]);

        return back()->with([
            'link' => $link,
        ]);
    }
}
