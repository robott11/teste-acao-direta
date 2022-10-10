<div class="row">
    <div class="col-2 bg-dark">
        <ul class="nav nav-pills flex-column p-3 vh-100 text-light">
            <li class="nav-item">
                <h2 class="p-3 d-flex justify-content-center">Empresa XYZ</h2>
                <hr>
            </li>
            <li class="nav-item text-light">
                <div class="dropdown">
                    <a class="btn dropdown-toggle w-100 text-light border-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $user->username ?>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-danger" href="/logout">Sair</a></li>
                    </ul>
                </div>
                <button class="btn btn-outline-secondary text-light rounded-pill w-100 mb-4" type="button" id="clock-btn">
                    REGISTRAR PONTO
                </button>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
            </li>
            <li class="nav-item mb-2"">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item mb-2"">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item mb-2"">
                <a class="nav-link" href="#">Disabled</a>
            </li>
        </ul>
    </div>
    <div class="col-10">
        <table class="table">
            <thead>
            <tr>
                <th>Entrada/Saída</th>
                <th>Hora</th>
                <th>Usuário</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($points as $point): ?>
            <tr>
                <td><?php echo $point->is_entrance ?></td>
                <td><?php echo $point->hour ?></td>
                <td><?php echo $user->name ?></td>
            </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>