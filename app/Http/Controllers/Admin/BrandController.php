<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Database\QueryException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;



class BrandController extends Controller
{
    
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $brands = Brand::where('name', 'like', '%'.$search.'%')
                    ->orWhere('slug', 'like', '%'.$search.'%')
                    ->paginate(10);
        
        $pageTitle = 'Brands';
        $pageDescription = 'List of all brands';

        return view('admin.brands.index', compact('brands', 'pageTitle', 'pageDescription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Brands';
        $pageDescription = 'Create a brand';

        return view('admin.brands.create', compact('pageTitle', 'pageDescription'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
{
    $this->validate($request, [
        'name'      =>  'required|max:191',
        'image'     =>  'mimes:jpg,jpeg,png|max:1000'
    ]);

    try {
        $collection = new Collection($request->except('_token'));

        $logo = null;

        if ($collection->has('logo') && ($request->file('logo') instanceof UploadedFile)) {
            $logo = $this->uploadOne($request->file('logo'), 'brands');
        }

        $merge = $collection->merge(compact('logo'));

        $brand = new Brand($merge->all());

        $brand->save();

        return redirect()->route('admin.brands.index')->with('success', 'Brand added successfully');

    } catch (QueryException $exception) {
        throw new InvalidArgumentException($exception->getMessage());
    }

    return redirect()->back()->with('error', 'Error occurred while creating brand.')->withInput();
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
