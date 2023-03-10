<?php 

namespace App\Repositories;

use App\Models\Category;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CategoryContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class CategoryRepository implements CategoryContract
{
    use UploadAble;

    protected $model;

    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array|string[] $columns
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function listCategories(string $order = 'id', string $sort = 'desc', array|string[] $columns = ['*']): Illuminate\Database\Eloquent\Collection
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findCategoryById(int $id)
    {
        try {
            return $this->findOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException(null, null, $e);
        }
    }

    /**
     * @param array $params
     * @return App\Models\Category
     * @throws InvalidArgumentException
     */
    public function createCategory(array $params): Category
    {
        try {
            $collection = collect($params);

            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'categories');
            }

            $featured = $collection->has('featured') ? 1 : 0;
            $menu = $collection->has('menu') ? 1 : 0;

            $merge = $collection->merge(compact('menu', 'image', 'featured'));

            $category = Category::create($merge->all());

            return $category;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return App\Models\Category
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function updateCategory(array $params): Category
    {
        $category = $this->findCategoryById($params['id']);

        $collection = collect($params)->except('_token');

        $image = null;

        if ($collection->has('image') && ($params['image'] instanceof UploadedFile)) {

            if ($category->image != null) {
                $this->deleteOne($category->image);
            }

            $image = $this->uploadOne($params['image'], 'categories');
        }

        $featured = $collection->has('featured') ? 1 : 0;
        $menu = $collection->has('menu') ? 1 : 0;

        $merge = $collection->merge(compact('menu', 'image', 'featured'));

        $category->update($merge->all());

        return $category;
    }

    /**
     * @param int $id
     * @return bool
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     * @throws Exception
     */
    public function deleteCategory(int $id): bool
    {
        $category = $this->findCategoryById($id);

        if ($category->image != null) {
            $this->deleteOne($category->image);
        }

        return $category->delete();
    }
    
}