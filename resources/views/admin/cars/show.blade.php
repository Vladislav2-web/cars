<div style="margin-top: 20px;">
    <h3>QR-код автомобиля:</h3>
    {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(150)->generate(request()->url()) !!}
</div>