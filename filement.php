<?php

// ====================== Installation ======================
/*
1. Add the package to composer.json:
   "filament/filament": "^3.2.0"
   Then run:
   composer update

2. Create a Filament user:
   php artisan make:filament-user
*/

// ====================== Resource Creation ======================
/*
1. Create a resource (name must match the model):
   php artisan make:filament-resource Patient
====================== Forms ======================

use Filament\Forms\Components\{RichEditor, Section, TextInput, DateTimePicker, Select};

 Define the form schema
$schema = [
     Text Input Example
    TextInput::make('slug'),
    
     Rich Editor Example
    RichEditor::make('content'),

     Section Example
    Section::make('Publishing')
        ->description('Settings for publishing this post.')
        ->schema([
             Add fields here
        ]),
];

// ====================== Selectors ======================
$selector = Select::make('status')
    ->options([
        'draft' => 'Draft',
        'reviewing' => 'Reviewing',
        'published' => 'Published',
    ]);

// ====================== Date & Time Pickers ======================
$datePicker = DateTimePicker::make('published_at');

// ====================== Validation ======================
/*
Validation rules examples:
->required()
->maxLength(255)
->activeUrl()
->unique()->unique(column: 'email_address')
->exists(table: Invitation::class)
*/

// ====================== Input Field Types ======================
/*
- TextInput
- Select
- Checkbox
- Toggle
- CheckboxList
- Radio
- DateTimePicker
- FileUpload
- RichEditor
- TagsInput
- Textarea
- KeyValue
- ColorPicker
*/

// ====================== Checkbox Example ======================
use Filament\Forms\Components\Checkbox;

Checkbox::make('is_admin')
    ->accepted()
    ->declined();

// ====================== Toggle Example ======================
use Filament\Forms\Components\Toggle;

Toggle::make('is_admin')
    ->onIcon('heroicon-m-bolt')
    ->offIcon('heroicon-m-user')
    ->onColor('success')
    ->offColor('danger');

// ====================== File Upload Example ======================
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachment')
    ->disk('s3')
    ->directory('form-attachments')
    ->visibility('private');

// ====================== Repeater Example ======================
use Filament\Forms\Components\Repeater;

Repeater::make('members')
    ->schema([
        TextInput::make('name')->required(),
        Select::make('role')->options([
            'member' => 'Member',
            'administrator' => 'Administrator',
            'owner' => 'Owner',
        ])->required(),
    ])
    ->columns(2)
    ->deletable(false)
    ->addable(false);

// ====================== Tag Input Example ======================
use Filament\Forms\Components\TagsInput;

TagsInput::make('tags')
    ->suggestions(['tailwindcss', 'alpinejs', 'laravel', 'livewire']);

// ====================== KeyValue Example ======================
use Filament\Forms\Components\KeyValue;

KeyValue::make('meta');

// ====================== Wizard Example ======================
use Filament\Forms\Components\Wizard;

Wizard::make([
    Wizard\Step::make('Order')->schema([]),
    Wizard\Step::make('Delivery')->schema([]),
    Wizard\Step::make('Billing')->schema([]),
])->startOnStep(2);

// ====================== Custom Field Example ======================
/*
To create a custom field, extend Field class:
php artisan make:form-field RangeSlider
*/

// ====================== Layouts ======================
use Filament\Forms\Components\Fieldset;

Fieldset::make('Label')
    ->schema([
        // Add fields here
    ])
    ->columns(3);

// ====================== Tabs Example ======================
use Filament\Forms\Components\Tabs;

Tabs::make('Tabs')
    ->tabs([
        Tabs\Tab::make('Tab 1')->schema([]),
        Tabs\Tab::make('Tab 2')->schema([]),
    ])
    ->activeTab(2);




//============================================================================
//===================================            =============================
//===============================      Tables       ==========================
//===================================            =============================
//============================================================================

use Filament\Tables\Columns\TextColumn;
 
