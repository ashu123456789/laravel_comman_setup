<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Services\SubCategoryService;
use App\Services\HelperService;
use App\Http\Requests\SubCategoryRequest;
use App\Services\ManagerLanguageService;

class SubCategoryController extends Controller
{
    protected $mls;

    public function __construct()
    {
        $this->middleware('permission:sub_category', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
        $this->mls = new ManagerLanguageService('messages');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $items = SubCategoryService::datatable();
            return datatables()->eloquent($items)->make(true);
        } else {
            return view('admin.sub_category.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.sub_category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        $input = $request->except(['_token']);
        $image = HelperService::imageUploader($request, 'image', 'files/sub_categories/');
        if ($image != null) {
            $input['image'] = $image;
        }
        $sub_category = SubCategoryService::create($input);

        return redirect()->route('sub_categories.index')
            ->with('success', $this->mls->messageLanguage('created', 'sub_category', 1));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_category = SubCategoryService::getById($id);
        return view('admin.sub_category.details', compact('sub_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all()->pluck('name', 'id');
        $sub_category = SubCategoryService::getById($id);
        return view('admin.sub_category.edit', compact('categories', 'sub_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryRequest $request, SubCategory $sub_category)
    {
        $input = $request->except(['_token']);
        $image = HelperService::imageUploader($request, 'image', 'files/sub_categories/');
        if ($image != null) {
            $input['image'] = $image;
        }
        $sub_category = SubCategoryService::update($input, $sub_category);
        if ($sub_category) {
            return redirect()->route('sub_categories.index')
                ->with('success', $this->mls->messageLanguage('updated', 'sub_category', 1));
        } else {
            return redirect()->back()->with('error', $this->mls->messageLanguage('not_updated', 'sub_category', 1));
        }
    }

    public function status($id, $status)
    {
        $status = ($status == 1) ? 0 : 1;
        $result = SubCategoryService::status(['is_active' => $status], $id);
        if ($result) {
            return response()->json([
                'status' => 1,
                'message' => $this->mls->messageLanguage('updated', 'status', 1),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => $this->mls->messageLanguage('not_updated', 'status', 1),
                'status_name' => 'error'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $sub_category)
    {
        $result = SubCategoryService::delete($sub_category);
        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->messageLanguage('deleted', 'sub_category', 1),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->messageLanguage('not_deleted', 'sub_category', 1),
                'status_name' => 'error'
            ]);
        }
    }
}
