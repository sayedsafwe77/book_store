<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()  {
        return view('dashboard.index');
    }
    public function changeLanguage($lang)  {
        if (in_array($lang, ['en', 'ar'])) {
            Session::put('locale', $lang);
        }
        return redirect()->back();
    }
    public function bulkDelete()  {

        $ids = request()->input('ids');
        $model = 'App\Models\\' . request()->model;
        if (empty($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'No items selected for deletion.'
            ]);
        }

        try {
            $model::whereIn('id', $ids)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Selected items have been deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete items. Please try again.'
            ]);
        }
    }
}
