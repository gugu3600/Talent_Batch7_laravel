<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryAPIResources;
use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class CategoryController extends BaseController
{

    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->middleware('permission:categoryList', ['only' => ['index']]);
        $this->middleware('permission:categoryCreate', ['only' => ['store']]);
        $this->middleware('permission:categoryUpdate', ['only' => ['update']]);
        $this->middleware('permission:categoryDelete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $categories = $this->categoryRepo->index();

        $data = CategoryAPIResources::collection($categories);

        return $this->success($data, "Categories Retrived Successfully", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            "name" => "required|string",
            "image" => "nullable"
        ]);

        if ($validated->fails()) {
            return $this->error("Error Created", $validated->errors(), 422);
        }

        // if($request->hasFile("image")){

        $imgName = $request->name . time() . ".jpg";
        $request->image->move(public_path("categoryImages"), $imgName);
        // }

        $data = [
            "name" => $request->name,
            "image" => $imgName
        ];

        $this->categoryRepo->store($data);

        return $this->success($data, "Created Category", 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = $this->categoryRepo->show($id);
        $data = new CategoryAPIResources($category);

        return $this->success($data, "Category Find Success", 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = Validator::make($request->all(),[
            "name" => "required|string"
        ]);

        if($validated->fails()){

            return $this->error("Error Updated Category",$validated->errors(),422);
        }

        $category = $this->categoryRepo->show($id);

        $category->update($request->all());

        return $this->success($category,"Category Created Successfully",200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->categoryRepo->show($id);
        $category->delete();

        return $this->success(null, "Deleted Category", 200);
    }
}
