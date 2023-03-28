<x-layout title="Novo usário">
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>

        <div class="form-group">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="empasswordail" class="form-control">
        </div>

        <button class="btn btn-primary mt-3"> Registrar</button>
    </form>

</x-layout>