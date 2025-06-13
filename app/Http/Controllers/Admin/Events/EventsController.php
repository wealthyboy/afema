<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Image;
use App\Http\Helper;

class EventsController extends Controller
{

    public function index()
    {
        $events = Event::with('images')->latest()->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function edit($id)
    {
        $event = Event::find($id);
        $helper =  new Helper;

        return view('admin.events.edit', compact('event', 'helper'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        $images = !empty($request->images) ? $request->images : [];
        $data['date_of_event'] = Helper::getFormatedDate($request->date_of_event, true);
        $event = Event::create($data);

        if (count($images) > 0) {
            $images = array_filter($images);
            foreach ($images  as $image) {
                $imgs = new Image(['image' => $image]);
                $event->images()->save($imgs);
            }
        }

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $event = Event::find($id);

        $data = $request->all();

        $images = !empty($request->images) ? $request->images : [];
        $data['date_of_event'] = Helper::getFormatedDate($request->date_of_event, true);


        $event->update($data);

        if (count($images) > 0) {
            $images = array_filter($images);
            foreach ($images  as $image) {
                $imgs = new Image(['image' => $image]);
                $event->images()->save($imgs);
            }
        }

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }


    public function destroy(Request $request, $id)
    {
        //User::canTakeAction(5);
        $rules = array(
            '_token' => 'required'
        );
        $validator = \Validator::make($request->all(), $rules);
        if (empty($request->selected)) {
            $validator->getMessageBag()->add('Selected', 'Nothing to Delete');
            return \Redirect::back()->withErrors($validator)->withInput();
        }
        $count = count($request->selected);
        // (new Activity)->Log("Deleted  {$count} Products");

        foreach ($request->selected as $selected) {
            $delete = Event::find($selected);
            $delete->delete();
        }

        return redirect()->back();
    }
}
