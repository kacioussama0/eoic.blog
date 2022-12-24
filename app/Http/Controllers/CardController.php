<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Magazine;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class CardController extends Controller
{
    public function __construct() {
        $this -> middleware('auth')->except('cards');

    }


    public function index()
    {
        $cards = Card::latest()->paginate(5);
        $cardsEN = Card::latest()->where('image_en','<>' , null)->paginate(5);
        $cardsFR = Card::latest()->where('image_fr', '<>' , null)->paginate(5);
        return view('admin.cards.index',compact('cards','cardsEN','cardsFR'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cards.create');

    }


    public function store(Request $request)
    {
        $request->validate([
            'image'=> [
                'required',
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ],
            'image_en'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ],
            'image_fr'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ]
        ]);



        $image = $imageFR = $imageEN = '';

        $image = $request->file('image')->store('cards/ar','public');

        if(!empty($request->file('image_en'))) {
            $imageEN = $request->file('image_en')->store('cards/en','public');
        }

        if(!empty($request->file('image_fr'))) {
            $imageFR = $request->file('image_fr')->store('cards/fr','public');
        }

        $cards = Card::create([
            'image' => $image,
            'image_en' => $imageEN,
            'image_fr' => $imageFR,
            'user_id' => auth()->id(),
            'is_published' => $request -> is_published ? 1 : 0
        ]);


        return redirect()->to('admin/cards')->with([
            'success' => __('forms.add-success')
        ]);
    }



    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        return view('admin.cards.edit',compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        $request->validate([
            'image'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ],
            'image_en'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ],
            'image_fr'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ]
        ]);



        $image = $imageFR = $imageEN = '';



        if(!empty($request->file('image'))) {

            if (\Illuminate\Support\Facades\File::exists('storage/' . $card->image) && $card->image != null) {
                unlink(public_path("storage/" . $card->image));

            }

            $image = $request->file('image')->store('cards/ar','public');

        }

        if(!empty($request->file('image_en'))) {

            if (\Illuminate\Support\Facades\File::exists('storage/' . $card->image_en) && $card->image_en != null) {
                unlink(public_path("storage/" . $card->image_en));
            }

            $imageEN = $request->file('image_en')->store('cards/en','public');
        }

        if(!empty($request->file('image_fr'))) {

            if (\Illuminate\Support\Facades\File::exists('storage/' . $card->image_fr) && $card->image_fr != null) {
                unlink(public_path("storage/" . $card->image_fr));
            }

            $imageFR = $request->file('image_fr')->store('cards/fr','public');
        }

        $card->update([
            'image' => $image ? $image : $card -> image,
            'image_en' => $imageEN ? $imageEN : $card -> image_en,
            'image_fr' => $imageFR ? $imageFR : $card -> image_fr,
            'user_id' => auth()->id(),
            'is_published' => $request -> is_published ? 1 : 0
        ]);


        return redirect()->to('admin/cards')->with([
            'success' => __('forms.edit-success')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {

            if (\Illuminate\Support\Facades\File::exists('storage/' . $card->image) && $card->image != null) {
                unlink(public_path("storage/" . $card->image));
            }




            if (\Illuminate\Support\Facades\File::exists('storage/' . $card->image_en) && $card->image_en != null) {
                unlink(public_path("storage/" . $card->image_en));
            }




            if (\Illuminate\Support\Facades\File::exists('storage/' . $card->image_fr) && $card->image_fr != null) {
                unlink(public_path("storage/" . $card->image_fr));
            }

            $card -> delete();

            return redirect()->to('admin/cards')->with([
                'success' => __('forms.deleted-success')
            ]);
    }


    public function cards() {

        if(config('app.locale') == 'en') {
            $cards = Card::where('is_published','1')->where('image_en','<>' , '')->latest()->get();

        }
        elseif(config('app.locale') == 'fr') {
            $cards = Card::where('is_published','1')->where('image_fr','<>' , '')->latest()->get();

        }else {
            $cards = Card::where('is_published','1')->where('image','<>' , '')->latest()->get();

        }


        return view('cards',compact('cards'));
    }
}
