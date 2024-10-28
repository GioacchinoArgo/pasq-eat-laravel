@extends('layouts.app')

@section('title', 'Grafico Ordini')

@section('content')
        <section id="show-graphs" class="py-4 spacing">
            <h1 class="text-center my-5">Grafici di {{$restaurant_name}}</h1>

            <div class="row gap-4 gap-lg-0">

                 {{-- Grafico a linee --}}
                <div class="col-12 col-lg-7">
                    <div class="data-card p-4">
                        <h3 class="text-center my-2">Grafico ordini annuali</h3>
                        <canvas id="ordersChart"></canvas>
                    </div>
                </div>

                {{-- Grafico a ciambella --}}
                <div class="col-12 col-lg-5">
                    <div class="data-card p-4">
                        <h3 class="text-center my-2">Grafico piatti acquistati</h3>
                        <canvas id="dishesChart" height="200" width="200"></canvas>
                    </div>
                </div>
               
            </div>

        </section>    
@endsection

@section('scripts')
<script>
  const orders = @json($orders);
  const dishes = @json($dishes);
  const dishCounts = @json($dish_counts);
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  @vite('resources/js/graphs.js')
@endsection