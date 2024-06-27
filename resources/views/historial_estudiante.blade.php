@extends('dashboard')
@section('contenido')
     <!-- Content Header (Page header) -->
     <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-md-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-md-end">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Agregar intgrante</li>
                        </ol>
                    </nav>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Hoverable rows start -->
    <div class="card text-center">
        <div class="card-header">
            <h1 class="fs-4" style="font-weight: bold;">NUEVO INTEGRANTE</h1>
        </div>
        <form action="{{ route('equipo.store') }}" method="POST" enctype="multipart/form-data" class="form"
            autocomplete="off">
            @csrf
            <!-- Include stylesheet -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="foto" style="font-weight: bold;">Foto de perfil</label>
                            <input type="file" class="form-control" name="foto" id="foto"
                                placeholder="Ingresar la foto de perfil" required>
                            @error('foto')
                                <p class="font-weight-bold text-danger">*{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="nombres" style="font-weight: bold;">Nombres</label>
                            <input type="text" class="form-control" name="nombres" id="nombres"
                                placeholder="Ingresar los nombres del integrante" required>
                            @error('nombres')
                                <p class="font-weight-bold text-danger">*{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="nacionalidad" style="font-weight: bold;">Nacionalidad</label>
                            <input type="text" class="form-control" name="nacionalidad" id="nacionalidad"
                                placeholder="Ingresar la nacionalidad del integrante" required>
                            @error('nacionalidad')
                                <p class="font-weight-bold text-danger">*{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="cargo" style="font-weight: bold;">Cargo</label>
                            <input type="text" class="form-control" name="cargo" id="cargo"
                                placeholder="Ingresa el cargo del integrante" required>
                            @error('cargo')
                                <p class="font-weight-bold text-danger">*{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="biografia" style="font-weight: bold;">Biografia</label>
                            <textarea class="form-control" name="biografia" id="biografia" placeholder="Ingresa una biografía corta" style="width: 650px; height: 250px;" required></textarea>
                            @error('biografia')
                                <p class="font-weight-bold text-danger">*{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-body-secondary">
                <a href="{{ route('equipo.index') }}" class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i>
                    Regresar</a>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>
                    Guardar</button>
            </div>
        </form>
    </div>
@endsection