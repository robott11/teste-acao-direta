<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/admin">Home</a>
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
    <div class="row mt-2">
        <div class="col">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Nome</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($users)):
                foreach ($users as $user):
                ?>
                <tr>
                    <th><?php echo $user->id ?></th>
                    <td><?php echo $user->username ?></td>
                    <td><?php echo $user->name ?></td>
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