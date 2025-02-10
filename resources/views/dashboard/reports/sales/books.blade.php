@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')
<div class="row">
    <!-- Daily Sales -->
    <div class="col-lg-4 col-md-6">
        <x-adminlte-info-box title="Today's Sales" text="Total: ${{ number_format($dailySales, 2) }}" icon="fas fa-dollar-sign text-green"/>
    </div>

    <!-- Weekly Sales -->
    <div class="col-lg-4 col-md-6">
        <x-adminlte-info-box title="This Week's Sales" text="Total: ${{ number_format($weeklySales, 2) }}" icon="fas fa-calendar-week text-blue"/>
    </div>

    <!-- Monthly Sales -->
    <div class="col-lg-4 col-md-6">
        <x-adminlte-info-box title="This Month's Sales" text="Total: ${{ number_format($monthlySales, 2) }}" icon="fas fa-calendar-alt text-yellow"/>
    </div>
</div>

<div class="row">
    <!-- Daily Orders -->
    <div class="col-lg-4 col-md-6">
        <x-adminlte-info-box title="Today's Orders" text="{{ $dailyOrders }} Orders" icon="fas fa-shopping-cart text-green"/>
    </div>

    <!-- Weekly Orders -->
    <div class="col-lg-4 col-md-6">
        <x-adminlte-info-box title="This Week's Orders" text="{{ $weeklyOrders }} Orders" icon="fas fa-calendar-week text-blue"/>
    </div>

    <!-- Monthly Orders -->
    <div class="col-lg-4 col-md-6">
        <x-adminlte-info-box title="This Month's Orders" text="{{ $monthlyOrders }} Orders" icon="fas fa-calendar-alt text-yellow"/>
    </div>
</div>
@endsection