TextColumn::make('title')->label('Post title')->translateLabel();
TextColumn::make('author.name') ->sortable()->searchable();
$column->defaultSort('stock', 'desc') ->default('No description.');
$column->searchable(query: function (Builder $query, string $search): Builder {
    return $query
        ->where('first_name', 'like', "%{$search}%")
        ->orWhere('last_name', 'like', "%{$search}%");
});
$col->searchable(isIndividual: true) ;
$col->hidden(! auth()->user()->isAdmin()) ;
$or->visible(auth()->user()->isAdmin());
$m ->tooltip('Title') ;
$textcol    
->badge()
->color(fn (string $state): string => match ($state) {
    'draft' => 'gray',
    'reviewing' => 'warning',
    'published' => 'success',
    'rejected' => 'danger',
});
$data  
->dateTime()
->since() 
->dateTimeTooltip();
$num->numeric() 
->money('EUR') ;
$discrption
->limit(50) 
->words(10) 
->lineClamp(2)
->wrap();
$tags->badge()
->separator(',')
->html()
->color('primary')   
->icon('heroicon-m-envelope')
->iconPosition(IconPosition::After) 
->iconColor('primary')
 ->size(TextColumn\TextColumnSize::Large)
 ->weight(FontWeight::Bold)
 ->copyable()
 ->copyMessage('Email address copied')
 ->copyMessageDuration(1500)
 ;



 //======================================================
 //======================= icon =======================
 //==================================================
 use Filament\Tables\Columns\IconColumn;
 
IconColumn::make('status')
->icon(fn (string $state): string => match ($state) {
    'draft' => 'heroicon-o-pencil',
    'reviewing' => 'heroicon-o-clock',
    'published' => 'heroicon-o-check-circle',
})


->color(fn (string $state): string => match ($state) {
    'draft' => 'info',
    'reviewing' => 'warning',
    'published' => 'success',
    default => 'gray',
})
->size(IconColumn\IconColumnSize::Medium)
->boolean()
->trueIcon('heroicon-o-check-badge')
->falseIcon('heroicon-o-x-mark')
->trueColor('info')
->falseColor('warning')
->wrap()
;

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@                                     @@
//@@           ImageColumn               @@
//@@                                     @@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
use Filament\Tables\Columns\ImageColumn;
ImageColumn::make('avatar')
->disk('s3')
->visibility('private')
->width(200)
->height(50)
->size(40)
->square()
->circular()
->defaultImageUrl(url('/images/placeholder.png'))
->stacked()
->ring(5)
->overlap(2)
->limit(3)
->limitedRemainingText()
->limitedRemainingText(size: 'lg')
->extraImgAttributes(['loading' => 'lazy'])
;

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@                                     @@
//@@           Color                     @@
//@@                                     @@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

use Filament\Tables\Columns\ColorColumn;

ColorColumn::make('color')
->copyable()
->copyMessage('Color code copied')
->copyMessageDuration(1500)
;

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@                                     @@
//@@           select                    @@
//@@                                     @@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

use Filament\Tables\Columns\SelectColumn;
 
SelectColumn::make('status')
    ->options([
        'draft' => 'Draft',
        'reviewing' => 'Reviewing',
        'published' => 'Published',
    ])
    ->rules(['required'])
    ->selectablePlaceholder(false)
;
///==================================
//=====toggle=======================//
use Filament\Tables\Columns\ToggleColumn;

ToggleColumn::make('is_admin')
;
//=====TextInputColumn=======================//
use Filament\Tables\Columns\TextInputColumn;
 
TextInputColumn::make('email')
->rules(['required', 'max:255'])
->type('color')
;

use Filament\Tables\Columns\CheckboxColumn;
 
CheckboxColumn::make('is_admin');





///++++++++++++++++++++++++++++++++++++++++++++++++++++
//_____________________________________________________
//=================custm column========================
//_____________________________________________________
///++++++++++++++++++++++++++++++++++++++++++++++++++++

use Filament\Tables\Columns\ViewColumn;
 
ViewColumn::make('status')->view('filament.tables.columns.status-switcher');
// php artisan make:table-column StatusSwitcher
use Filament\Tables\Columns\Column;
 
class StatusSwitcher extends Column
{
    protected string $view = 'filament.tables.columns.status-switcher';
}

// <div>
//     {{ $getState() }}
// </div>

//-=-==-=-=-=-=-=-==-==--=-
//-=-==-=-=-=-=-=-==-==--=-
// relishonship
//-=-==-=-=-=-=-=-==-==--=-
//-=-==-=-=-=-=-=-==-==--=-

 
TextColumn::make('author.name') ;
TextColumn::make('users_count')->counts('users') // has many get count
;

//=========================  ===========================   
//==                      Fileter                      =
//=========================  ===========================

use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
 
