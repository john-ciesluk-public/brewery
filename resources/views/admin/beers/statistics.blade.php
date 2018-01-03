@extends('layouts.app')
@section('content')
<div class="row row-margin">
    <div class="col-xs-12">
        <h2 class="text-center">Beer Statistics</h2>
        <canvas id="bar" width="800" height="450"></canvas>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Beer</th>
                    <th>Pints Sold</th>
                    <th>Sales</th>
                    <th>Price</th>
                    <th>Percent of Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beers as $beer)
                <tr>
                    <td>{{ $beer['title'] }}</td>
                    <td>{{ $beer['pints_sold'] }}</td>
                    <td>${{ $beer['pints_sold'] * $beer['price'] }}</td>
                    <td>${{ $beer['price'] }}</td>
                    <td>{{ round(($beer['pints_sold'] / $total_pints_sold) * 100,2) }}%</td>
                </tr>
            @endforeach
                <tr>
                    <td>Totals:</td>
                    <td>{{ $total_pints_sold }}</td>
                    <td>${{ $total_sales[0]['total_sales'] }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
