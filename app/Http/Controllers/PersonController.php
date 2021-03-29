<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\View\View;


class PersonController extends Controller
{
    public function getPerson()
    {
        $person = Person::where('status','active')->orderByDesc('id')->paginate(5);
        \Illuminate\Support\Facades\View::share('person',$person);
        return \view('backend.person');
    }
    public function getPersonForm($id = 0)
    {
        $entry = new Person;
        if ($id > 0) {
            $entry = \App\Models\Person::find($id);
        }
        \Illuminate\Support\Facades\View::share('entry', $entry);
        return view('backend.person-new');
    }
    public function postPersonCreated(Request $inputs)
    {
        if (isset($inputs->id) && $inputs->id) {
            return $this->updatePerson($inputs);
        } else {
            return $this->createPerson($inputs);
        }
    }

    protected function updatePerson($data)
    {
        \App\Models\Person::select('id')->whereId($data['id'])
            ->update([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'address' => $data['address']
            ]);
        return redirect()->back();
    }
    protected function createPerson($data)
    {
        \App\Models\Person::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'address' => $data['address']
        ]);
        return redirect()->back();
    }
    public function getDeletePerson($id)
    {
        \App\Models\Person::deleted($id);
        \App\Models\Person::whereId($id)->update(['status' => 'deleted']);
        return redirect()->route('get-person');
    }

}