Filter::make('is_featured')
    ->query(fn (Builder $query): Builder => $query->where('is_featured', true))
    ->label('Featured')
    ->translateLabel()
    ->toggle()
    ->default()
    ;
    use Filament\Tables\Filters\SelectFilter;
    SelectFilter::make('type')
    ->options([
        'draft' => 'Draft',
        'reviewing' => 'Reviewing',
        'published' => 'Published',
    ])
    ->multiple()
    ->relationship('author', 'name')
    ->searchable()
    ->preload()
    ->default('draft')
    ->selectablePlaceholder(false)
    ;

    
    use Filament\Tables\Filters\TernaryFilter;
 
    TernaryFilter::make('is_admin') ->nullable() ->attribute('is_visible')
    ->label('Email verification')
    ->nullable()
    ->placeholder('All users')
    ->trueLabel('Verified users')
    ->falseLabel('Not verified users')
    ->queries(
        true: fn (Builder $query) => $query->whereNotNull('email_verified_at'),
        false: fn (Builder $query) => $query->whereNull('email_verified_at'),
        blank: fn (Builder $query) => $query, // In this example, we do not want to filter the query when it is blank.
    )
    ;
    use Filament\Tables\Filters\TrashedFilter;
    
    TrashedFilter::make();




                                    // ||||||||||||||||||||||||||||||||||||||
                                    // ||||||||||| quiery filetter ||||||||||
                                    // ||||||||||||||||||||||||||||||||||||||

use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\NumberConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\RelationshipConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\RelationshipConstraint\Operators\IsRelatedToOperator;
use Filament\Tables\Filters\QueryBuilder\Constraints\SelectConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
 
QueryBuilder::make()
    ->constraints([
        TextConstraint::make('name'),
        BooleanConstraint::make('is_visible'),
        NumberConstraint::make('stock'),
        SelectConstraint::make('status')
            ->options([
                'draft' => 'Draft',
                'reviewing' => 'Reviewing',
                'published' => 'Published',
            ])
            ->multiple(),
        DateConstraint::make('created_at'),
        RelationshipConstraint::make('categories')
            ->multiple()
            ->selectable(
                IsRelatedToOperator::make()
                    ->titleAttribute('name')
                    ->searchable()
                    ->multiple(),
            ),
        NumberConstraint::make('reviewsRating')
            ->relationship('reviews', 'rating')
            ->integer(),
        ]);


                                    // ||====||====||=======||||||===||
                                    // ||====||= custm Filtter |||===||
                                    // ||====||====||=======||||||===||
use Filament\Forms\Components\DatePicker;
    
Filter::make('created_at')
    ->form([
        DatePicker::make('created_from'),
        DatePicker::make('created_until'),
    ])
    ->query(function (Builder $query, array $data): Builder {
        return $query
            ->when(
                $data['created_from'],
                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
            )
            ->when(
                $data['created_until'],
                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
            );
    });


///====================**************
// **** layout **********************
// ********************==============
use Filament\Tables\Enums\FiltersLayout;
$filter->filtersFormColumns(3)
->filtersFormWidth(MaxWidth::FourExtraLarge)
->filtersFormMaxHeight('400px')
;

$table
    ->filters([
        // ...
    ], layout: FiltersLayout::Modal)//AboveContent || Model || AboveContentCollapsible || BelowContent
    ->hiddenFilterIndicators();


    // (((******************************)))
    // (((******** Layout table ********)))
    // (((******************************)))

    $img->circular() ->grow(false)
    ->icon('heroicon-m-phone')
    ->alignment(Alignment::End)
    ->space(1);

use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Stack;

 
Grid::make([
    'lg' => 2,
    '2xl' => 4,
]);


// ######################################################33
// 33                        Summaries                   33
// ######################################################33

use Filament\Tables\Columns\Summarizers\Average;
use Filament\Tables\Columns\Summarizers\Range;
$col->summarize(Average::make(), Range::make(),)

// Average Count Range Sum
->summarize(
    Count::make()->query(fn (Builder $query) => $query->where('is_published', true)),
)->label('Total')

;

// ========== groping ===========
$table->defaultGroup('status')->groups([
    'status',
    'category',
]);

// ###############_empty stata #########
$table->emptyStateActions([
    Action::make('create')
        ->label('Create post')
        ->url(route('posts.create'))
        ->icon('heroicon-m-plus')
        ->button(),
]);

// ##################### advanced
$table
->paginated(false)
->paginated([10, 25, 50, 100, 'all'])
->defaultPaginationPageOption(25);
;


