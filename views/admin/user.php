<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/admin">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/admin/new-user">Criar usuário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" aria-current="page" href="/admin/logout">Sair</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" title="Filtro" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-filter"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Evento</th>
                    <th>Horário</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($points)):
                foreach ($points as $point):
                ?>
                <tr>
                    <td><?php echo $point->id ?></td>
                    <td><?php echo $point->is_entrance == 1 ? 'Entrada' : 'Saída' ?></td>
                    <td><?php echo convertDateTimeDB($point->hour, 'd/m/Y H:i') ?></td>
                </tr>
                <?php
                endforeach;
                endif;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filtro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-filter">
                    <div class="row">
                        <div class="col-6 mb-2">
                            <input name="start_date" type="text" class="form-control" id="filter-start">
                        </div>
                        <div class="col-6 mb-2">
                            <input name="end_date" type="text" class="form-control" id="filter-end">
                        </div>
                        <div class="col-12 mt-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="submit-btn">Filtrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>