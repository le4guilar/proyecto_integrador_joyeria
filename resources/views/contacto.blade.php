@extends('plantilla-principal')

@section('contenido')


<div class="text-center mb-5 mt-5">
    <h6 class="text-uppercase mb-3" style="letter-spacing: 4px; color: #300403; font-weight: 600;">ALBA </h6>
    <h2 style="font-family: 'Cormorant Garamond', serif;" class="display-5 text-dark">Contacto</h2>
    <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
</div>

<div class="container py-5">
    <div class="row g-4">

        <div class="col-md-6">
            <div class="row g-3">
                <div class="col-6">
                    <div class="border rounded p-4 text-center h-100 shadow-sm">
                        <img class="mx-3 contacto-ico" src="{{ asset('img/contacto/whatsapp.svg') }}" alt="Whatsapp" width="60">
                        <h5 class="fw-bold">WhatsApp</h5>
                        <p class="mb-0 text-muted">+54 11 1234-5678</p>
                    </div>
                </div>

                <div class="col-6">
                    <div class="border rounded p-4 text-center h-100 shadow-sm">
                        <div class="d-flex justify-content-center gap-2 mb-2">
                            <div class="border rounded p-2"><i class="bi bi-instagram"></i></div>
                            <div class="border rounded p-2"><i class="bi bi-facebook"></i></div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="border rounded p-2"><i class="bi bi-pinterest"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="border rounded p-4 text-center h-100 shadow-sm">
                        <img class="mx-3 contacto-ico" src="{{ asset('img/contacto/envelope.svg') }}" alt="showroom" width="60">
                        <h5 class="fw-bold">Correo</h5>
                        <p class="mb-0 text-muted">info@alba.com</p>
                    </div>
                </div>

                <div class="col-6">
                    <div class="border rounded p-4 text-center h-100 shadow-sm">
                        <img class="mx-3 contacto-ico" src="{{ asset('img/contacto/shop.svg') }}" alt="showroom" width="60">
                        <h5 class="fw-bold">Showroom</h5>
                        <p class="mb-0 text-muted">9 de Julio 1449, Corrientes</p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="ratio ratio-16x9 border rounded overflow-hidden shadow-sm">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.0599868541813!2d-58.83366463041629!3d-27.46739177439004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca6d11ee93d%3A0x597626256826f00a!2s9%20de%20Julio%201449%2C%20W3400%20Corrientes!5e0!3m2!1ses-419!2sar!4v1776745034502!5m2!1ses-419!2sar" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="bg-joyeria-form border rounded p-5 h-100 shadow-sm bg-light">
                <h2 class="text-center mb-4">Mandanos tu consulta</h2>

                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control rounded-pill bg-joyeria-input" placeholder="Nombre Apellido">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teléfono:</label>
                        <input type="tel" class="form-control rounded-pill bg-joyeria-input" placeholder="9734112233">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mail:</label>
                        <input type="email" class="form-control rounded-pill bg-joyeria-input" placeholder="correo@mail.com">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Mensaje:</label>
                        <textarea class="form-control bg-joyeria-text   ">
                        
                        </textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-dark px-5 py-2 rounded-pill shadow-sm">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<hr class="mx-auto mt-4" style="width: 60px; opacity: 0.2; color: #300403;">

@endsection