//  make table
// php artisan make:livewire ListProducts
// @livewire('list-products') render
//route
use App\Livewire\ListProducts; 
Route::get('products', ListProducts::class);



// 00000000000000000000000000000000000000000000000000
// 000000000000000 Notifications  0000000000000000000
// 00000000000000000000000000000000000000000000000000

use Filament\Notifications\Notification;
Notification::make()
->title('Saved successfully')
->success()
->icon('heroicon-o-document-text')
->iconColor('success')
->duration(5000)
->body('Changes to the post have been saved.')
->actions([
    Action::make('view')
        ->button(),
    Action::make('undo')
        ->color('gray'),
    Action::make('view')
    ->button()
    ->url(route('posts.show', $post), shouldOpenInNewTab: true),
])
->persistent()//الاشعار هيفضل مؤجؤد لحد ماهر الي يشيلؤ
->send();// الكؤد ده بيتكتب جؤه فانكشن لايفؤير
// -------------------------=-=-=-=-=-=-=-=-=-=-=-=-=-=--=--=-=-==---=--==
// Database notifications---=-=-=-=-=-=-=-=-=-=-=-=-=-=--=--=-=-==---=--==
// -------------------------=-=-=-=-=-=-=-=-=-=-=-=-=-=--=--=-=-==---=--== 

// php artisan make:notifications-table

// in providers
$e  ->databaseNotifications();
 
// send to database
$recipient = auth()->user();
 
Notification::make()
    ->title('Saved successfully')
    ->sendToDatabase($recipient);
// run queu
// use notify
$recipient->notify(
    Notification::make()
        ->title('Saved successfully')
        ->toDatabase(),
);


// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~Broadcast notifications ~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

$recipient = auth()->user();
 
$recipient->notify(
    Notification::make()
        ->title('Saved successfully')
        ->toBroadcast(),
);
// Or

Notification::make()
    ->title('Saved successfully')
    ->broadcast($recipient);




//[[[[[[[[[[[[[[[[[[[[[]]]]]]]]]]]]]]]]]]]]]
//[[[[[[[[[[[[[[[  widgets   ]]]]]]]]]]]]]]]
//[[[[[[[[[[[[[[[[[[[[[]]]]]]]]]]]]]]]]]]]]]

// php artisan make:filament-widget name

//stat
Stat::make('Unique views', '192.1k')
->description('32k increase')
->descriptionIcon('heroicon-m-arrow-trending-up')
->color('success')
->extraAttributes([
    'class' => 'cursor-pointer',
    'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
])  ->chart([7, 2, 10, 3, 15, 4, 17])
;



//chart => type = Bar Bubble  Doughnut  Line  Pie  Polar area  Radar  Scatter 


// function getType()
// {
//     return 'type';
// }



function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'name',
                    // date you need to make chart
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    // if ther is chart need color
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
                        '#9966FF',
                        '#FF9F40',
                    ],
                    
                ],
            ],
            // names of date in chart
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        
        ];
        
    }





//**************************************************/
//******************** Actions *********************/
//**************************************************/
use App\Models\Post;
use Filament\Tables\Actions\Action;
use Filament\Tables\Enums\ActionsPosition;
Action::make('edit')
    ->url(fn (Post $record): string => route('posts.edit', $record))
    ->openUrlInNewTab();
    
