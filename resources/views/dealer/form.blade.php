<form method="POST" autocomplete="off">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <label class="form-label">Tên đại lý</label>
                <input type="text" name="name" required class="form-control" placeholder="Tên đại lý" value="{{ old('name', $dealer->name ?? '') }}">
            </div>
        </div><!-- Col -->
        <div class="col-sm-6">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" required class="form-control" placeholder="Email" value="{{ old('email', $dealer->email ?? '') }}">
            </div>
        </div><!-- Col -->
        <div class="col-sm-6">
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="number" name="phone" required class="form-control" placeholder="Phone" value="{{ old('phone', $dealer->phone ?? '') }}">
            </div>
        </div><!-- Col -->
        <div class="col-sm-6">
            <div class="mb-3">
                <label class="form-label">Địa chỉ</label>
                <input type="text" name="address" required class="form-control" placeholder="Địa chỉ" value="{{ old('address', $dealer->address ?? '') }}">
            </div>
        </div><!-- Col -->
    </div><!-- Row -->
    <button type="submit" class="btn btn-primary me-2">Luu dữ liệu</button>
</form>
