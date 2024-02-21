<div>
    <div class="card border-0" style="background-color: transparent">
        <div class="card-body p-0" >
            <div class="row position-relative" style="margin-left: 0">
                <div class="col-2 card p-0" style="height: 75vh!important; background-color: #fff; overflow: auto; -ms-overflow-style: none;  scrollbar-width: none; border: none; margin: 0">
                    <livewire:pos.filter :categories="$categories"/>
                </div>
                <div wire:loading.flex class="col-11 position-absolute justify-content-center align-items-center" style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <div class="col-10"  style="max-height: 75vh!important; overflow: auto; -ms-overflow-style: none;  scrollbar-width: none; padding: 0!important;">
                    <div class="row" style="padding-top: 20px; margin: 0">
                        @forelse($products as $product)
                            <div wire:click.prevent="selectProduct({{ $product }})" class="col-lg-3 col-md-3 col-xl-3"
                                 style="cursor: pointer;">
                                <div class="card border-0 shadow " style="max-height: 140px; max-width: 150px">
                                    <div class="position-relative">
                                        <img style="max-height: 80px; width: 100%;object-fit: cover; "
                                             src="http://nhadom.id.vn/storage/app/public/13/1708235050.jpg"
                                             class="card-img-top" alt="Product Image">
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <h6 style="font-size: 14px;"
                                                class="card-title mb-0">{{ $product->product_name }}</h6>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-warning mb-0">
                                Products Not Found...
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
