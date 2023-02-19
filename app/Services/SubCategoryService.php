<?php

namespace App\Services;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class SubCategoryService
{
    /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @return SubCategory
     */
    public static function create(array $data)
    {
        $data = SubCategory::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  SubCategory $sub_category
     * @return SubCategory
     */
    public static function update(array $data, SubCategory $sub_category)
    {
        $data = $sub_category->update($data);
        return $data;
    }

    /**
     * Get Data By Id from storage.
     *
     * @param  Int $id
     * @return SubCategory
     */
    public static function getById($id)
    {
        $data = SubCategory::find($id);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\SubCategory
     * @return bool
     */
    public static function delete(SubCategory $sub_category)
    {
        $data = $sub_category->delete();
        return $data;
    }

    /**
     * update data in storage.
     *
     * @param  Array $data - Updated Data
     * @param  Int $id - SubCategory Id
     * @return bool
     */
    public static function status(array $data, $id)
    {
        $data = SubCategory::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Get data for datatable from storage.
     *
     * @return SubCategory with states, countries
     */
    public static function datatable()
    {
        $data = SubCategory::orderBy('created_at', 'desc');
        return $data;
    }
}
