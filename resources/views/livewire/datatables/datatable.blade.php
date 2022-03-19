<div>
    @if($beforeTableSlot)
    <div class="mt-8">
        @include($beforeTableSlot)
    </div>
    @endif

    <div class="mb-1">
        <div class="input-group mb-2">
            @if($this->searchableColumns()->count())
            <div class="input-group-prepend" id="loading-search">
                <span class="btn">
                    @include('datatables::icons.search')
                </span>
            </div>

            <input wire:model.debounce.500ms="search" class="form-control rounded-pill mr-1"
                placeholder="{{ __('LivewireDatatableBs4::datatable.search', ['columns' => $this->searchableColumns()->map->label->join(', ')]) }}" />
            @endif

            @if($exportable)
            <div class="input-group-append" id="export-excel">
                <div class="ml-2"
                    x-data="{ init() { window.livewire.on('startDownload', link => window.open(link,'_blank')) } }"
                    x-init="init">
                    <button wire:click="export" class="btn btn-outline-success">
                        @include('datatables::icons.excel', ['text' => __('LivewireDatatableBs4::datatable.export')])
                    </button>
                </div>
            </div>
            @endif

            @if($hideable === 'select')
            <div class="input-group-append" id="hideable-select">
                @include('datatables::hide-column-multiselect')
            </div>
            @endif

            <div class="input-group-append" id="simple-pagination">
                {{ $this->results->links('datatables::paginators.simple') }}
            </div>

            <div class="input-group-append" id="button-close">
                <button wire:click="$set('search', null)" class="btn">
                    @include('datatables::icons.x-circle', ['classIcon' => 'text-red'])
                </button>
            </div>
        </div>
    </div>

    <div class="mb-1">
        <div class="p-2">
            <div class="d-flex justify-content-center">
                <div wire:loading>
                    <span>
                        @include('datatables::icons.loading', ['text' => __('LivewireDatatableBs4::datatable.loading')])
                    </span>
                </div>
            </div>
            @switch($hideable)
            @case('buttons')
            @foreach($this->columns as $index => $column)
            @if ($column['type'] !== 'checkbox')
            <span class="badge badge-primary m-2" wire:click.prefech="toggle('{{ $index }}')">
                {{ str_replace('_', ' ', $column['label']) }}
                @if($column['hidden'])
                @include('datatables::icons.eye-slash')
                @else
                @include('datatables::icons.eye')
                @endif
            </span>
            @endif
            @endforeach
            @break
            @endswitch
        </div>
    </div>

    <div class="card rounded-lg shadow bg-white table-responsive">
        <table class="table table-sm table-striped table-hover">
            @unless($this->hideHeader)
            <thead class="thead-light">
                <tr>
                    @foreach($this->columns as $index => $column)
                    @if($column['type'] === 'checkbox')
                    <th>
                        <span>{{ __('LivewireDatatableBs4::datatable.select_all') }}</span>
                        <div class="custom-control custom-switch">
                            <input id="select-all" type="checkbox" class="custom-control-input"
                                wire:click="toggleSelectAll" @if(count($selected)===$this->results->total()) checked
                            @endif />
                            <label for="select-all" class="custom-control-label"></label>
                        </div>
                        {{ count($selected) }}
                    </th>
                    @endif

                    @if ($column['filterable'] && !$column['hidden'])
                    <th>
                        @if(is_iterable($column['filterable']))
                        <div wire:key="{{ $index }}">
                            @include('datatables::filters.select', ['index' => $index, 'name' => $column['label'],
                            'options' => $column['filterable']])
                        </div>
                        @else
                        <div wire:key="{{ $index }}">
                            @include('datatables::filters.' . ($column['filterView'] ?? $column['type']), ['index' =>
                            $index, 'name' => $column['label']])
                        </div>
                        @endif
                        @if($column['type'] !== 'checkbox')
                        @switch($hideable)
                        @case('inline')
                        @include('datatables::headers.inline', ['column' => $column, 'sort' => $sort])
                        @break
                        @case('select')
                        @include('datatables::headers.select', ['column' => $column, 'sort' => $sort])
                        @break
                        @case('buttons')
                        @include('datatables::headers.buttons', ['column' => $column, 'sort' => $sort])
                        @break
                        @default
                        @include('datatables::headers.default', ['column' => $column, 'sort' => $sort])
                        @break
                        @endswitch
                        @endif
                    </th>
                    @else
                    @if($column['type'] !== 'checkbox')
                    @switch($hideable)
                    @case('inline')
                    @include('datatables::headers.inline', ['column' => $column, 'sort' => $sort, 'isTemplateSyntax' =>
                    true])
                    @break
                    @case('select')
                    @include('datatables::headers.select', ['column' => $column, 'sort' => $sort, 'isTemplateSyntax' =>
                    true])
                    @break
                    @case('buttons')
                    @include('datatables::headers.buttons', ['column' => $column, 'sort' => $sort, 'isTemplateSyntax' =>
                    true])
                    @break
                    @default
                    @include('datatables::headers.default', ['column' => $column, 'sort' => $sort, 'isTemplateSyntax' =>
                    true])
                    @break
                    @endswitch
                    @endif
                    @endif
                    @endforeach
                </tr>
            </thead>
            @endif
            <tbody>
                @forelse($this->results as $result)
                <tr
                    class="{{ isset($result->checkbox_attribute) && in_array($result->checkbox_attribute, $selected) ? 'table-warning' : '' }}">
                    @foreach($this->columns as $column)
                    @if($column['hidden'])
                    @switch($hideable)
                    @case('inline')
                    <th></th>
                    @break
                    @case('')
                    <th></th>
                    @break
                    @endswitch
                    @elseif($column['type'] === 'checkbox')
                    <th>@include('datatables::checkbox', ['value' => $result->checkbox_attribute])</th>
                    @else
                    <th
                        class="@if($column['align'] === 'right') text-right @elseif($column['align'] === 'center') text-center @else text-left @endif">
                        {!! $result->{$column['name']} !!}
                    </th>
                    @endif
                    @endforeach
                </tr>
                @empty
                <tr>
                    <th class="text-center" colspan="{{ count($this->columns) }}">
                        <small>{{ __('LivewireDatatableBs4::datatable.no_data_table') }}</small>
                    </th>
                </tr>
                @endforelse
            </tbody>
        </table>

        @unless($this->hidePagination)
        <div class="row pl-3 pr-3">
            <div class="col-md-4">
                @include('datatables::paginators.per-page')
            </div>
            <div class="col-md-4">
                {{ $this->results->links('datatables::paginators.bootstrap') }}
            </div>
            <div class="col-md-4 d-flex justify-content-end">
                <small>
                    {{ __('LivewireDatatableBs4::datatable.pagination_text', ['start' => $this->results->firstItem(),
                    'end' => $this->results->lastItem(), 'total' => $this->results->total()]) }}
                </small>
            </div>
        </div>
        @endif
    </div>

    @if($afterTableSlot)
    <div class="mt-8">
        @include($afterTableSlot)
    </div>
    @endif

</div>
