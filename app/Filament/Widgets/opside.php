<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\opeside  ;

class opside extends ChartWidget
{
    protected static ?string $heading = 'Top 10 opside views';

    protected function getData(): array
    {
        $courses = opeside::orderByDesc("viwes")->take(10)->get();
        // dd($courses);
        return [
            'datasets' => [
                [
                    'label' => 'name',
                    
                    'data' => [
                        $courses[0]->viwes ,
                        $courses[1]->viwes ,
                        $courses[2]->viwes ,
                        $courses[3]->viwes ,
                        $courses[4]->viwes ,
                        $courses[5]->viwes ,
                        $courses[6]->viwes ,
                        $courses[7]->viwes ,
                        $courses[8]->viwes ,
                        $courses[9]->viwes ,
                        
                    ],
                    
                    'backgroundColor' => [
                        '#FF6384', // لون أول
                        '#36A2EB', // لون ثانٍ
                        '#FFCE56', // لون ثالث
                        '#4BC0C0', // لون رابع
                        '#9966FF', // لون خامس
                        '#FF9F40', // لون سادس
                        '#FF6384', // كرر الألوان حسب الحاجة
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        
                    ],
                    
                ],
            ],
            // names of date in chart
            'labels' => [                        
            $courses[0]->name ,
            $courses[1]->name ,
            $courses[2]->name ,
            $courses[3]->name ,
            $courses[4]->name ,
            $courses[5]->name ,
            $courses[6]->name ,
            $courses[7]->name ,
            $courses[8]->name ,
            $courses[9]->name ,
            
        ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
