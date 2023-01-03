<form class="forms-sample" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleInputUsername1" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" name="c_name" value="{{ old('c_name', $category->c_name ?? "") }}" id="exampleInputUsername1" autocomplete="off" placeholder="Tên danh mục">
    </div>
    <div class="mb-3">
        <label for="exampleInputUsername1" class="form-label">Danh mục cha</label>
        <select name="c_parent_id" class="form-control" id="">
            <option value="0">__ROOT__</option>
            @foreach($categories ?? [] as $item)
                <option value="{{ $item->id }}" {{ ($category->c_parent_id ?? 0) == $item->id ? "selected" : "" }}>{{ $item->c_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputUsername1" class="form-label">Link ảnh</label>
        <input type="text" class="form-control" name="c_avatar" value="{{ old('c_avatar', $category->c_avatar ?? "") }}" id="exampleInputUsername1" autocomplete="off" placeholder="Link ảnh danh mục">
    </div>
    <button type="submit" class="btn btn-primary me-2">Luu dữ liệu</button>
</form>
