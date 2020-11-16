
<div class="position-relative" class="mr-5">
    <form action="{{ route('product.find') }}" method="POST">
        @csrf
        <div class="d-flex justify-content-end">
            <div>
                <input class="form-control w-100 rounded-0" name="slug" id="slug" type="text" autocomplete="off" placeholder="Product Search ........">
            </div>
            <button type="submit" class="btn btn-outline-primary rounded-0">
                <i class="zmdi zmdi-search"></i>
            </button>
        </div>
    </form>
    
</div>
<div style="top: 100%;" class="position-absolute bg-white p-2" id="productStatus">
        
</div>
