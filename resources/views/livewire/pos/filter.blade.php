<div>
    <div class="form-row">
        <div class="col-md-7">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    @foreach($categories as $category)
                        <a id = "{{ $category->id }}" class="nav-link active" href="#">{{ $category->category_name }}</a>
                  {{--      <option value="{{ $category->id }}">{{ $category->category_name }}</option>--}}
                    @endforeach
                </li>
            </ul>
            {{--<div class="form-group">
                <label>Product Category</label>
                <select wire:model="category" class="form-control">
                    <option value="">All Products</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>--}}
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
