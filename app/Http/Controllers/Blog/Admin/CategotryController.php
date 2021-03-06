<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategotryController extends BaseController
{
    /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository;

    public function __construct() {
        parent::__construct();

        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $pag = $this->blogCategoryRepository->getAllWithPaginate(6);

        return view('blog.admin.category.index', compact('pag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $item = new BlogCategory();
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.category.edit',  compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlogCategoryCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->input();

        if(empty($data['slug'])){
            $data['slug'] = Str::slug($data['title']);
        }
        $item = (new BlogCategory())->create($data);
        $item->save();
        if($item){
            return redirect()->route('blog.admin.categories.edit', $item->id)->with(['success' => 'Успешно сохраненно']);
        } else{
            return back()
                ->withErrors(['msg' => "Ошибка сохранения"])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit( int $id )
    {
        $item  = $this->blogCategoryRepository->getEdit($id);
        if(empty($item)){
            abort(404);
        }
        $categoryList = $this->blogCategoryRepository->getForComboBox();
        return view('blog.admin.category.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlogCategoryUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( BlogCategoryUpdateRequest $request, int $id )
    {

        $item = BlogCategory::find($id);
        if(empty($item)){
            return back()
                ->withErrors(['msg' => "Запись с id=[$id] не найдена"])
                ->withInput();
        }
        $data = $request->all();
        if(empty($data['slug'])){
            $data['slug'] = Str::slug($data['title']);
        }
        $result = $item->update($data);

        if($result){
            return redirect()->route('blog.admin.categories.edit', $item->id)->with(['success' => 'Успешно сохраненно']);
        } else{
            return back()
                ->withErrors(['msg' => "Ошибка сохранения"])
                ->withInput();
        }

    }

}
