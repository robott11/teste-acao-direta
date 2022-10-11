<div class="my-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card border-0">

                    <div class="bg-danger bg-gradient">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary text-light p-4">
                                    <h3>ADMIN Login</h3>
                                    <div class="text-light">
                                        Logue-se para continuar
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="p-2">
                            <div class="mb-3">
                                <form method="POST" class="p-2">
                                    <?php if (hasErrors('login')): ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?php echo error('login') ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-floating mb-3">
                                        <input name="user" type="text" class="form-control" id="user-input" placeholder="exemplo@email.com">
                                        <label for="user-input">Nome de Usuário</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="password" type="password" class="form-control" id="password-input" placeholder="*******">
                                        <label for="password-input">Informe a Senha</label>
                                    </div>
                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-danger" type="submit">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>