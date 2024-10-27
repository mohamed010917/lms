<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\course ;

class chart extends ChartWidget
{
    protected static ?string $heading = 'Top Courses';

    protected function getData(): array
    {
     
        $courses = course::orderByDesc("discriper")->take(10)->get();
        // dd($courses);
        return [
            'datasets' => [
                [
                    'label' => 'name',
                    
                    'data' => [
                        $courses[0]->discriper ,
                        $courses[1]->discriper ,
                        $courses[2]->discriper ,
                        $courses[3]->discriper ,
                        $courses[4]->discriper ,
                        $courses[5]->discriper ,
                        $courses[6]->discriper ,
                        $courses[7]->discriper ,
                        $courses[8]->discriper ,
                        $courses[9]->discriper ,
                        
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
        return 'pie';
    }
}
