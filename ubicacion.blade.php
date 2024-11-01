@extends('layouts.app') <!-- Extiende el layout que creaste -->

@section('content') <!-- Sección de contenido -->
<div class="container text-center mt-5 p-5" style="background-color: #f8d7da; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h1 style="font-family: 'Cardinal', serif; font-size: 3rem; color: #343a40; letter-spacing: 2px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);">
        Encuéntranos aquí
    </h1>
</div>

<!-- Sección de Mapa y Dirección -->
<div class="container mt-5 p-4" style="background-color: #f8d7da; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <div class="row">
        <!-- Mapa interactivo -->
        <div class="col-md-6 mb-4">
            <div class="map-responsive">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3748.8605548269284!2d-100.7269920260975!3d20.01436642184762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cd61a5d75b593%3A0xba1664e15d7595eb!2sAcueducto%20262%2C%20San%20Isidro%2C%2038670%20Ac%C3%A1mbaro%2C%20Gto.!5e0!3m2!1ses-419!2smx!4v1730142356663!5m2!1ses-419!2smx"
                        width="100%" height="400" style="border:0; border-radius: 15px;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <!-- Detalles de contacto -->
        <div class="col-md-6 text-center">
            <h4 style="color: #343a40; font-family: 'Cardinal', serif;">Dirección:</h4>
            <p style="font-size: 1.1rem; color: #343a40;">Av. Acueducto #262, Acámbaro, México, 38600</p>

            <h4 style="color: #343a40; font-family: 'Cardinal', serif;">Horario de Atención:</h4>
            <p style="font-size: 1.1rem; color: #343a40;">Lunes a Sábado: 10:00 AM - 8:00 PM</p>
            <p style="font-size: 1.1rem; color: #343a40;">Domingo: Cerrado</p>

            <h4 style="color: #343a40; font-family: 'Cardinal', serif;">Contáctanos:</h4>
            <p style="font-size: 1.1rem; color: #343a40;"><strong>Teléfono:</strong> <a href="tel:+5214171022332" style="color: #ff69b4;">+52 417 177 6775</a></p>
            <p style="font-size: 1.1rem; color: #343a40;"><strong>Email:</strong> <a href="mailto:contacto@unasypestanasross.com" style="color: #ff69b4;">rossbrownde3@gmail.com</a></p>

            <!-- Botón de llamada a la acción -->
            <a href="https://www.facebook.com/profile.php?id=61563486098673" class="btn btn-primary mt-3" style="background-color: #ff69b4; border: none; padding: 10px 30px; font-size: 1.2rem; border-radius: 50px;">
                Síguenos en Facebook
            </a>
        </div>
    </div>
</div>

<!-- CSS adicional para el mapa responsive -->
<style>
    .map-responsive {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 0;
    }
    .map-responsive iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
    }
</style>

@endsection
