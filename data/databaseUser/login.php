<form action="index.php" method="POST">
    <div class="mb-3">
        <label class="form-label">Login:</label>
        <input class="form-control" required type="text" placeholder="nazwa użytkownika" name="name">
    </div>
    <div class="mb-3">
        <label class="form-label">Hasło:</label>
        <input class="form-control" required type="password" placeholder="hasło" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Zaloguj się</button>
    <input type="hidden" name="action" value="login">
</form>