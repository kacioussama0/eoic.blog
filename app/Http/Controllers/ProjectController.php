<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'title_en' => 'required|min:5',
            'title_fr' => 'required|min:5',
            'description' => 'required|min:5',
            'description_fr' => 'required|min:5',
            'description_en' => 'required|min:5',
            'amount' => 'required',
            'thumbnail'=> [
                'required',
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ],
            'thumbnail_en'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ],
            'thumbnail_fr'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ]
        ]);

        $thumbnail = $thumbnailFR = $thumbnailEN = '';

        $thumbnail = $request->file('thumbnail')->store('projects/ar/','public');

        if(!empty($request->file('thumbnail_fr'))) {
            $thumbnailFR = $request->file('thumbnail_fr')->store('projects/fr/','public');
        }

        if(!empty($request->file('thumbnail_en'))) {
            $thumbnailEN = $request->file('thumbnail_en')->store('projects/en/','public');
        }

        Project::create([

            'title' => $request->title,
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'description_fr' => $request->description_fr,
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            'thumbnail' => $thumbnail,
            'thumbnail_fr' => $thumbnailFR ? $thumbnailFR : $thumbnail,
            'thumbnail_en' => $thumbnailEN ? $thumbnailEN : $thumbnail,
            'is_published' => $request->is_published ? 1 : 0
        ]);


        return  redirect()->to('admin/projects')->with([
            'success' => __('forms.add-success')
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }


    public function checkout() {
        Stripe::setApiKey('sk_test_51MBdoJIMzWwDJnIZpZWnQUOQTiMB10sdehnKH1xOjkej9xGpiPYUD723mRqq0HTyXZ5oaWbfihOoyQrNs3TmL3zu00G0qbIO5l');
        $checkout_session = Session::create([
            'customer_email' => 'customer@example.com',
            'submit_type' => 'donate',
            'billing_address_collection' => 'required',
            'shipping_address_collection' => [
                'allowed_countries' => ['US', 'CA'],
            ],
            'line_items' => [[
                # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                'price' => '{{PRICE_ID}}',
                'quantity' => 1,
            ]],
            'mode' => 'payment',

        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|min:5',
            'title_en' => 'required|min:5',
            'title_fr' => 'required|min:5',
            'description' => 'required|min:5',
            'description_fr' => 'required|min:5',
            'description_en' => 'required|min:5',
            'amount' => 'required|min:5',
            'thumbnail'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ],
            'thumbnail_en'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ],
            'thumbnail_fr'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ]
        ]);

        $thumbnail = $thumbnailFR = $thumbnailEN = '';


        if(!empty($request->file('thumbnail'))) {
            $thumbnail = $request->file('thumbnail')->store('projects/ar/','public');

            unlink(public_path('storage/' . $project->thumbnail));
        }

        if(!empty($request->file('thumbnail_fr'))) {
            $thumbnailFR = $request->file('thumbnail_fr')->store('projects/fr/','public');
        }

        if(!empty($request->file('thumbnail_en'))) {
            $thumbnailEN = $request->file('thumbnail_en')->store('projects/en/','public');
        }

        $project->update([

            'title' => $request->title,
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'description_fr' => $request->description_fr,
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            'thumbnail' => $thumbnail ? $thumbnail : $project -> thumbnail ,
            'thumbnail_fr' =>$thumbnailFR ? $thumbnailFR : $project -> thumbnail_fr,
            'thumbnail_en' => $thumbnailEN ? $thumbnailEN : $project -> thumbnail_en,
            'is_published' => $request->is_published ? 1 : 0
        ]);


        return  redirect()->to('admin/projects')->with([
            'success' => __('forms.edit-success')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return  redirect()->to('admin/projects')->with([
            'success' => __('forms.deleted-success')
        ]);
    }
}
