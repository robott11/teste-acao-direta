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