Action::make('delete')
    ->requiresConfirmation()
    ->action(fn (Post $record) => $record->delete());
    // position: ActionsPosition::BeforeColumns


    use Filament\Tables\Table;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Database\Eloquent\Model;
        // لما بحدد اكتر من عنصر ؤاضغط علي العنصر ده بينقل بيانات العنصر ده لكل العناصر المحدده
    function table(Table $table): Table
    {
        return $table
            ->selectable()
            ->actions([
                Action::make('copyToSelected')
                    ->accessSelectedRecords()
                    ->action(function (Model $record, Collection $selectedRecords) {
                        $selectedRecords->each(
                            fn (Model $selectedRecord) => $selectedRecord->update([
                                'is_active' => $record->is_active,
                            ]),
                        );
                    }),
            ]);
    }
    use Filament\Tables\Actions\BulkAction;
    //  block action 
    BulkAction::make('delete')
    ->requiresConfirmation()
    ->action(fn (Collection $records) => $records->each->delete())
    ->deselectRecordsAfterCompletion()
    ;


    use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;

    
    $table
    ->actions([
        ActionGroup::make([
            ViewAction::make(),
            EditAction::make(),
            DeleteAction::make(),
        ])->iconButton() ->label('Actions')
        ->icon('heroicon-m-ellipsis-horizontal')
        ->color('info')
        ->size(ActionSize::Small)
        ->tooltip('Actions'),
    ]);






    // more from actions
    // Trigger button _+_+_+_+_+_+_+_+_
    Action::make('edit')
    ->button() // OR
    ->link() // OR
    ->iconButton() // OR
    ->badge() 
    ->label('Edit post')
    ->url(fn (): string => route('posts.edit', ['post' => $this->post]))
    ->color('danger')
    // danger, gray, info, primary, success or warning:
    // use Filament\Support\Enums\ActionSize;
    ->size(ActionSize::Large)
    // use Filament\Support\Enums\IconPosition;
    ->iconPosition(IconPosition::After)
    ->visible(auth()->user()->can('update', $this->post))
    ->disabled(! auth()->user()->can('delete', $this->post))
    ->keyBindings(['command+s', 'ctrl+s'])// use the cupored putton to avelibel this action
    ->extraAttributes([
        'class' => 'mx-auto my-8',
    ])
    ;


    //model
use App\Models\User;
use Filament\Forms\Components\Select;
 
Action::make('updateAuthor')
    ->form([
        Select::make('authorId')
            ->label('Author')
            ->options(User::query()->pluck('name', 'id'))
            ->required(),
    ])    ->fillForm(fn (Post $record): array => [
        'authorId' => $record->author->id,
    ])
    ->action(function (array $data, Post $record): void {
        $record->author()->associate($data['authorId']);
        $record->save();
    })
    ;


    //model steps
    use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;

use Filament\Forms\Components\Wizard\Step;
 
Action::make('create')
    ->steps([
        Step::make('Name')
            ->description('Give the category a unique name')
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->live()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->disabled()
                    ->required()
                    ->unique(Category::class, 'slug'),
            ])
            ->columns(2),
        Step::make('Description')
            ->description('Add some extra details')
            ->schema([
                MarkdownEditor::make('description'),
            ]),
        Step::make('Visibility')
            ->description('Control who can view it')
            ->schema([
                Toggle::make('is_visible')
                    ->label('Visible to customers.')
                    ->default(true),
            ]),
    ])
    ;

    //model
    Action::make('delete')
    ->action(fn (Post $record) => $record->delete())
    ->requiresConfirmation()
    ->modalHeading('Delete post')
    ->modalDescription('Are you sure you\'d like to delete this post? This cannot be undone.')
    ->modalSubmitActionLabel('Yes, delete it')
    ->modalIcon('heroicon-o-trash')
    ->modalAlignment(Alignment::Center)
    ->slideOver()
    ->stickyModalHeader()
    ->modalWidth(MaxWidth::FiveExtraLarge)
    // ExtraSmall, Small, Medium, Large, ExtraLarge, TwoExtraLarge,
    //  ThreeExtraLarge, FourExtraLarge,
    //  FiveExtraLarge, SixExtraLarge, SevenExtraLarge, and Screen:
    ->closeModalByClickingAway(false)
    ->closeModalByEscaping(false)
    ->modalCloseButton(false)
    ->modalAutofocus(false)
    ;
    // <!-- >>>>>>>>>>>>>>action group<<<<<<<<<<<<<<<<<<< -->
    ActionGroup::make([
        Action::make('view'),
        Action::make('edit'),
        Action::make('delete'),
    ])    ->label('More actions')
    ->icon('heroicon-m-ellipsis-vertical')
    ->size(ActionSize::Small)
    ->color('primary')
    ->button()
    ->dropdownPlacement('top-start')->dropdown(false)
    ->dropdownWidth(MaxWidth::ExtraSmall)
    // ExtraSmall, Small, Medium, Large, ExtraLarge, TwoExtraLarge, ThreeExtraLarge,
    //  FourExtraLarge, FiveExtraLarge, SixExtraLarge and SevenExtraLarge:
    ->maxHeight('400px')
    ->dropdownOffset(16)
    ;
    


    // ~~~~~~~~~~~~~~~~~~~+++++++++~~~~~~~~~~~~~~~
    // ~~~~~~~~~~~~~~~~~~~ Infolist ~~~~~~~~~~~~~~
    // ~~~~~~~~~~~~~~~~~~~+++++++++~~~~~~~~~~~~~~~
    // in your resource
    // public static
     function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('title')
            ]);
    }
    use Filament\Infolists\Components\TextEntry;
 
    TextEntry::make('title')
    ->badge()
    ->color(fn (string $state): string => match ($state) {
        'draft' => 'gray',
        'reviewing' => 'warning',
        'published' => 'success',
        'rejected' => 'danger',
    })
    ->dateTime() //OR
    ->since() ->dateTimeTooltip()//OR
    ->numeric()    //OR
    ->numeric(decimalPlaces: 0) //OR
    ->money('EUR')
    // text only like titel name or descrption
    ->limit(50)
    ->tooltip()
    ->words(10)
    ->lineClamp(2)
    // listing for many values like authers names 
    //   ->bulleted() make dot before ther name
    ->listWithLineBreaks()  ->bulleted()
    ->limitList(3)
    // if you make a tg and need to spertor bettowen
    ->separator(',')
    ->icon('heroicon-m-envelope')
