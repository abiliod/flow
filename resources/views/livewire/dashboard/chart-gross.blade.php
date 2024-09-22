<?php

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Reactive;
use Livewire\Volt\Component;

new class extends Component {
    #[Reactive]
    public string $period = '-30 days';

    public array $chartGross = [
        'type' => 'line',
        'options' => [
            'backgroundColor' => '#dfd7f7',
            'resposive' => true,
            'maintainAspectRatio' => false,
            'scales' => [
                'x' => [
                    'display' => false
                ],
                'y' => [
                    'display' => false
                ]
            ],
            'plugins' => [
                'legend' => [
                    'display' => false,
                ]
            ],
        ],
        'data' => [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Amount',
                    'data' => [],
                    'tension' => '0.1',
                    'fill' => true,
                ],
            ]
        ]
    ];

    #[Computed]
    public function refreshChartGross(): void
    {

        $sales = Order::query()
            //    Function Deprected STRFTIME
            //    ->selectRaw("STRFTIME('%Y-%m-%d', created_at) as day, sum(total) as total")
            ->selectRaw("STR_TO_DATE( '%Y-%m-%d',created_at) as day, sum(total) as total")
            ->groupBy('day')
            ->where('created_at', '>=', Carbon::parse($this->period)->startOfDay())
            ->get();




        Arr::set($this->chartGross, 'data.labels', $sales->pluck('day'));
        Arr::set($this->chartGross, 'data.datasets.0.data', $sales->pluck('total'));
    }

    public function with(): array
    {
        $this->refreshChartGross();

        return [];
    }
}; ?>

<div>
    <x-card title="Gross" separator shadow>
        <x-chart wire:model="chartGross" class="h-44" />
    </x-card>
</div>
