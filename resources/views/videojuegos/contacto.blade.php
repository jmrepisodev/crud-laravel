@extends('layouts.plantilla')

@section('content')


       <h2>Contacto</h2>

        <!-- Contact Section Form-->
        <div class="d-flex justify-content-center mb-3">
            <div class="col-lg-8 col-xl-7">
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <form id="contactForm" action="#" method="post">
                    @csrf
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input class="form-control border rounded" id="name" name="name" type="text" placeholder="Nombre" data-sb-validations="required" />
                        <label class="px-3" for="name">Nombre</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">El nombre es obligatorio.</div>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control border rounded" id="email" type="email" name="email" placeholder="name@example.com" data-sb-validations="required,email" />
                        <label class="px-3" for="email">Email</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">El email es obligatorio.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">El email no es válido.</div>
                    </div>
                    <!-- Phone number input-->
                    <div class="form-floating mb-3">
                        <input class="form-control border rounded" id="phone" type="tel" name="phone" placeholder="teléfono" data-sb-validations="required" />
                        <label class="px-3" for="phone">Teléfono</label>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">El teléfono es obligatorio.</div>
                    </div>
                    <!-- Message input-->
                    <div class="form-floating mb-3">
                        <textarea class="form-control border rounded" id="message" type="text" name="message" placeholder="Escribe tu mensaje aquí..." style="height: 10rem" data-sb-validations="required"></textarea>
                        <label class="px-3" for="message">Mensaje</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">El mensaje es obligatorio.</div>
                    </div>
                    
                    <!-- Submit Button-->
                    <button class="btn btn-danger btn-xl" id="submitButton" type="submit">Enviar</button>
                </form>
            </div>
        </div>

@endsection