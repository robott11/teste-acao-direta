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
                    <a class="nav-link active" aria-current="page" href="/admin/new-user">Criar usuário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" aria-current="page" href="/admin/logout">Sair</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-6 mt-5">
            <form method="POST">
                <div class="row">
                    <h4>Criar novo usuário</h4>
                </div>
                <?php if (hasErrors('register')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo error('register') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Senha</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-success w-100">Criar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

