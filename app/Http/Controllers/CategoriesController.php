<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ControllerUpdateRequest;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoriesController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->middleware("auth");
    }
    public function index()
    {

        $categories = $this->categoryRepository->index();

        return view("categories.index", [
            "categories" => $categories
        ]);
    }

    public function create()
    {
        return view("categories.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string",
            "image" => "required",
        ]);

        if ($request->hasFile("image")) {
            // dd($request->all());
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path("categoryImages"), $imageName);
            $data = array_merge($data, ["image" => $imageName]);
        }

        $this->categoryRepository->store($data);

        // $category = new Category();
        // $category->create($data);
        // $category->save();

        return redirect()->route("category.index");
    }

    public function show($id)
    {
        // $category = Category::find($id);
        $category = $this->categoryRepository->show($id);
        return view("categories.show", compact("category"));
    }

    public function edit($id)
    {
        // $category = Category::find($id);
        $category = $this->categoryRepository->show($id);
        return view("categories.edit", ["category" => $category]);
    }

    public function update($id, ControllerUpdateRequest $request)
    {
        // $category = Category::find($request->id);
        // $category = Category::find($id);
        $category = $this->categoryRepository->show($id);

        $category->update(['name' => $request->name]);

        return redirect()->route("category.index");
    }

    public function destroy(Request $request)
    {
        // dd($id);
        // $category = Category::find($request->id);
        $category = $this->categoryRepository->show($request->id);
        $category->delete();
        // $category->save();
        return redirect()->route("category.index");
    }
}
