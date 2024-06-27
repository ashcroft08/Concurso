<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);

        Jetstream::role('estudiante', __('Estudiante'), [
            'ver_calificaciones',
            'inscribir_cursos',
            'enviar_tareas',
        ]);
        
        Jetstream::role('profesor', __('Profesor'), [
            'crear_curso',
            'editar_curso',
            'eliminar_curso',
            'ver_calificaciones_estudiantes',
            'asignar_calificaciones',
        ]);
        
        Jetstream::role('administrador', __('Administrador'), [
            // Permisos de administrador que engloban a los demás roles
            'estudiante.*', // Permisos de estudiante con notación wildcard
            'profesor.*', // Permisos de profesor con notación wildcard
            'gestionar_usuarios', // Permisos específicos de administrador
        ]);
    }
}
