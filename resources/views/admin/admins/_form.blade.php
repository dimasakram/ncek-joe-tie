<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $admin->name ?? '') }}" required>
        @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email ?? '') }}" required>
        @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Password {{ isset($admin) ? '(kosongkan jika tidak diubah)' : '' }}</label>
        <input type="password" name="password" class="form-control" {{ isset($admin) ? '' : 'required' }}>
        @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-select" required>
            <option value="admin" {{ old('role', $admin->role ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="super_admin" {{ old('role', $admin->role ?? '') == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
        </select>
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Foto Profil</label>
    <input type="file" name="photo" class="form-control">
    @if (!empty($admin) && $admin->photo)
        <img src="{{ asset('storage/'.$admin->photo) }}" width="60" class="mt-2 rounded-circle">
    @endif
</div>
