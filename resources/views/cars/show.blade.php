<form action="{{ route('bookings.store', $car) }}" method="POST">
    @csrf
    <div>
        <label>Номер телефона (+7XXXXXXXXXX):</label>
        <input type="text" name="phone" placeholder="+77011234567" required>
    </div>
    <div style="margin-top: 10px;">
        <label>Комментарий:</label>
        <textarea name="comment" placeholder="Удобное время для тест-драйва..."></textarea>
    </div>
    <button type="submit" style="margin-top: 10px;">Записаться на тест-драйв</button>
</form>