;

use Filament\Infolists\Components\IconEntry;

IconEntry::make('status')
    ->color(fn (string $state): string => match ($state) {
        'draft' => 'info',
        'reviewing' => 'warning',
        'published' => 'success',
        default => 'gray',
    })
    ->size(IconEntry\IconEntrySize::Medium)
    ->boolean()
    ->trueIcon('heroicon-o-check-badge')
    ->falseIcon('heroicon-o-x-mark')
    ->trueColor('info')
    ->falseColor('warning')
    // IconEntrySize::ExtraSmall, IconEntrySize::Small, 
    // IconEntrySize::Medium, IconEntrySize::ExtraLarge or IconEntrySize::TwoExtraLarge
    ;
    use Filament\Infolists\Components\ImageEntry;
 
ImageEntry::make('header_image')
->visibility('private')
->disk('s3')
->defaultImageUrl(url(asset('images.png')))
->height(40)
->circular()
->stacked()
->ring(5)
->overlap(2)
->limitedRemainingText()
->extraImgAttributes([
    'alt' => 'USer Not Add image',
    'loading' => 'lazy',
])
;

use Filament\Infolists\Components\ColorEntry;
 
ColorEntry::make('color')
->copyable()
->copyMessage('Copied!')
->copyMessageDuration(1500)
;

use Filament\Infolists\Components\KeyValueEntry;
 
KeyValueEntry::make('meta')
->keyLabel('Property name')
->valueLabel('Property value')
;



// protected $casts = [لؤ انت بتحفظ القيم في ارري 
//     'meta' => 'array',
// ];


use Filament\Infolists\Components\RepeatableEntry;

 
RepeatableEntry::make('comments')
    ->schema([
        TextEntry::make('author.name'),
        TextEntry::make('title'),
        TextEntry::make('content')
            ->columnSpan(2),
    ])
    ->columns(2)
    ->grid(2)
    ;

    //lyout
    
    // Grid  => sm, md, lg, xl, 2xl
    Section::make()
    ->columns([
        'sm' => 3,
        'xl' => 6,
        '2xl' => 8,
    ])
    ->schema([
        TextEntry::make('name')
            ->columnSpan([
                'sm' => 2,
                'xl' => 3,
                '2xl' => 4,
            ]),
        // ...
        ]);
    // Fieldset 
Fieldset::make('Label')
    ->schema([
        // ...
    ]);
    // Tabs
    Tabs::make('Tabs')
    ->tabs([
        Tabs\Tab::make('Tab 1')
            ->schema([
                // ...
            ]),
        Tabs\Tab::make('Tab 2')
            ->schema([
                // ...
            ]),
        Tabs\Tab::make('Tab 3')
            ->schema([
                // ...
            ]),
        ]);
    // Section
    Section::make()
    ->id('rateLimitingSection')
    ->headerActions([
        // ...
    ])
    ->schema([
        // ...
    ]);
    // Split
    use Filament\Infolists\Components\Split;
use Filament\Support\Enums\FontWeight;
 
Split::make([
    Section::make([
        TextEntry::make('title')
            ->weight(FontWeight::Bold),
        TextEntry::make('content')
            ->markdown()
            ->prose(),
    ]),
    Section::make([
        TextEntry::make('created_at')
            ->dateTime(),
        TextEntry::make('published_at')
            ->dateTime(),
    ])->grow(false),
])->from('md');
    use Filament\Infolists\Components\Section;
     
Section::make()
->extraAttributes(['class' => 'custom-section-style'])
;
