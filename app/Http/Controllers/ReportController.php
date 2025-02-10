<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    function books() {
        $dailySales = Order::whereDate('created_at', Carbon::today())->sum('total');
        $weeklySales = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total');
        $monthlySales = Order::whereMonth('created_at', Carbon::now()->month)->sum('total');

        $dailyOrders = Order::whereDate('created_at', Carbon::today())->count();
        $weeklyOrders = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $monthlyOrders = Order::whereMonth('created_at', Carbon::now()->month)->count();

        return view('dashboard.reports.sales.books', compact('dailySales', 'weeklySales', 'monthlySales', 'dailyOrders', 'weeklyOrders', 'monthlyOrders'));

    }
    function revenue() {
        $dailyRevenue = DB::table('orders')
        ->selectRaw('Date(created_at) as date, SUM(total) as revenue')
        ->where('created_at', '>=', now()->subDays(7))
        ->groupBy('date')
        ->orderBy('date')
        ->get();

        $weeklyRevenue = DB::table('orders')
        ->selectRaw('YEARWEEK(created_at) as week, SUM(total) as revenue')
        ->where('created_at', '>=', now()->subWeeks(6))
        ->groupBy('week')
        ->orderBy('week')
        ->get();

        $monthlyRevenue = DB::table('orders')
        ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(total) as revenue')
        ->where('created_at', '>=', now()->subMonths(6))
        ->groupBy('month')
        ->orderBy('month')
        ->get();


        return view('dashboard.reports.sales.revenue', compact('dailyRevenue', 'weeklyRevenue', 'monthlyRevenue'));
    }
    function trends() {


    }
}
