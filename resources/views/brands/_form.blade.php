<form method="POST" action="{{ $action }}">
    @csrf
    @isset($brand)
        @method('PUT')
    @endisset

    <div style="margin-bottom: 12px;">
        <label>Название марки:
            <input type="text" name="name" value="{{ old('name', $brand->name ?? '') }}" style="display: block; width: 100%; padding: 6px;">
        </label>
        @error('name') <div style="color: #f07070; font-size: 0.9em;">{{ $message }}</div> @enderror
    </div>

    <div style="margin-bottom: 12px;">
        <label>Страна:
            <input type="text" name="country" value="{{ old('country', $brand->country ?? '') }}" style="display: block; width: 100%; padding: 6px;">
        </label>
        @error('country') <div style="color: #f07070; font-size: 0.9em;">{{ $message }}</div> @enderror
    </div>

    <button type="submit" style="padding: 8px 16px; background: #2b6cb0; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Сохранить</button>
</form>