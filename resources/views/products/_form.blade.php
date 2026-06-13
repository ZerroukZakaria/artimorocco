<div class="mb-3">
    <label class="form-label">Title</label>

    <input
        type="text"
        name="title"
        class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $product->title ?? '') }}"
    >

    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Description</label>

    <textarea
        name="description"
        class="form-control @error('description') is-invalid @enderror"
    >{{ old('description', $product->description ?? '') }}</textarea>

    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Price</label>

    <input
        type="number"
        step="0.01"
        name="price"
        class="form-control @error('price') is-invalid @enderror"
        value="{{ old('price', $product->price ?? '') }}"
    >

    @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Category</label>

    <select
        name="category_id"
        class="form-select @error('category_id') is-invalid @enderror"
    >

        @foreach($categories as $category)

            <option
                value="{{ $category->id }}"
                @selected(
                    old('category_id', $product->category_id ?? '')
                    == $category->id
                )
            >
                {{ $category->name }}
            </option>

        @endforeach

    </select>

    @error('category_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">

    <label class="form-label">
        Product Image
    </label>

    <input
        type="file"
        name="image"
        class="form-control @error('image') is-invalid @enderror"
    >

    @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

@if(isset($product) && $product->image)

    <div class="mb-3">

        <img
            src="{{ asset('storage/' . $product->image) }}"
            class="img-thumbnail"
            style="max-width:200px"
        >

    </div>

@endif