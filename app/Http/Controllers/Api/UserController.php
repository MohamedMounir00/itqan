<?php

namespace App\Http\Controllers\Api;

use App\Address;
use App\Client;
use App\Helper\Helper;
use App\Http\Requests\Api\CamponyRequest;
use App\Http\Requests\Api\GovernmentRequest;
use App\Http\Requests\Api\PresonalRequest;
use App\Http\Requests\Api\UpdateCamponyRequest;
use App\Http\Requests\Api\UpdateGovernmentRequest;
use App\Http\Requests\Api\UpdatePresonalRequest;
use App\Http\Resources\Api\AddressCollection;
use App\Http\Resources\Api\ProfileCollection;
use App\Http\Resources\Api\StatusCollection;
use App\Http\Resources\Api\UserCollection;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Date;

class UserController extends Controller
{
    //


    /*
     *
     *
     * */
    public function personal(PresonalRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'password' => bcrypt($request->password),

        ]);
        $client1 = Client::create([
            'user_id' => $user->id,
            'house' => $request->house,
            'type' => 'personal',
        ]);
        $client = \Laravel\Passport\Client::where('password_client', 1)->first();

        $request->request->add([
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => $user['email'],
            'password' => $user['password'],
            'scope' => null,
        ]);

        // Fire off the internal request.
        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        //return \Route::dispatch($proxy);
        $user['token'] = $user->createToken('MyApp')->accessToken;
        $user['type'] = $client1->type;
        return new UserCollection($user);
    }


    public function government(GovernmentRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'password' => bcrypt($request->password),
        ]);
        $client1 = Client::create([
            'user_id' => $user->id,
            'minstry_id' => $request->minstry_id,
            'type' => 'government',
            'name_of_head' => $request->name_of_head,

        ]);
        $client = \Laravel\Passport\Client::where('password_client', 1)->first();

        $request->request->add([
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => $user['email'],
            'password' => $user['password'],
            'scope' => null,
        ]);

        // Fire off the internal request.
        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        //return \Route::dispatch($proxy);
        $user['token'] = $user->createToken('MyApp')->accessToken;
        $user['type'] = $client1->type;

        return new UserCollection($user);
    }

    public function company(CamponyRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'password' => bcrypt($request->password),
        ]);
        $client1 = Client::create([
            'user_id' => $user->id,
            'company_id' => $request->company_id,
            'type' => 'company',
            'name_of_head' => $request->name_of_head,

        ]);

        $client = \Laravel\Passport\Client::where('password_client', 1)->first();

        $request->request->add([
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => $user['email'],
            'password' => $user['password'],
            'scope' => null,
        ]);

        // Fire off the internal request.
        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        //return \Route::dispatch($proxy);
        $user['token'] = $user->createToken('MyApp')->accessToken;
        $user['type'] = $client1->type;

        return new UserCollection($user);
    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return new StatusCollection(false, 'اسم المستخدم او كلمه المرور خطاء ');

        }
        if (Hash::check($request->password, $user->password)) {
            $client = \Laravel\Passport\Client::where('password_client', 1)->first();

            $request->request->add([
                'grant_type' => 'password',
                'client_id' => $client->id,
                'client_secret' => $client->secret,
                'username' => $user['email'],
                'password' => $user['password'],
                'scope' => null,
                //'type'         => $user->hasRole('translator') ? 'translator' : 'user',
            ]);

            // Fire off the internal request.
            $proxy = Request::create(
                'oauth/token',
                'POST'
            );

            //return \Route::dispatch($proxy);
            $user['token'] = $user->createToken('MyApp')->accessToken;
         //
             if (isset($user->technical->type))
                 $user['type'] = $user->technical->type;
                   else
              $user['type'] = $user->client->type;

            return new UserCollection($user);


        } else {
            return new StatusCollection(false, 'اسم المستخدم او كلمه المرور خطاء ');
        }
    }

    public function myProfile()
    {
        $id = auth()->user()->id;
        $user = User::with('technical', 'client', 'country', 'city')->findOrFail($id);
        return new ProfileCollection($user);
    }

    public function Updatepersonal(UpdatePresonalRequest $request)
    {
        $id = auth()->user()->id;
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country_id = $request->country_id;
        $user->city_id = $request->city_id;
        if (isset($request->password))
            $user->password = bcrypt($request->password);
        //  $user->house     =         $request->house;
        $user->save();
        $user->client->update([
            'house' => $request->house
        ]);
        return new StatusCollection(true, 'تم التعديل بنجاح');
    }

    public function Updategovernment(UpdateGovernmentRequest $request)
    {
        $id = auth()->user()->id;
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country_id = $request->country_id;
        $user->city_id = $request->city_id;
        if (isset($request->password))
            $user->password = bcrypt($request->password);
        // $user->name_of_head =    $request->name_of_head;
        //   $user->minstry_id =    $request->minstry_id;
        $user->save();
        $user->client->update([
            'minstry_id' => $request->minstry_id,
            'name_of_head' => $request->name_of_head
        ]);
        return new StatusCollection(true, 'تم التعديل بنجاح');
    }

    public function Updatecompany(UpdateCamponyRequest $request)
    {
        $id = auth()->user()->id;
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country_id = $request->country_id;
        $user->city_id = $request->city_id;
        if (isset($request->password))
            $user->password = bcrypt($request->password);
        $user->name_of_head = $request->name_of_head;
        $user->company_id = $request->company_id;
        $user->save();
        $user->client->update([
            'company_id' => $request->company_id,
            'name_of_head' => $request->name_of_head
        ]);
        return new StatusCollection(true, 'تم التعديل بنجاح');
    }

    public function edite_imge(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        if ($request->hasFile('image')) {
            if ($user->image != '') {

                if (File::exists(public_path($user->image))) { // unlink or remove previous image from folder
                    unlink(public_path($user->avatar_location));
                }
                $img_name = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('uploads/avatars/'), $img_name);
                $db_name = 'avatars/' . $img_name;


            } else {
                $img_name = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('uploads/avatars/'), $img_name);
                $db_name = 'uploads/avatars/' . $img_name;
            }
        } else
            $db_name = $user->image;

        $user->update([
            'image' => $db_name
        ]);
        return new StatusCollection(true, 'تم التعديل بنجاح');

    }

    public function addAddress(Request $request)
    {
        $dd = Address::create([
            'user_id' => auth()->user()->id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'address' => $request->address,
            'note' => $request->note
        ]);

        return response()->json(['message' => 'تم اضافه عنوان جديد', 'id' => $dd->id]);

    }

    public function getAllMyaderss()
    {
        $address = Address::where('user_id', auth()->user()->id)->get();
        return AddressCollection::collection($address);
    }


}
