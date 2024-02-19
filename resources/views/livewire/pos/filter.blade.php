<div>
    <div class="form-row">
        <div class="col-md-7">
{{--            <ul class="nav nav-tabs">--}}
{{--                <li class="nav-item" wire:model="category">--}}
{{--                    @foreach($categories as $category)--}}
{{--                        <a id = "{{ $category->id }}" wire:click='updatedCategory()' class="nav-link active" href="#">{{ $category->category_name }}</a>--}}
{{--                    @endforeach--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <div class="form-group">--}}
{{--                <label>Product Category</label>--}}
{{--                <select wire:model="category" class="form-control">--}}
{{--                    <option value="">All Products</option>--}}
{{--                    @foreach($categories as $category)--}}
{{--                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}

            <div class="form-group">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist" wire:model="category">
                        <a class="nav-item nav-link" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true" wire:click.prevent="selectCategory(null)">Tất cả</a>
                        @foreach($categories as $category)
                            <a class="nav-item nav-link" id="nav-{{ $category->id }}-tab" data-toggle="tab" href="#nav-{{ $category->id }}" role="tab" aria-controls="nav-{{ $category->id }}" aria-selected="false" wire:click.prevent="selectCategory('{{ $category->id }}')">{{ $category->category_name }}</a>
                        @endforeach
                    </div>
                </nav>
            </div>
        </div>
{{--        <div class="col-md-5">--}}
{{--            <div class="form-group">--}}
{{--                <label>Product Count</label>--}}
{{--                <select wire:model="showCount" class="form-control">--}}
{{--                    <option value="9">9 Products</option>--}}
{{--                    <option value="15">15 Products</option>--}}
{{--                    <option value="21">21 Products</option>--}}
{{--                    <option value="30">30 Products</option>--}}
{{--                    <option value="">All Products</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
