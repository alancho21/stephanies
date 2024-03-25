<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('cssStyles/inicioSesion.css') }}">
</head>

<body>

    @extends('layouts.app')

    @section('content')
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="{{ asset('cssStyles/Caf2.png') }}" style="width: 185px;"
                                            alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">¡Cafetería Stephanies!</h4>
                                    </div>

                                    <form id="loginForm" action="{{ route('login') }}" method="post" novalidate>
                                        @csrf
                                        <p>Inicie sesión con su cuenta</p>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Usuario</label>
                                            <input type="name" name="name" id="form2Example11"
                                                class="form-control" required />
                                            <div class="invalid-feedback">Por favor, ingrese un nombre de usuario.</div>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Email</label>
                                            <input type="email" name="email" id="form2Example11"
                                                class="form-control" required />
                                            <div class="invalid-feedback">Por favor, ingrese un correo electrónico válido.</div>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example22">Contraseña</label>
                                            <input type="password" name="password" id="form2Example22"
                                                class="form-control" required />
                                            <div class="invalid-feedback">Por favor, ingrese una contraseña.</div>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button id="submitButton"
                                                class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                type="submit">Ingresar</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <img src="cssStyles/Caf3.png" alt="Caf3" class="img-fluid w-100"
                                    style="max-width: 600px; height: auto;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('submitButton').addEventListener('click', function (event) {
                var form = document.getElementById('loginForm');
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            });
        });
    </script>
</body>

</html>
