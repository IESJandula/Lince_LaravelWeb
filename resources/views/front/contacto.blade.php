@extends('comunes.master')

@section('title', 'Contacto')

@section('content')
    <style>
        .imagenCabeceraBlog {
            position: relative;
            background-image: url('{{ asset('assets/img/sobre_nosotros.jpg') }}');
            background-size: cover;
            background-position: center;
        }

        .imagenCabeceraBlog::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            /* Color semi-transparente negro */
        }

        .imagenCabeceraBlog .container {
            position: relative;
            /* Asegura que el contenido se posicione correctamente */
            /* Asegura que el contenido esté por encima de la superposición */
        }
    </style>
    <div class="container-fluid p-0">
        <div class="jumbotron jumbotron-fluid imagenCabeceraBlog text-white">
            <div class="container p-5">
                <h1 class="text-center p-5 text-white font-weight-bold">Contacto</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10">
                <div class="card mb-4">
                    <div class="row">
                        <div class="col-md-5 p-5">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1868.517616886646!2d-4.044204460087551!3d38.03637760336311!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6c3111d9f50ab7%3A0x38480c8b0a73be65!2sInstituto%20de%20Educaci%C3%B3n%20Secundaria%20%22J%C3%A1ndula%22!5e0!3m2!1ses!2ses!4v1710845962218!5m2!1ses!2ses" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="col-md-7 p-5">
                            <h2 class="mb-4">Contacta con nosotros</h2>
                            <form method="POST" action="{{ url('enviar-formulario') }}">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="nombre" class="form-label">Nombre y apellidos *</label>
                                        <input type="nombre" class="form-control" id="nombre" name="nombre" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="asunto" class="form-label">Asunto *</label>
                                        <select id="motivo" class="form-control" name="motivo" required>
                                            <option value="" selected disabled>-- Selecciona una opción --</option>
                                            <option value="informacion">Solicitar información sobre el proyecto</option>
                                            <option value="patrocinio">Quiero patrocinar el proyecto</option>
                                            <option value="otro">Otro</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telefono" class="form-label">Teléfono *</label>
                                        <input type="text" id="telefono" name="telefono" class="form-control" pattern="\+[0-9]{2} [0-9]{9}" required placeholder="Ejemplo: +00 123456789" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="comentario" class="form-label">Comentario</label>
                                        <textarea name="comentario" id="comentario" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="terms">
                                        <label class="form-check-label" for="exampleCheck1">Acepto los términos y condiciones *</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mt-3">
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            @if (session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


@endsection
