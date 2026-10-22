<form method="POST" action="{{ $action }}">
    @csrf
    @isset($car)
        @method('PUT')
    @endisset

    <div style="margin-bottom: 12px;">
        <label>Марка:
            <select name="brand_id" style="display: block; width: 100%; padding: 6px;">
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" @selected(old('brand_id', $car->brand_id ?? '') == $brand->id)>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </label>
        @error('brand_id') <div style="color: #f07070; font-size: 0.9em;">{{ $message }}</div> @enderror
    </div>

    <div style="margin-bottom: 12px;">
        <label>Название / Модель:
            <input type="text" name="title" value="{{ old('title', $car->title ?? '') }}" style="display: block; width: 100%; padding: 6px;">
        </label>
        @error('title') <div style="color: #f07070; font-size: 0.9em;">{{ $message }}</div> @enderror
    </div>

    <div style="margin-bottom: 12px;">
        <label>Год выпуска:
            <input type="number" name="year" value="{{ old('year', $car->year ?? '') }}" style="display: block; width: 100%; padding: 6px;">
        </label>
        @error('year') <div style="color: #f07070; font-size: 0.9em;">{{ $message }}</div> @enderror
    </div>

    <div style="margin-bottom: 12px;">
        <label>Цена (тнг):
            <input type="number" name="price" value="{{ old('price', $car->price ?? '') }}" style="display: block; width: 100%; padding: 6px;">
        </label>
        @error('price') <div style="color: #f07070; font-size: 0.9em;">{{ $message }}</div> @enderror
    </div>

    <div style="margin-bottom: 12px;">
        <label>Описание:
            <textarea name="description" style="display: block; width: 100%; padding: 6px; height: 80px;">{{ old('description', $car->description ?? '') }}</textarea>
        </label>
        @error('description') <div style="color: #f07070; font-size: 0.9em;">{{ $message }}</div> @enderror
    </div>

    <div style="margin-bottom: 12px;">
        <label>
            <input type="checkbox" name="is_available" value="1" @checked(old('is_available', $car->is_available ?? true))> 
            В наличии
        </label>
    </div>

    <button type="submit" style="padding: 8px 16px; background: #2b6cb0; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Сохранить</button>
</form>