<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Tables"></x-navbars.navs.auth>
        <!-- End Navbar -->

        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Tablas de Empleados</h6>
                        </div>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="d-flex justify-content-end px-3 mt-3">
                            <a href="{{ route('employes.create') }}" class="btn btn-primary">
                                Crear Empleado
                            </a>
                        </div>

                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Salario</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Posición</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employes as $employ)
                                        <tr>
                                            <td>
                                                <span class="text-sm font-weight-bold">{{ $employ->id }}</span>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">{{ $employ->nombre }}</h6>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">${{ number_format($employ->salario, 2) }}</p>
                                            </td>
                                            <td>
                                                <span class="text-xs font-weight-bold">{{ $employ->posicion }}</span>
                                            </td>
                                            <td>
                                                <span class="text-xs font-weight-bold">{{ $employ->estado }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="dropdown">
                                                    <button class="btn btn-link text-secondary mb-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v text-xs"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('employes.edit', $employ->id) }}">
                                                                Editar
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('employes.destroy', $employ->id) }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item" onclick="return confirm('¿Estás seguro de que quieres eliminar este empleado?');">
                                                                    Eliminar
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-footers.auth></x-footers.auth>
    </main>
    <x-plugins></x-plugins>
</x-layout>
