<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\CategoryContract;

class CategoryController extends Controller
{
    /**
     * @var CategoryContract
     */
    protected $categoryRepository;

    /**
     * CategoryController constructor.
     * @param CategoryContract $categoryRepository
     */
    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        // $categories = $this->categoryRepository->listCategories();
        $search = $request->query('search');

        $categories = Category::where('name', 'like', '%'.$search.'%')
                    ->orWhere('slug', 'like', '%'.$search.'%')
                    ->paginate(10);

        $pageTitle = 'Categories';
        $pageDescription = 'List of all categories';

        return view('admin.categories.index', compact('categories', 'pageTitle', 'pageDescription'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(CategoryContract $categoryRepository)
    {
        $categories = $categoryRepository->listCategories('id', 'asc');

        $pageTitle = 'Categories';
        $pageDescription = 'Create Category';
        return view('admin.categories.create', compact('categories', 'pageTitle', 'pageDescription'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      =>  'required|max:191',
            'parent_id' =>  'required|not_in:0',
            'description'   =>  'nullable|string|max:255',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000',
            'menu'          =>  'nullable',
            'featured'      =>  'nullable', 
        ]);

        $category = $this->categoryRepository->createCategory($validated);

        if (!$category) {
            // return $this->responseRedirectBack('Error occurred while creating category.', 'error', true, true);
            return back()->with('error', 'Error occurred while creating category.');
        }
        // return $this->responseRedirect('admin.categories.index', 'Category added successfully' ,'success',false, false);
        return back()->with('success', 'Category added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $targetCategory = $this->categoryRepository->findCategoryById($id);
        $categories = $this->categoryRepository->listCategories();

        $pageTitle = 'Categories';
        $pageDescription = 'Edit Category: ' . $targetCategory->name;

        return view('admin.categories.edit', compact('categories', 'targetCategory', 'pageTitle', 'pageDescription'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {   
        // dd($request->all());
        
        $validated = $request->validate([
            'id'            =>  'required',
            'description'   =>  'string|max:255',
            'name'          =>  'required|max:191',
            'parent_id'     =>  'required|not_in:0',
            'image'         =>  'mimes:jpg,jpeg,png|max:1000',
            'menu'          =>  'nullable',
            'featured'      =>  'nullable', 
        ]);

        $category = $this->categoryRepository->updateCategory($validated);

        if (!$category) 
        {
            return back()->with('error', 'Error occurred while updating category.');
        }

        return back()->with('success', 'Category updated successfully');

        // return view('test')->with(['data' => $data]);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $category = $this->categoryRepository->deleteCategory($id);

        if (!$category) {
            // return $this->responseRedirectBack('Error occurred while deleting category.', 'error', true, true);
            return back()->with('error', 'Error occurred while deleting category.');
        }
        // return $this->responseRedirect('admin.categories.index', 'Category deleted successfully' ,'success',false, false);
        return back()->with('succes', 'Category deleted successfully.');
    }

}
